@extends('administrateurs.layouts')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- En-tête -->
        <div class="page-header"> 
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Détails de la Catégorie</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('administrateurs.accueil') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-1"></i> Modifier
                    </a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Informations principales -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            @if($category->icon)
                                <i class="{{ $category->icon }} fa-2x me-3" style="color: {{ $category->color }}"></i>
                            @endif
                            <div>
                                <h4 class="mb-0">{{ $category->name }}</h4>
                                <p class="text-muted mb-0">ID: #{{ $category->id }}</p>
                            </div>
                            <div class="ms-auto">
                                @if($category->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <h6 class="text-muted">Type</h6>
                                    <p>
                                        @if($category->type == 'service')
                                            <span class="badge bg-success">Service</span>
                                        @elseif($category->type == 'product')
                                            <span class="badge bg-info">Produit</span>
                                        @else
                                            <span class="badge bg-warning">Portfolio</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <h6 class="text-muted">Catégorie Parente</h6>
                                    <p>
                                        @if($category->parent)
                                            <a href="{{ route('categories.show', $category->parent->id) }}" class="text-primary">
                                                {{ $category->parent->name }}
                                            </a>
                                        @else
                                            <span class="text-muted">Catégorie racine</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if($category->description)
                            <div class="info-item mb-4">
                                <h6 class="text-muted">Description</h6>
                                <p>{{ $category->description }}</p>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="info-item">
                                    <h6 class="text-muted">Créée le</h6>
                                    <p>{{ $category->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-item">
                                    <h6 class="text-muted">Créée par</h6>
                                    <p>{{ $category->creator->name ?? 'Système' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-item">
                                    <h6 class="text-muted">Dernière modification</h6>
                                    <p>{{ $category->updated_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sous-catégories -->
                @if($category->children->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Sous-catégories ({{ $category->children->count() }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->children as $child)
                                    <tr>
                                        <td>
                                            <a href="{{ route('categories.show', $child->id) }}" class="text-primary">
                                                {{ $child->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $child->type == 'service' ? 'success' : ($child->type == 'product' ? 'info' : 'warning') }}">
                                                {{ $child->type }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($child->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.show', $child->id) }}" class="btn btn-sm btn-light">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Statistiques -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Statistiques</h5>
                    </div>
                    <div class="card-body">
                        <div class="stats-list">
                            <div class="stat-item d-flex justify-content-between mb-3">
                                <span>Services</span>
                                <strong>{{ $category->services->count() }}</strong>
                            </div>
                            <div class="stat-item d-flex justify-content-between mb-3">
                                <span>Produits</span>
                                <strong>{{ $category->products->count() }}</strong>
                            </div>
                            <div class="stat-item d-flex justify-content-between mb-3">
                                <span>Sous-catégories</span>
                                <strong>{{ $category->children->count() }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Actions rapides</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-1"></i> Modifier
                            </a>
                            <a href="{{ route('categories.toggle-status', $category->id) }}" class="btn btn-{{ $category->is_active ? 'warning' : 'success' }}">
                                @if($category->is_active)
                                    <i class="fas fa-eye-slash me-1"></i> Désactiver
                                @else
                                    <i class="fas fa-eye me-1"></i> Activer
                                @endif
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-1"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer la catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer la catégorie <strong>{{ $category->name }}</strong> ?</p>
                @if($category->children->count() > 0)
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Cette catégorie a {{ $category->children->count() }} sous-catégorie(s). 
                        Elles seront également supprimées.
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection