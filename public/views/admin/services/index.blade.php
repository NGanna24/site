@extends('admin.layouts')
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Services</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Liste des Services</li>
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
<li><a href="invoice-services.html" class="active">Services</a></li>
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
<a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#add_service">
<i data-feather="plus-circle"></i> Ajouter un Service
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
<th>Image</th>
<th>Nom du Service</th>
<th>Catégorie</th>
<th>Prix</th>
<th>Unité</th>
<th>Statut</th>
<th>Date d'Ajout</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
<tr>
<td>
    <div class="service-image-preview">
        <img src="{{ asset('admin/assets/img/services/logo-design.jpg') }}" alt="Création de Logo" class="service-img">
    </div>
</td>
<td>
<label class="custom_check">
<input type="checkbox" name="service">
<span class="checkmark"></span>
</label>
<a href="#" class="invoice-link">Création de Logo</a>
</td>
<td class="items-text">Infographie</td>
<td>50,000 FCFA</td>
<td>Projet</td>
<td><span class="badge bg-success">Actif</span></td>
<td>16 Mar 2024</td>
<td class="text-end">
<a href="#" class="btn btn-sm btn-white text-success me-2 edit-service" 
   data-bs-toggle="modal" 
   data-bs-target="#edit_service">
   <i class="far fa-edit me-1"></i> Modifier
</a>
<a class="btn btn-sm btn-white text-danger delete-service" 
   href="#" 
   data-bs-toggle="modal" 
   data-bs-target="#delete_service">
   <i class="far fa-trash-alt me-1"></i> Supprimer
</a>
</td>
</tr>
<tr>
<td>
    <div class="service-image-preview">
        <img src="{{ asset('admin/assets/img/services/web-dev.jpg') }}" alt="Développement Web" class="service-img">
    </div>
</td>
<td>
<label class="custom_check">
<input type="checkbox" name="service">
<span class="checkmark"></span>
</label>
<a href="#" class="invoice-link">Développement Site Web</a>
</td>
<td class="items-text">Développement Web</td>
<td>300,000 FCFA</td>
<td>Projet</td>
<td><span class="badge bg-success">Actif</span></td>
<td>14 Mar 2024</td>
<td class="text-end">
<a href="#" class="btn btn-sm btn-white text-success me-2 edit-service" 
   data-bs-toggle="modal" 
   data-bs-target="#edit_service">
   <i class="far fa-edit me-1"></i> Modifier
</a>
<a class="btn btn-sm btn-white text-danger delete-service" 
   href="#" 
   data-bs-toggle="modal" 
   data-bs-target="#delete_service">
   <i class="far fa-trash-alt me-1"></i> Supprimer
</a>
</td>
</tr>
<tr>
<td>
    <div class="service-image-preview">
        <img src="{{ asset('admin/assets/img/services/maintenance.jpg') }}" alt="Maintenance" class="service-img">
    </div>
</td>
<td>
<label class="custom_check">
<input type="checkbox" name="service">
<span class="checkmark"></span>
</label>
<a href="#" class="invoice-link">Maintenance Informatique</a>
</td>
<td class="items-text">Maintenance</td>
<td>25,000 FCFA</td>
<td>Heure</td>
<td><span class="badge bg-success">Actif</span></td>
<td>10 Mar 2024</td>
<td class="text-end">
<a href="#" class="btn btn-sm btn-white text-success me-2 edit-service" 
   data-bs-toggle="modal" 
   data-bs-target="#edit_service">
   <i class="far fa-edit me-1"></i> Modifier
</a>
<a class="btn btn-sm btn-white text-danger delete-service" 
   href="#" 
   data-bs-toggle="modal" 
   data-bs-target="#delete_service">
   <i class="far fa-trash-alt me-1"></i> Supprimer
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal Ajouter Service -->
<div class="modal custom-modal fade" id="add_service" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Ajouter un Service</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addServiceForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Section Image -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image du Service <span class="text-danger">*</span></label>
                                <div class="image-upload-container">
                                    <div class="image-preview mb-3 text-center">
                                        <img id="add_image_preview" src="{{ asset('admin/assets/img/placeholder-image.jpg') }}" 
                                             alt="Aperçu de l'image" class="img-preview">
                                        <div class="image-placeholder" id="add_image_placeholder">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                            <p class="mt-2 text-muted">Cliquez pour télécharger une image</p>
                                        </div>
                                    </div>
                                    <input type="file" class="form-control image-upload-input" 
                                           name="service_image" id="add_service_image" 
                                           accept="image/*" required style="display: none;">
                                    <button type="button" class="btn btn-outline-primary btn-sm w-100" 
                                            onclick="document.getElementById('add_service_image').click()">
                                        <i class="fas fa-upload me-2"></i>Choisir une Image
                                    </button>
                                    <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom du Service <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Ex: Création de Site Web" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Catégorie <span class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="1">Infographie</option>
                                    <option value="2">Impression</option>
                                    <option value="3">Développement Web</option>
                                    <option value="4">Applications Mobiles</option>
                                    <option value="5">Logiciels</option>
                                    <option value="6">Maintenance Informatique</option>
                                    <option value="7">Cyber Café</option>
                                    <option value="8">Formations</option>
                                    <option value="9">Vente Matériel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prix de Base <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="base_price" placeholder="0.00" step="0.01" required>
                                    <span class="input-group-text">FCFA</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Unité <span class="text-danger">*</span></label>
                                <select class="form-select" name="unit" required>
                                    <option value="">Sélectionner l'unité</option>
                                    <option value="hour">Heure</option>
                                    <option value="project">Projet</option>
                                    <option value="item">Pièce</option>
                                    <option value="session">Session</option>
                                    <option value="month">Mois</option>
                                    <option value="user">Utilisateur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Temps Estimé</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="estimated_time" placeholder="0">
                                    <span class="input-group-text">Heures</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Statut</label>
                                <select class="form-select" name="is_active">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description du Service</label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Décrivez le service en détail..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Spécifications Techniques</label>
                                <textarea class="form-control" name="specifications" rows="3" placeholder="Spécifications techniques, prérequis..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Livrables Inclus</label>
                                <textarea class="form-control" name="deliverables" rows="2" placeholder="Liste des livrables inclus dans le service..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer le Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Ajouter Service -->

<!-- Modal Modifier Service -->
<div class="modal custom-modal fade" id="edit_service" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Modifier le Service</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="editServiceForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="service_id" id="edit_service_id">
                    <div class="row">
                        <!-- Section Image -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image du Service</label>
                                <div class="image-upload-container">
                                    <div class="image-preview mb-3 text-center">
                                        <img id="edit_image_preview" src="{{ asset('admin/assets/img/services/logo-design.jpg') }}" 
                                             alt="Aperçu de l'image" class="img-preview">
                                        <div class="image-placeholder" id="edit_image_placeholder" style="display: none;">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                            <p class="mt-2 text-muted">Cliquez pour télécharger une image</p>
                                        </div>
                                    </div>
                                    <input type="file" class="form-control image-upload-input" 
                                           name="service_image" id="edit_service_image" 
                                           accept="image/*" style="display: none;">
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm flex-fill" 
                                                onclick="document.getElementById('edit_service_image').click()">
                                            <i class="fas fa-sync-alt me-2"></i>Changer l'Image
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" id="remove_image_btn">
                                            <i class="fas fa-trash me-2"></i>Supprimer
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">Laisser vide pour garder l'image actuelle</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom du Service <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="edit_service_name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Catégorie <span class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" id="edit_service_category" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="1">Infographie</option>
                                    <option value="2">Impression</option>
                                    <option value="3">Développement Web</option>
                                    <option value="4">Applications Mobiles</option>
                                    <option value="5">Logiciels</option>
                                    <option value="6">Maintenance Informatique</option>
                                    <option value="7">Cyber Café</option>
                                    <option value="8">Formations</option>
                                    <option value="9">Vente Matériel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prix de Base <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="base_price" id="edit_service_price" step="0.01" required>
                                    <span class="input-group-text">FCFA</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Unité <span class="text-danger">*</span></label>
                                <select class="form-select" name="unit" id="edit_service_unit" required>
                                    <option value="">Sélectionner l'unité</option>
                                    <option value="hour">Heure</option>
                                    <option value="project">Projet</option>
                                    <option value="item">Pièce</option>
                                    <option value="session">Session</option>
                                    <option value="month">Mois</option>
                                    <option value="user">Utilisateur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Temps Estimé</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="estimated_time" id="edit_service_time">
                                    <span class="input-group-text">Heures</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Statut</label>
                                <select class="form-select" name="is_active" id="edit_service_status">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description du Service</label>
                                <textarea class="form-control" name="description" id="edit_service_description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Spécifications Techniques</label>
                                <textarea class="form-control" name="specifications" id="edit_service_specs" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Livrables Inclus</label>
                                <textarea class="form-control" name="deliverables" id="edit_service_deliverables" rows="2"></textarea>
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
<!-- /Modal Modifier Service -->

<!-- Modal Supprimer Service -->
<div class="modal custom-modal fade" id="delete_service" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Supprimer le Service</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="deleteServiceForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="service_id" id="delete_service_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                                <p>Êtes-vous sûr de vouloir supprimer ce service ?</p>
                                <p class="text-danger"><strong>Cette action est irréversible !</strong></p>
                                <p>Le service : <span id="delete_service_name" class="fw-bold">[Nom du Service]</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Supprimer Service -->

@endsection

@section('styles')
<style>
.service-image-preview {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.image-upload-container:hover {
    border-color: #007bff;
    background: #f1f8ff;
}

.image-preview {
    position: relative;
}

.img-preview {
    max-width: 200px;
    max-height: 150px;
    border-radius: 8px;
    display: none;
}

.image-placeholder {
    cursor: pointer;
    padding: 20px;
}

.image-upload-container.has-image .image-placeholder {
    display: none;
}

.image-upload-container.has-image .img-preview {
    display: inline-block;
}
</style>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Gestion de l'upload d'image pour l'ajout
    const addImageInput = document.getElementById('add_service_image');
    const addImagePreview = document.getElementById('add_image_preview');
    const addImagePlaceholder = document.getElementById('add_image_placeholder');
    const addImageContainer = addImageInput.closest('.image-upload-container');

    addImageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                addImagePreview.src = e.target.result;
                addImageContainer.classList.add('has-image');
            }
            reader.readAsDataURL(file);
        }
    });

    // Gestion de l'upload d'image pour l'édition
    const editImageInput = document.getElementById('edit_service_image');
    const editImagePreview = document.getElementById('edit_image_preview');
    const editImagePlaceholder = document.getElementById('edit_image_placeholder');
    const editImageContainer = editImageInput.closest('.image-upload-container');

    editImageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                editImagePreview.src = e.target.result;
                editImagePlaceholder.style.display = 'none';
                editImagePreview.style.display = 'inline-block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Supprimer l'image dans l'édition
    $('#remove_image_btn').on('click', function() {
        editImagePreview.style.display = 'none';
        editImagePlaceholder.style.display = 'block';
        editImageInput.value = '';
    });

    // Script pour le modal d'édition (exemple de données)
    $('.edit-service').on('click', function() {
        // Ces données viendraient normalement de la base de données
        $('#edit_service_id').val(1);
        $('#edit_service_name').val('Création de Logo');
        $('#edit_service_category').val(1);
        $('#edit_service_price').val(50000);
        $('#edit_service_unit').val('project');
        $('#edit_service_time').val(8);
        $('#edit_service_status').val(1);
        $('#edit_service_description').val('Création d\'un logo unique et professionnel pour votre entreprise avec 3 propositions différentes.');
        $('#edit_service_specs').val('Format vectoriel, PNG, JPG - Guide d\'utilisation inclus');
        $('#edit_service_deliverables').val('Logo en format vectoriel + versions PNG/JPG + Guide d\'utilisation');
        
        // Réinitialiser l'image
        editImagePreview.style.display = 'inline-block';
        editImagePlaceholder.style.display = 'none';
    });

    // Script pour le modal de suppression
    $('.delete-service').on('click', function() {
        var serviceName = $(this).closest('tr').find('.invoice-link').text();
        $('#delete_service_name').text(serviceName);
    });

    // Validation des formulaires
    $('#addServiceForm').on('submit', function(e) {
        e.preventDefault();
        const imageFile = document.getElementById('add_service_image').files[0];
        if (!imageFile) {
            alert('Veuillez sélectionner une image pour le service.');
            return;
        }
        // Ici serait le code pour envoyer les données au serveur
        alert('Service ajouté avec succès!');
        $('#add_service').modal('hide');
    });

    $('#editServiceForm').on('submit', function(e) {
        e.preventDefault();
        // Ici serait le code pour mettre à jour les données
        alert('Service modifié avec succès!');
        $('#edit_service').modal('hide');
    });

    $('#deleteServiceForm').on('submit', function(e) {
        e.preventDefault();
        // Ici serait le code pour supprimer le service
        alert('Service supprimé avec succès!');
        $('#delete_service').modal('hide');
    });
});
</script>
@endsection