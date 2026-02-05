@extends('admin.layouts')
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Catégories</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Liste des Catégories</li>
</ul>
</div>
</div>
</div>

<div class="card invoices-tabs-card">
<div class="card-body card-body pt-0 pb-0">
<div class="invoices-items-main-tabs">
<div class="row align-items-center">
<div class="col-lg-12 col-md-12">
<div class="invoices-items-tabs">
<ul>
<li><a href="invoice-items.html">Tous les Éléments</a></li>
<li><a href="invoice-category.html" class="active">Catégories</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="card invoices-tabs-card">
<div class="card-body card-body pt-0 pb-0">
<div class="invoices-main-tabs border-0 pb-0">
<div class="row align-items-center">
<div class="col-lg-12 col-md-12">
<div class="invoices-settings-btn invoices-settings-btn-one">
<a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#add_category">
<i data-feather="plus-circle"></i> Ajouter une Catégorie
</a>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-stripped table-hover datatable">
<thead class="thead-light">
<tr>
<th>Nom</th>
<th>Description</th>
<th>Type</th>
<th>Date d'Ajout</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
@foreach($categories as $category)
<tr>
<td>
<label class="custom_check">
<input type="checkbox" name="category" value="{{ $category->id }}">
<span class="checkmark"></span>
</label>
<a href="#" class="invoice-link">{{ $category->name }}</a>
</td>
<td class="items-text">{{ $category->description ?? 'Aucune description' }}</td>
<td>
@if($category->type == 'service')
<span class="badge bg-success">Service</span>
@elseif($category->type == 'product')
<span class="badge bg-info">Produit</span>
@else
<span class="badge bg-secondary">{{ $category->type }}</span>
@endif
</td>
<td>{{ $category->created_at->format('d M Y') }}</td>
<td class="text-end">
<a href="#" class="btn btn-sm btn-white text-success me-2 edit-category" 
   data-bs-toggle="modal" 
   data-bs-target="#edit_category"
   data-id="{{ $category->id }}"
   data-name="{{ $category->name }}"
   data-description="{{ $category->description }}"
   data-type="{{ $category->type }}">
   <i class="far fa-edit me-1"></i> Modifier
</a>
<a class="btn btn-sm btn-white text-danger delete-category" 
   href="#" 
   data-bs-toggle="modal" 
   data-bs-target="#delete_category"
   data-id="{{ $category->id }}"
   data-name="{{ $category->name }}">
   <i class="far fa-trash-alt me-1"></i> Supprimer
</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal Ajouter Catégorie -->
<div class="modal custom-modal fade" id="add_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Ajouter une Catégorie</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" id="addCategoryForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nom de la Catégorie</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex: Développement Web" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-select" name="type" required>
                                    <option value="">Sélectionner le type</option>
                                    <option value="service">Service</option>
                                    <option value="product">Produit</option>
                                    <option value="training">Formation</option>
                                    <option value="cyber">Cyber Café</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Description de la catégorie..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Ajouter Catégorie -->

<!-- Modal Modifier Catégorie -->
<div class="modal custom-modal fade" id="edit_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Modifier la Catégorie</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.update') }}" method="POST" id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category_id" id="edit_category_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nom de la Catégorie</label>
                                <input type="text" class="form-control" name="name" id="edit_category_name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-select" name="type" id="edit_category_type" required>
                                    <option value="">Sélectionner le type</option>
                                    <option value="service">Service</option>
                                    <option value="product">Produit</option>
                                    <option value="training">Formation</option>
                                    <option value="cyber">Cyber Café</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="edit_category_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Modifier Catégorie -->

<!-- Modal Supprimer Catégorie -->
<div class="modal custom-modal fade" id="delete_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Supprimer la Catégorie</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.destroy') }}" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="category_id" id="delete_category_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                                <p>Êtes-vous sûr de vouloir supprimer la catégorie <strong id="delete_category_name"></strong> ?</p>
                                <p class="text-danger">Cette action est irréversible !</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Supprimer Catégorie -->

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Script pour le modal d'édition
    $('.edit-category').on('click', function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');
        var categoryDescription = $(this).data('description');
        var categoryType = $(this).data('type');
        
        $('#edit_category_id').val(categoryId);
        $('#edit_category_name').val(categoryName);
        $('#edit_category_description').val(categoryDescription);
        $('#edit_category_type').val(categoryType);
    });

    // Script pour le modal de suppression
    $('.delete-category').on('click', function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');
        
        $('#delete_category_id').val(categoryId);
        $('#delete_category_name').text(categoryName);
    });

    // Validation des formulaires
    $('#addCategoryForm').on('submit', function(e) {
        var name = $('input[name="name"]').val();
        var type = $('select[name="type"]').val();
        
        if (!name || !type) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
        }
    });

    $('#editCategoryForm').on('submit', function(e) {
        var name = $('#edit_category_name').val();
        var type = $('#edit_category_type').val();
        
        if (!name || !type) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
        }
    });

    // Gestion des messages de succès/erreur
    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif

    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
});
</script>
@endsection