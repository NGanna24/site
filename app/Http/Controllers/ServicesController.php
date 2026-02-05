<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\MediaHelper;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Récupérer les paramètres de pagination et de recherche
            $perPage = $request->input('per_page', 10);
            $search = $request->input('search', '');
            $status = $request->input('status', '');
            $categoryId = $request->input('category_id', '');
            $sortBy = $request->input('sort_by', 'created_at');
            $sortOrder = $request->input('sort_order', 'desc');
            
            // Construire la requête avec les relations
            $query = Service::with(['category', 'creator', 'media'])
                ->withCount('orders') 
                ->withAvg('reviews', 'rating');
            
            // Appliquer les filtres de recherche
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Filtrer par statut
            if ($status && in_array($status, ['active', 'inactive', 'draft'])) {
                $query->where('status', $status);
            }
            
            // Filtrer par catégorie
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
            
            // Trier les résultats
            $allowedSortColumns = ['id', 'title', 'price', 'created_at', 'orders_count', 'rating', 'views'];
            if (in_array($sortBy, $allowedSortColumns)) {
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('created_at', 'desc');
            }
            
            // Paginer les résultats
            $services = $query->paginate($perPage);
            
            // Récupérer les catégories pour le filtre
            $categories = Category::where('status', 'active')
                ->orderBy('name')
                ->get(['id', 'name']);
            
            // Si c'est une requête AJAX, retourner JSON
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $services->items(),
                    'meta' => [
                        'current_page' => $services->currentPage(),
                        'last_page' => $services->lastPage(),
                        'per_page' => $services->perPage(),
                        'total' => $services->total(),
                        'from' => $services->firstItem(),
                        'to' => $services->lastItem(),
                    ],
                    'stats' => [
                        'total' => Service::count(),
                        'active' => Service::where('status', 'active')->count(),
                        'inactive' => Service::where('status', 'inactive')->count(),
                        'draft' => Service::where('status', 'draft')->count(),
                        'total_orders' => Service::sum('orders_count'),
                        'total_views' => Service::sum('views')
                    ],
                    'categories' => $categories
                ]);
            }
            
            return view('administrateurs.services.index', compact('services', 'categories', 'request'));
            
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors du chargement des services',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Erreur lors du chargement des services');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation des données
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255|unique:services,title',
                'slug' => 'nullable|string|max:255|unique:services,slug',
                'description' => 'required|string',
                'short_description' => 'nullable|string|max:500',
                'price' => 'nullable|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'duration_days' => 'nullable|integer|min:1',
                'duration_hours' => 'nullable|integer|min:1|max:23',
                'media_type' => 'required|in:image,video',
                'video_url' => 'nullable|required_if:media_type,video|url',
                'category_id' => 'required|exists:categories,id',
                'features' => 'nullable|array',
                'requirements' => 'nullable|string',
                'deliverables' => 'nullable|string',
                'status' => 'required|in:active,inactive,draft',
                'media_files' => 'nullable|array',
                'media_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'alt_text' => 'nullable|array',
                'alt_text.*' => 'nullable|string|max:255',
                'seo_title' => 'nullable|string|max:255',
                'seo_description' => 'nullable|string|max:500',
                'seo_keywords' => 'nullable|string'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation échouée',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            // Préparer les données
            $data = $validator->validated();
            
            // Générer le slug s'il n'est pas fourni
            if (empty($data['slug']) && !empty($data['title'])) {
                $data['slug'] = Str::slug($data['title']);
                
                // S'assurer que le slug est unique
                $slugCount = Service::where('slug', $data['slug'])->count();
                if ($slugCount > 0) {
                    $data['slug'] = $data['slug'] . '-' . uniqid();
                }
            }
            
            // Ajouter l'utilisateur connecté comme créateur
            $data['created_by'] = Auth::id();
            $data['updated_by'] = Auth::id();
            
            // Gérer les données SEO
            $seoData = [];
            if (!empty($data['seo_title'])) {
                $seoData['title'] = $data['seo_title'];
            }
            if (!empty($data['seo_description'])) {
                $seoData['description'] = $data['seo_description'];
            }
            if (!empty($data['seo_keywords'])) {
                $seoData['keywords'] = $data['seo_keywords'];
            }
            
            $data['seo_data'] = !empty($seoData) ? json_encode($seoData) : null;
            
            // Convertir les features en JSON si présentes
            if (isset($data['features']) && is_array($data['features'])) {
                $data['features'] = json_encode(array_filter($data['features']));
            }
            
            // Gérer la date de publication si le service est actif
            if ($data['status'] === 'active' && empty($data['published_at'])) {
                $data['published_at'] = now();
            }
            
            // Créer le service
            $service = Service::create($data);
            
            // Gérer l'upload des médias si c'est une image
            if ($data['media_type'] === 'image' && $request->hasFile('media_files')) {
                $this->handleMediaUpload($service, $request);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Service créé avec succès',
                'data' => $service->load(['category', 'media'])
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création du service',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $service = Service::with(['category', 'creator', 'media', 'features', 'reviews'])
                ->withCount('orders')
                ->withAvg('reviews', 'rating')
                ->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $service
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get(['id', 'name']);
            
        return response()->json([
            'success' => true,
            'categories' => $categories,
            'html' => view('administrateurs.modals.service-form', compact('categories'))->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $service = Service::with(['media'])->findOrFail($id);
            $categories = Category::where('status', 'active')
                ->orderBy('name')
                ->get(['id', 'name']);
            
            return response()->json([
                'success' => true,
                'data' => $service,
                'categories' => $categories,
                'html' => view('administrateurs.modals.service-form', compact('service', 'categories'))->render()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service non trouvé'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
            
            // Validation des données
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255|unique:services,title,' . $id,
                'slug' => 'nullable|string|max:255|unique:services,slug,' . $id,
                'description' => 'required|string',
                'short_description' => 'nullable|string|max:500',
                'price' => 'nullable|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'duration_days' => 'nullable|integer|min:1',
                'duration_hours' => 'nullable|integer|min:1|max:23',
                'media_type' => 'required|in:image,video',
                'video_url' => 'nullable|required_if:media_type,video|url',
                'category_id' => 'required|exists:categories,id',
                'features' => 'nullable|array',
                'requirements' => 'nullable|string',
                'deliverables' => 'nullable|string',
                'status' => 'required|in:active,inactive,draft',
                'media_files' => 'nullable|array',
                'media_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'alt_text' => 'nullable|array',
                'alt_text.*' => 'nullable|string|max:255',
                'existing_media' => 'nullable|array',
                'existing_media.*.id' => 'nullable|exists:service_media,id',
                'existing_media.*.alt_text' => 'nullable|string|max:255',
                'existing_media.*.order' => 'nullable|integer',
                'existing_media.*.is_featured' => 'nullable|boolean',
                'seo_title' => 'nullable|string|max:255',
                'seo_description' => 'nullable|string|max:500',
                'seo_keywords' => 'nullable|string'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation échouée',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            // Préparer les données
            $data = $validator->validated();
            
            // Générer le slug s'il n'est pas fourni et si le titre a changé
            if (empty($data['slug']) && !empty($data['title']) && $data['title'] !== $service->title) {
                $data['slug'] = Str::slug($data['title']);
                
                // S'assurer que le slug est unique
                $slugCount = Service::where('slug', $data['slug'])->where('id', '!=', $id)->count();
                if ($slugCount > 0) {
                    $data['slug'] = $data['slug'] . '-' . uniqid();
                }
            }
            
            // Mettre à jour l'utilisateur qui modifie
            $data['updated_by'] = Auth::id();
            
            // Gérer les données SEO
            $seoData = [];
            if (!empty($data['seo_title'])) {
                $seoData['title'] = $data['seo_title'];
            }
            if (!empty($data['seo_description'])) {
                $seoData['description'] = $data['seo_description'];
            }
            if (!empty($data['seo_keywords'])) {
                $seoData['keywords'] = $data['seo_keywords'];
            }
            
            $data['seo_data'] = !empty($seoData) ? json_encode($seoData) : null;
            
            // Convertir les features en JSON si présentes
            if (isset($data['features']) && is_array($data['features'])) {
                $data['features'] = json_encode(array_filter($data['features']));
            }
            
            // Gérer la date de publication si le service passe en actif
            if ($data['status'] === 'active' && $service->status !== 'active') {
                $data['published_at'] = now();
            }
            
            // Supprimer les anciens médias si le type change de image à video
            if ($service->media_type === 'image' && $data['media_type'] === 'video') {
                $this->deleteServiceMedia($service);
            }
            
            // Mettre à jour le service
            $service->update($data);
            
            // Gérer les médias existants
            if (isset($data['existing_media']) && $data['media_type'] === 'image') {
                $this->updateExistingMedia($service, $data['existing_media']);
            }
            
            // Gérer l'upload de nouveaux médias
            if ($data['media_type'] === 'image' && $request->hasFile('media_files')) {
                $this->handleMediaUpload($service, $request, $data['alt_text'] ?? []);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Service mis à jour avec succès',
                'data' => $service->refresh()->load(['category', 'media'])
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du service',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            
            // Vérifier si le service a des commandes
            if ($service->orders()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de supprimer ce service car il contient des commandes.'
                ], 422);
            }
            
            // Supprimer les médias associés
            $this->deleteServiceMedia($service);
            
            // Supprimer le service
            $service->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Service supprimé avec succès'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du service',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle le statut d'un service
     */
    public function toggleStatus($id)
    {
        try {
            $service = Service::findOrFail($id);
            
            $newStatus = $service->status === 'active' ? 'inactive' : 'active';
            
            $updateData = ['status' => $newStatus];
            
            // Si le service devient actif, définir la date de publication
            if ($newStatus === 'active' && !$service->published_at) {
                $updateData['published_at'] = now();
            }
            
            $service->update($updateData);
            
            return response()->json([
                'success' => true,
                'message' => 'Statut mis à jour avec succès',
                'data' => [
                    'status' => $newStatus
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du changement de statut'
            ], 500);
        }
    }

    /**
     * Toggle le statut "featured" d'un service
     */
    public function toggleFeatured($id)
    {
        try {
            $service = Service::findOrFail($id);
            
            // Trouver ou créer un média featured
            $featuredMedia = $service->media()->where('is_featured', true)->first();
            
            if ($featuredMedia) {
                // Désactiver le featured
                $featuredMedia->update(['is_featured' => false]);
                $isFeatured = false;
            } else {
                // Activer le premier média comme featured
                $firstMedia = $service->media()->first();
                if ($firstMedia) {
                    $firstMedia->update(['is_featured' => true]);
                    $isFeatured = true;
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Le service doit avoir au moins un média pour être en vedette'
                    ], 422);
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Statut "En vedette" mis à jour avec succès',
                'data' => [
                    'is_featured' => $isFeatured
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du changement de statut'
            ], 500);
        }
    }

    /**
     * Récupérer les statistiques des services
     */
    public function getStats()
    {
        try {
            $stats = [
                'total' => Service::count(),
                'active' => Service::where('status', 'active')->count(),
                'inactive' => Service::where('status', 'inactive')->count(),
                'draft' => Service::where('status', 'draft')->count(),
                'total_orders' => Service::sum('orders_count'),
                'total_views' => Service::sum('views'),
                'average_rating' => round(Service::avg('rating') ?? 0, 2),
                'total_revenue' => Service::sum('orders_count') * Service::avg('price') ?? 0
            ];
            
            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des statistiques'
            ], 500);
        }
    }

    /**
     * Rechercher des services (pour autocomplete)
     */
    public function search(Request $request)
    {
        try {
            $search = $request->input('q', '');
            $limit = $request->input('limit', 10);
            
            $services = Service::where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->where('status', 'active')
                ->limit($limit)
                ->get(['id', 'title', 'slug', 'price', 'category_id']);
            
            return response()->json([
                'success' => true,
                'data' => $services
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la recherche'
            ], 500);
        }
    }

    /**
     * Gérer l'upload des médias
     */
    private function handleMediaUpload($service, $request, $altTexts = [])
    {
        if (!$request->hasFile('media_files')) {
            return;
        }
        
        $files = $request->file('media_files');
        $uploadedBy = Auth::id();
        
        foreach ($files as $index => $file) {
            // Générer un nom de fichier unique
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            
            // Déterminer le chemin de stockage
            $path = 'services/' . $service->id . '/media';
            $filePath = $file->storeAs($path, $filename, 'public');
            
            // Obtenir les dimensions de l'image
            $dimensions = getimagesize($file);
            $width = $dimensions[0] ?? null;
            $height = $dimensions[1] ?? null;
            
            // Créer l'entrée de média
            ServiceMedia::create([
                'service_id' => $service->id,
                'type' => 'image',
                'path' => $filePath,
                'original_name' => $originalName,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'width' => $width,
                'height' => $height,
                'order' => $index,
                'is_featured' => ($index === 0), // Première image en vedette par défaut
                'alt_text' => $altTexts[$index] ?? null,
                'uploaded_by' => $uploadedBy
            ]);
        }
    }

    /**
     * Mettre à jour les médias existants
     */
    private function updateExistingMedia($service, $existingMedia)
    {
        foreach ($existingMedia as $mediaData) {
            if (isset($mediaData['id'])) {
                $media = ServiceMedia::where('service_id', $service->id)
                    ->where('id', $mediaData['id'])
                    ->first();
                
                if ($media) {
                    $media->update([
                        'alt_text' => $mediaData['alt_text'] ?? $media->alt_text,
                        'order' => $mediaData['order'] ?? $media->order,
                        'is_featured' => $mediaData['is_featured'] ?? $media->is_featured
                    ]);
                }
            }
        }
    }

    /**
     * Supprimer les médias d'un service
     */
    private function deleteServiceMedia($service)
    {
        $mediaItems = $service->media;
        
        foreach ($mediaItems as $media) {
            // Supprimer le fichier physique
            Storage::disk('public')->delete($media->path);
            // Supprimer l'entrée en base de données
            $media->delete();
        }
    }

    /**
     * Supprimer un média spécifique
     */
    public function deleteMedia($serviceId, $mediaId)
    {
        try {
            $media = ServiceMedia::where('service_id', $serviceId)
                ->where('id', $mediaId)
                ->firstOrFail();
            
            // Supprimer le fichier physique
            Storage::disk('public')->delete($media->path);
            
            // Supprimer l'entrée en base de données
            $media->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Média supprimé avec succès'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du média'
            ], 500);
        }
    }
}