<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
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
            $sortBy = $request->input('sort_by', 'order');
            $sortOrder = $request->input('sort_order', 'asc');
            
            // Construire la requête
            $query = Category::query();
            
            // Appliquer les filtres de recherche
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Filtrer par statut
            if ($status && in_array($status, ['active', 'inactive'])) {
                $query->where('status', $status);
            }
            
            // Trier les résultats
            $allowedSortColumns = ['id', 'name', 'order', 'service_count', 'created_at'];
            if (in_array($sortBy, $allowedSortColumns)) {
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('order')->orderBy('name');
            }
            
            // Paginer les résultats
            $categories = $query->paginate($perPage);
            
            // Si c'est une requête AJAX, retourner JSON
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $categories->items(),
                    'meta' => [
                        'current_page' => $categories->currentPage(),
                        'last_page' => $categories->lastPage(),
                        'per_page' => $categories->perPage(),
                        'total' => $categories->total(),
                        'from' => $categories->firstItem(),
                        'to' => $categories->lastItem(),
                    ],
                    'stats' => [
                        'total' => Category::count(),
                        'active' => Category::where('status', 'active')->count(),
                        'inactive' => Category::where('status', 'inactive')->count(),
                        'total_services' => Category::sum('service_count')
                    ]
                ]);
            }
            
            return view('administrateurs.categories.index', compact('categories'));
            
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors du chargement des catégories',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Erreur lors du chargement des catégories');
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
                'name' => 'required|string|max:255|unique:categories,name',
                'slug' => 'nullable|string|max:255|unique:categories,slug',
                'description' => 'nullable|string',
                'icon' => 'nullable|string|max:50',
                'color' => 'nullable|string|max:7',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'order' => 'nullable|integer|min:0',
                'status' => 'required|in:active,inactive',
                'parent_id' => 'nullable|exists:categories,id',
                'features' => 'nullable|array'
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
            if (empty($data['slug']) && !empty($data['name'])) {
                $data['slug'] = Str::slug($data['name']);
                
                // S'assurer que le slug est unique
                $slugCount = Category::where('slug', $data['slug'])->count();
                if ($slugCount > 0) {
                    $data['slug'] = $data['slug'] . '-' . uniqid();
                }
            }
            
            // Gérer l'icône par défaut
            if (empty($data['icon'])) {
                $data['icon'] = 'fas fa-tag';
            }
            
            // Gérer la couleur par défaut
            if (empty($data['color'])) {
                $data['color'] = '#4361ee';
            }
            
            // Gérer l'ordre par défaut
            if (!isset($data['order'])) {
                $maxOrder = Category::max('order');
                $data['order'] = $maxOrder ? $maxOrder + 1 : 0;
            }
            
            // Créer la catégorie
            $category = Category::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie créée avec succès',
                'data' => $category
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de la catégorie',
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
            $category = Category::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $category
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cette méthode n'est pas nécessaire car le formulaire est dans la modal
        // Mais nous la gardons pour la convention REST
        return response()->json([
            'success' => true,
            'html' => view('administrateurs.modals.category-form')->render()
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $category,
                'html' => view('administrateurs.modals.category-form', compact('category'))->render()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        }
    }

 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            
            // Validation des données
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:categories,name,' . $id,
                'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
                'description' => 'nullable|string',
                'icon' => 'nullable|string|max:50',
                'color' => 'nullable|string|max:7',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'order' => 'nullable|integer|min:0',
                'status' => 'required|in:active,inactive',
                'parent_id' => 'nullable|exists:categories,id',
                'features' => 'nullable|array'
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
            if (empty($data['slug']) && !empty($data['name']) && $data['name'] !== $category->name) {
                $data['slug'] = Str::slug($data['name']);
                
                // S'assurer que le slug est unique
                $slugCount = Category::where('slug', $data['slug'])->where('id', '!=', $id)->count();
                if ($slugCount > 0) {
                    $data['slug'] = $data['slug'] . '-' . uniqid();
                }
            }
            
            // Mettre à jour la catégorie
            $category->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie mise à jour avec succès',
                'data' => $category->refresh()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de la catégorie',
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
            $category = Category::findOrFail($id);
            
            // Vérifier si la catégorie a des services
            $hasServices = $category->services()->exists();
            
            if ($hasServices) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de supprimer cette catégorie car elle contient des services.'
                ], 422);
            }
            
            // Vérifier si la catégorie a des sous-catégories
            $hasChildren = $category->children()->exists();
            
            if ($hasChildren) {
                // Déplacer les enfants vers null
                $category->children()->update(['parent_id' => null]);
            }
            
            // Supprimer la catégorie (soft delete)
            $category->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie supprimée avec succès'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la catégorie',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle le statut d'une catégorie
     */
    public function toggleStatus($id)
    {
        try {
            $category = Category::findOrFail($id);
            
            $newStatus = $category->status === 'active' ? 'inactive' : 'active';
            $category->update(['status' => $newStatus]);
            
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
     * Mettre à jour l'ordre des catégories
     */
    public function updateOrder(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'categories' => 'required|array',
                'categories.*.id' => 'required|exists:categories,id',
                'categories.*.order' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            foreach ($request->categories as $item) {
                Category::where('id', $item['id'])->update(['order' => $item['order']]);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Ordre mis à jour avec succès'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de l\'ordre'
            ], 500);
        }
    }

    /**
     * Récupérer les statistiques des catégories
     */
    public function getStats()
    {
        try {
            $stats = [
                'total' => Category::count(),
                'active' => Category::where('status', 'active')->count(),
                'inactive' => Category::where('status', 'inactive')->count(),
                'total_services' => Category::sum('service_count'),
                'with_services' => Category::where('service_count', '>', 0)->count(),
                'without_services' => Category::where('service_count', 0)->count()
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
     * Rechercher des catégories (pour autocomplete)
     */
    public function search(Request $request)
    {
        try {
            $search = $request->input('q', '');
            $limit = $request->input('limit', 10);
            
            $categories = Category::where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->where('status', 'active')
                ->limit($limit)
                ->get(['id', 'name', 'slug', 'icon', 'color']);
            
            return response()->json([
                'success' => true,
                'data' => $categories
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la recherche'
            ], 500);
        }
    }

    /**
     * Récupérer les catégories pour le menu/navigation
     */
    public function getMenuCategories()
    {
        try {
            $categories = Category::where('status', 'active')
                ->orderBy('order')
                ->orderBy('name')
                ->get(['id', 'name', 'slug', 'icon', 'color', 'service_count']);
            
            return response()->json([
                'success' => true,
                'data' => $categories
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des catégories'
            ], 500);
        }
    }

    /**
     * Restaurer une catégorie supprimée
     */
    public function restore($id)
    {
        try {
            $category = Category::withTrashed()->findOrFail($id);
            
            if (!$category->trashed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cette catégorie n\'est pas supprimée'
                ], 422);
            }
            
            $category->restore();
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie restaurée avec succès'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la restauration'
            ], 500);
        }
    }

    /**
     * Supprimer définitivement une catégorie
     */
    public function forceDelete($id)
    {
        try {
            $category = Category::withTrashed()->findOrFail($id);
            
            if (!$category->trashed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'La catégorie doit être d\'abord supprimée'
                ], 422);
            }
            
            // Vérifier s'il y a des services associés
            if ($category->services()->withTrashed()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de supprimer définitivement une catégorie avec des services'
                ], 422);
            }
            
            $category->forceDelete();
            
            return response()->json([
                'success' => true,
                'message' => 'Catégorie supprimée définitivement'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression définitive'
            ], 500);
        }
    }

    /**
     * Récupérer les catégories supprimées
     */
    public function trashed(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
            
            $categories = Category::onlyTrashed()
                ->orderBy('deleted_at', 'desc')
                ->paginate($perPage);
            
            return response()->json([
                'success' => true,
                'data' => $categories->items(),
                'meta' => [
                    'current_page' => $categories->currentPage(),
                    'last_page' => $categories->lastPage(),
                    'per_page' => $categories->perPage(),
                    'total' => $categories->total()
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des catégories supprimées'
            ], 500);
        }
    }

    /**
     * Récupérer les catégories sous forme d'arbre (pour les menus hiérarchiques)
     */
    public function getTree()
    {
        try {
            $categories = Category::where('status', 'active')
                ->with(['children' => function ($query) {
                    $query->where('status', 'active')
                        ->orderBy('order')
                        ->orderBy('name');
                }])
                ->whereNull('parent_id')
                ->orderBy('order')
                ->orderBy('name')
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => $categories
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement de l\'arbre des catégories'
            ], 500);
        }
    }
}