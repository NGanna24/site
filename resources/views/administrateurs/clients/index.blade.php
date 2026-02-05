@extends('admin.layouts')
@section('content')
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Clients</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de Bord</a></li>
<li class="breadcrumb-item active">Liste des Clients</li>
</ul>
</div>
<div class="col-auto">
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_client">
<i class="fas fa-plus me-2"></i> Nouveau Client
</a>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-header">
<h4 class="card-title">Gestion des Clients</h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-stripped table-center table-hover datatable">
<thead class="thead-light">
<tr>
<th>Client</th>
<th>Contact</th>
<th>Type</th>
<th>Date d'Inscription</th>
<th>Projets</th>
<th>Statut</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
@foreach($clients as $client)
<tr>
<td>
<h2 class="table-avatar">
<a href="">
@if($client->user->avatar)
<img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ asset('storage/' . $client->user->avatar) }}" alt="Image Client">
@else
<img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ asset('admin/assets/img/profiles/avatar-default.jpg') }}" alt="Image Client">
@endif
{{ $client->user->first_name }} {{ $client->user->last_name }}
</a>
</h2>
@if($client->company_name)
<small class="text-muted">{{ $client->company_name }}</small>
@endif
</td>
<td>
<div class="client-contact">
<div><i class="fas fa-envelope me-2 text-primary"></i> {{ $client->user->email }}</div>
@if($client->user->phone)
<div><i class="fas fa-phone me-2 text-success"></i> {{ $client->user->phone }}</div>
@endif
@if($client->user->address)
<div><i class="fas fa-map-marker-alt me-2 text-info"></i> {{ Str::limit($client->user->address, 30) }}</div>
@endif
</div>
</td>
<td>
@if($client->client_type == 'business')
<span class="badge bg-info">Entreprise</span>
@elseif($client->client_type == 'individual')
<span class="badge bg-secondary">Particulier</span>
@elseif($client->client_type == 'education')
<span class="badge bg-warning">Éducation</span>
@else
<span class="badge bg-dark">{{ $client->client_type }}</span>
@endif
</td>
<td>{{ $client->user->created_at->format('d/m/Y') }}</td>
<td>
<div class="project-stats">
<span class="badge bg-primary">{{ $client->projects_count ?? 0 }} projets</span>
@if($client->active_projects_count > 0)
<small class="text-success d-block">{{ $client->active_projects_count }} en cours</small>
@endif
</div>
</td>
<td>
@if($client->user->is_active)
<span class="badge badge-pill bg-success-light">Actif</span>
@else
<span class="badge badge-pill bg-danger-light">Inactif</span>
@endif
</td>
<td class="text-end">
<div class="dropdown">
<button class="btn btn-sm btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
<i class="fas fa-cog me-1"></i> Actions
</button>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item text-success edit-client" href="#" data-bs-toggle="modal" data-bs-target="#edit_client" data-client-id="{{ $client->id }}">
<i class="far fa-edit me-2"></i> Modifier
</a>
<a class="dropdown-item text-info" href="{{ route('admin.clients.show', $client->id) }}">
<i class="far fa-eye me-2"></i> Voir Détails
</a>
<a class="dropdown-item text-primary" href="{{ route('admin.projects.create', ['client_id' => $client->id]) }}">
<i class="fas fa-plus me-2"></i> Nouveau Projet
</a>
<a class="dropdown-item text-warning" href="{{ route('admin.quotes.create', ['client_id' => $client->id]) }}">
<i class="fas fa-file-invoice me-2"></i> Créer Devis
</a>
<div class="dropdown-divider"></div>
@if($client->user->is_active)
<a class="dropdown-item text-warning toggle-status" href="#" data-client-id="{{ $client->id }}" data-status="0">
<i class="fas fa-ban me-2"></i> Désactiver
</a>
@else
<a class="dropdown-item text-success toggle-status" href="#" data-client-id="{{ $client->id }}" data-status="1">
<i class="fas fa-check me-2"></i> Activer
</a>
@endif
<a class="dropdown-item text-danger delete-client" href="#" data-bs-toggle="modal" data-bs-target="#delete_client" data-client-id="{{ $client->id }}" data-client-name="{{ $client->user->first_name }} {{ $client->user->last_name }}">
<i class="far fa-trash-alt me-2"></i> Supprimer
</a>
</div>
</div>
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

<!-- Modal Ajouter Client -->
<div class="modal custom-modal fade" id="add_client" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Ajouter un Client</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="addClientForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Photo de profil -->
                        <div class="col-lg-12 mb-3">
                            <div class="form-group text-center">
                                <label class="form-label">Photo de Profil</label>
                                <div class="avatar-upload-container text-center">
                                    <div class="avatar-preview mb-3">
                                        <img id="add_avatar_preview" src="{{ asset('admin/assets/img/profiles/avatar-default.jpg') }}" 
                                             alt="Aperçu avatar" class="avatar-preview-img rounded-circle">
                                    </div>
                                    <input type="file" class="form-control avatar-upload-input" 
                                           name="avatar" id="add_client_avatar" 
                                           accept="image/*" style="display: none;">
                                    <button type="button" class="btn btn-outline-primary btn-sm" 
                                            onclick="document.getElementById('add_client_avatar').click()">
                                        <i class="fas fa-camera me-2"></i>Changer la photo
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name" placeholder="Prénom" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name" placeholder="Nom" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="email@exemple.com" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="tel" class="form-control" name="phone" placeholder="+225 XX XX XX XX">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Type de Client <span class="text-danger">*</span></label>
                                <select class="form-select" name="client_type" required>
                                    <option value="">Sélectionner le type</option>
                                    <option value="individual">Particulier</option>
                                    <option value="business">Entreprise</option>
                                    <option value="education">Établissement Scolaire</option>
                                    <option value="government">Administration</option>
                                    <option value="association">Association</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom de l'Entreprise</label>
                                <input type="text" class="form-control" name="company_name" placeholder="Nom de l'entreprise (si applicable)">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Adresse</label>
                                <textarea class="form-control" name="address" rows="2" placeholder="Adresse complète"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirmer le mot de passe <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Notes Internes</label>
                                <textarea class="form-control" name="internal_notes" rows="3" placeholder="Notes internes sur le client..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Créer le Client</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Ajouter Client -->

<!-- Modal Modifier Client -->
<div class="modal custom-modal fade" id="edit_client" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Modifier le Client</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="editClientForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="client_id" id="edit_client_id">
                    <div class="row">
                        <!-- Photo de profil -->
                        <div class="col-lg-12 mb-3">
                            <div class="form-group text-center">
                                <label class="form-label">Photo de Profil</label>
                                <div class="avatar-upload-container text-center">
                                    <div class="avatar-preview mb-3">
                                        <img id="edit_avatar_preview" src="" alt="Aperçu avatar" class="avatar-preview-img rounded-circle">
                                    </div>
                                    <input type="file" class="form-control avatar-upload-input" 
                                           name="avatar" id="edit_client_avatar" 
                                           accept="image/*" style="display: none;">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button type="button" class="btn btn-outline-primary btn-sm" 
                                                onclick="document.getElementById('edit_client_avatar').click()">
                                            <i class="fas fa-sync-alt me-2"></i>Changer
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" id="remove_avatar_btn">
                                            <i class="fas fa-trash me-2"></i>Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name" id="edit_first_name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name" id="edit_last_name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="edit_email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="tel" class="form-control" name="phone" id="edit_phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Type de Client <span class="text-danger">*</span></label>
                                <select class="form-select" name="client_type" id="edit_client_type" required>
                                    <option value="individual">Particulier</option>
                                    <option value="business">Entreprise</option>
                                    <option value="education">Établissement Scolaire</option>
                                    <option value="government">Administration</option>
                                    <option value="association">Association</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom de l'Entreprise</label>
                                <input type="text" class="form-control" name="company_name" id="edit_company_name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Adresse</label>
                                <textarea class="form-control" name="address" id="edit_address" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Notes Internes</label>
                                <textarea class="form-control" name="internal_notes" id="edit_internal_notes" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active" value="1">
                                <label class="form-check-label" for="edit_is_active">
                                    Client actif
                                </label>
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
<!-- /Modal Modifier Client -->

<!-- Modal Supprimer Client -->
<div class="modal custom-modal fade" id="delete_client" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Supprimer le Client</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="deleteClientForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="client_id" id="delete_client_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                                <p>Êtes-vous sûr de vouloir supprimer le client <strong id="delete_client_name"></strong> ?</p>
                                <div class="alert alert-danger">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Attention :</strong> Cette action supprimera également tous les projets, devis et factures associés à ce client.
                                </div>
                                <p class="text-danger fw-bold">Cette action est irréversible !</p>
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
<!-- /Modal Supprimer Client -->

@endsection

@section('styles')
<style>
.client-contact div {
    margin-bottom: 5px;
    font-size: 0.875rem;
}

.avatar-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 50%;
    padding: 20px;
    width: 150px;
    height: 150px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
}

.avatar-preview-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.project-stats {
    text-align: center;
}

.table-avatar a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
}

.table-avatar a:hover {
    color: #007bff;
}
</style>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Gestion de l'upload d'avatar pour l'ajout
    const addAvatarInput = document.getElementById('add_client_avatar');
    const addAvatarPreview = document.getElementById('add_avatar_preview');

    addAvatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                addAvatarPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Gestion de l'upload d'avatar pour l'édition
    const editAvatarInput = document.getElementById('edit_client_avatar');
    const editAvatarPreview = document.getElementById('edit_avatar_preview');

    editAvatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                editAvatarPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Supprimer l'avatar dans l'édition
    $('#remove_avatar_btn').on('click', function() {
        editAvatarPreview.src = "{{ asset('admin/assets/img/profiles/avatar-default.jpg') }}";
        editAvatarInput.value = '';
    });

    // Script pour le modal d'édition
    $('.edit-client').on('click', function() {
        const clientId = $(this).data('client-id');
        
        // Ici, vous feriez normalement un appel AJAX pour récupérer les données du client
        // Pour l'exemple, on utilise des données statiques
        $('#edit_client_id').val(clientId);
        $('#edit_first_name').val('Charles');
        $('#edit_last_name').val('Hafner');
        $('#edit_email').val('charles@example.com');
        $('#edit_phone').val('+225 07 07 07 07 07');
        $('#edit_client_type').val('business');
        $('#edit_company_name').val('Hafner Entreprise');
        $('#edit_address').val('Bouaké, Côte d\'Ivoire');
        $('#edit_internal_notes').val('Client fidèle depuis 2020');
        $('#edit_is_active').prop('checked', true);
        
        // Mettre à jour l'aperçu de l'avatar
        editAvatarPreview.src = "{{ asset('admin/assets/img/profiles/avatar-01.jpg') }}";
    });

    // Script pour le modal de suppression
    $('.delete-client').on('click', function() {
        const clientId = $(this).data('client-id');
        const clientName = $(this).data('client-name');
        
        $('#delete_client_id').val(clientId);
        $('#delete_client_name').text(clientName);
    });

    // Toggle du statut du client
    $('.toggle-status').on('click', function(e) {
        e.preventDefault();
        const clientId = $(this).data('client-id');
        const newStatus = $(this).data('status');
        
        // Ici, vous feriez un appel AJAX pour changer le statut
        alert('Statut du client modifié avec succès!');
        location.reload();
    });

    // Validation des formulaires
    $('#addClientForm').on('submit', function(e) {
        const password = $('input[name="password"]').val();
        const passwordConfirmation = $('input[name="password_confirmation"]').val();
        
        if (password !== passwordConfirmation) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas.');
        }
    });
});
</script>
@endsection