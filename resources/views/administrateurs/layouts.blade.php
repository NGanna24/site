@extends('administrateurs.layouts')

@section('title', 'Gestion des Services')

@section('content')
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <button class="toggle-sidebar" id="toggleSidebar">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h2>Gestion des Services</h2>
            </div>
            <div class="user-info">
                <div class="user-avatar">AK</div>
                <div>
                    <h4>Akmal ⚡</h4>
                    <p style="font-size: 12px; color: #6c757d;">Administrateur</p>
                </div>
            </div>
        </div>

        <!-- Actions Bar -->
        <div class="actions-bar">
            <button class="btn btn-primary" id="addServiceBtn">
                <i class="fas fa-plus"></i> Ajouter un Service
            </button>
            <div class="search-box">
                <input type="text" placeholder="Rechercher un service..." id="searchInput">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon services">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalServices">0</h3>
                    <p>Total Services</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 id="activeServices">0</h3>
                    <p>Services Actifs</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon warning">
                    <i class="fas fa-pause-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 id="inactiveServices">0</h3>
                    <p>Services Inactifs</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon categories">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalCategories">0</h3>
                    <p>Catégories</p>
                </div>
            </div>
        </div>

        <!-- Services Table -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Liste des Services</h3>
                <div class="table-actions">
                    <select id="categoryFilter" class="filter-select">
                        <option value="">Toutes les catégories</option>
                    </select>
                    <select id="statusFilter" class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="services-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Média</th>
                            <th>Statut</th>
                            <th>Date création</th>
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody id="servicesTableBody">
                        <!-- Les services seront chargés ici dynamiquement -->
                        <tr>
                            <td colspan="8" class="text-center" id="loadingRow">
                                <div class="loading-spinner">
                                    <i class="fas fa-spinner fa-spin"></i> Chargement des services...
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="table-footer">
                <div class="table-info" id="tableInfo">
                    Affichage de 0 à 0 sur 0 services
                </div>
                <div class="pagination" id="pagination">
                    <!-- La pagination sera générée ici -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour Ajouter/Modifier un Service -->
    <div class="modal-overlay" id="serviceModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Ajouter un Nouveau Service</h3>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            
            <form id="serviceForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="serviceId" name="id">
                
                <div class="form-group">
                    <label for="title">Titre du Service *</label>
                    <input type="text" id="title" name="title" required 
                           placeholder="Ex: Création de Visuels Professionnels">
                </div>
                
                <div class="form-group">
                    <label for="category_id">Catégorie *</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <!-- Les catégories seront chargées dynamiquement -->
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="4" required
                              placeholder="Décrivez le service en détails..."></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Prix (€)</label>
                        <input type="number" id="price" name="price" step="0.01"
                               placeholder="Ex: 499.99">
                    </div>
                    
                    <div class="form-group">
                        <label for="duration">Durée (jours)</label>
                        <input type="number" id="duration" name="duration"
                               placeholder="Ex: 7">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Type de média</label>
                    <div class="media-type-selector">
                        <label class="media-type-option">
                            <input type="radio" name="media_type" value="image" checked>
                            <span>Image</span>
                        </label>
                        <label class="media-type-option">
                            <input type="radio" name="media_type" value="video">
                            <span>Vidéo (URL YouTube/Vimeo)</span>
                        </label>
                    </div>
                </div>
                
                <div class="form-group" id="imageUploadGroup">
                    <label for="media_files">Images du service *</label>
                    <div class="file-upload-area" id="fileUploadArea">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Glissez-déposez vos images ici ou cliquez pour parcourir</p>
                        <p class="file-types">JPG, PNG, GIF, WEBP (Max 5MB par image)</p>
                        <input type="file" id="media_files" name="media_files[]" 
                               accept="image/*" multiple style="display: none;">
                    </div>
                    <div class="file-preview" id="filePreview"></div>
                </div>
                
                <div class="form-group" id="videoUrlGroup" style="display: none;">
                    <label for="video_url">URL de la vidéo</label>
                    <input type="url" id="video_url" name="video_url"
                           placeholder="https://www.youtube.com/watch?v=... ou https://vimeo.com/...">
                </div>
                
                <div class="form-group">
                    <label for="status">Statut</label>
                    <select id="status" name="status">
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
                
                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de Confirmation de Suppression -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-content delete-modal">
            <div class="modal-header">
                <h3>Confirmer la suppression</h3>
                <button class="close-modal" id="closeDeleteModal">&times;</button>
            </div>
            <div class="modal-body">
                <i class="fas fa-exclamation-triangle warning-icon"></i>
                <p>Êtes-vous sûr de vouloir supprimer ce service ?</p>
                <p class="text-muted">Cette action est irréversible.</p>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Visualisation d'Image -->
    <div class="modal-overlay" id="imagePreviewModal">
        <div class="modal-content image-preview-modal">
            <div class="modal-header">
                <h3>Visualisation d'Image</h3>
                <button class="close-modal" id="closeImagePreview">&times;</button>
            </div>
            <div class="modal-body">
                <img id="previewImage" src="" alt="Preview" style="max-width: 100%; max-height: 70vh;">
            </div>
        </div>
    </div>

    <style>
        /* Variables CSS supplémentaires */
        :root {
            --border-radius: 10px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --btn-primary: #4361ee;
            --btn-primary-hover: #3f37c9;
            --btn-secondary: #6c757d;
            --btn-danger: #dc3545;
            --btn-danger-hover: #c82333;
        }

        /* Styles supplémentaires pour la gestion des services */
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding: 15px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--btn-primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--btn-primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: var(--btn-secondary);
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-danger {
            background: var(--btn-danger);
            color: white;
        }

        .btn-danger:hover {
            background: var(--btn-danger-hover);
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 10px;
        }

        .services-table {
            width: 100%;
            border-collapse: collapse;
        }

        .services-table th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
        }

        .services-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .services-table tr:hover {
            background: #f8f9fa;
        }

        .table-actions {
            display: flex;
            gap: 10px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: white;
            font-size: 14px;
            cursor: pointer;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .table-info {
            color: #6c757d;
            font-size: 14px;
        }

        .pagination {
            display: flex;
            gap: 5px;
        }

        .page-link {
            padding: 6px 12px;
            border: 1px solid #ddd;
            background: white;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 14px;
        }

        .page-link:hover {
            background: #f8f9fa;
        }

        .page-link.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .page-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Styles pour les badges de statut */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-active {
            background: rgba(76, 201, 240, 0.2);
            color: #4cc9f0;
        }

        .status-inactive {
            background: rgba(247, 37, 133, 0.2);
            color: #f72585;
        }

        /* Styles pour les actions */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .edit-btn {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .edit-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .delete-btn {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .delete-btn:hover {
            background: #dc3545;
            color: white;
        }

        .toggle-btn {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .toggle-btn:hover {
            background: #ffc107;
            color: white;
        }

        .view-btn {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .view-btn:hover {
            background: #28a745;
            color: white;
        }

        /* Styles pour les modals */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: var(--border-radius);
            width: 100%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .delete-modal {
            max-width: 500px;
        }

        .image-preview-modal {
            max-width: 800px;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            background: #f8f9fa;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .modal-header h3 {
            margin: 0;
            color: var(--dark-color);
            font-size: 20px;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6c757d;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .close-modal:hover {
            color: var(--dark-color);
            background: #e9ecef;
        }

        .modal-body {
            padding: 20px;
            text-align: center;
        }

        .warning-icon {
            font-size: 48px;
            color: #ffc107;
            margin-bottom: 15px;
        }

        /* Styles pour le formulaire */
        form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .media-type-selector {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .media-type-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s;
            flex: 1;
        }

        .media-type-option:hover {
            border-color: var(--primary-color);
            background: rgba(67, 97, 238, 0.05);
        }

        .media-type-option input[type="radio"] {
            margin: 0;
        }

        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 6px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-area:hover {
            border-color: var(--primary-color);
            background: rgba(67, 97, 238, 0.05);
        }

        .file-upload-area i {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .file-types {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .file-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        .preview-item {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 6px;
            overflow: hidden;
            height: 120px;
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .preview-item img:hover {
            transform: scale(1.05);
        }

        .remove-preview {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            z-index: 2;
            transition: all 0.3s;
        }

        .remove-preview:hover {
            background: #dc3545;
            transform: scale(1.1);
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
        }

        .loading-spinner {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px;
            color: #6c757d;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6c757d !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .actions-bar {
                flex-direction: column;
                gap: 15px;
            }
            
            .search-box {
                width: 100%;
            }
            
            .table-footer {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }
            
            .pagination {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .media-type-selector {
                flex-direction: column;
                gap: 10px;
            }
            
            .modal-content {
                margin: 10px;
                max-height: 80vh;
            }
        }
    </style>

    <script>
        // VERSION CORRIGÉE ET OPTIMISÉE
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page services initialisée');
            
            // Variables globales
            let currentServiceId = null;
            let currentPage = 1;
            let services = [];
            let categories = [];
            let mediaFiles = [];
            let existingMedia = [];

            // Récupérer le token CSRF
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            console.log('CSRF Token:', csrfToken ? '✓ Présent' : '✗ Manquant');

            // Initialisation
            init();

            async function init() {
                console.log('Initialisation en cours...');
                try {
                    await loadCategories();
                    await loadServices();
                    setupEventListeners();
                    console.log('Initialisation terminée ✓');
                } catch (error) {
                    console.error('Erreur lors de l\'initialisation:', error);
                    showNotification('Erreur lors de l\'initialisation de la page', 'error');
                }
            }

            // Fonction utilitaire pour les requêtes
            async function makeRequest(url, method = 'GET', data = null) {
                const headers = {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                
                // Ajouter CSRF token seulement s'il existe
                if (csrfToken) {
                    headers['X-CSRF-TOKEN'] = csrfToken;
                }
                
                const config = {
                    method: method,
                    headers: headers,
                    credentials: 'same-origin'
                };
                
                if (data) {
                    if (data instanceof FormData) {
                        config.body = data;
                        // Ajouter le token dans le FormData pour les requêtes POST/PUT/DELETE
                        if (csrfToken && ['POST', 'PUT', 'PATCH', 'DELETE'].includes(method.toUpperCase())) {
                            data.append('_token', csrfToken);
                        }
                    } else {
                        headers['Content-Type'] = 'application/json';
                        const requestData = { ...data };
                        if (csrfToken && ['POST', 'PUT', 'PATCH', 'DELETE'].includes(method.toUpperCase())) {
                            requestData._token = csrfToken;
                        }
                        config.body = JSON.stringify(requestData);
                    }
                }
                
                console.log(`Requête ${method} vers: ${url}`, data ? 'avec données' : 'sans données');
                
                try {
                    const response = await fetch(url, config);
                    
                    if (response.status === 419) {
                        // Session expirée
                        showNotification('Votre session a expiré. Redirection...', 'error');
                        setTimeout(() => window.location.reload(), 2000);
                        return { success: false, message: 'Session expirée' };
                    }
                    
                    if (response.status === 401) {
                        // Non autorisé
                        showNotification('Accès non autorisé', 'error');
                        return { success: false, message: 'Non autorisé' };
                    }
                    
                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Erreur HTTP:', response.status, errorText);
                        return {
                            success: false,
                            message: `Erreur ${response.status}: ${response.statusText}`,
                            status: response.status
                        };
                    }
                    
                    return await response.json();
                    
                } catch (error) {
                    console.error('Erreur réseau:', error);
                    return {
                        success: false,
                        message: 'Erreur réseau: ' + error.message
                    };
                }
            }

            // Charger les catégories
            async function loadCategories() {
                console.log('Chargement des catégories...');
                try {
                    const data = await makeRequest('/administrateurs/categories?status=active');
                    
                    if (data.success) {
                        categories = data.data || [];
                        console.log(`${categories.length} catégories chargées`);
                        
                        // Mettre à jour les selects
                        const categorySelect = document.getElementById('category_id');
                        const filterSelect = document.getElementById('categoryFilter');
                        
                        if (categorySelect) {
                            categorySelect.innerHTML = '<option value="">Sélectionnez une catégorie</option>';
                            categories.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.id;
                                option.textContent = category.name;
                                categorySelect.appendChild(option);
                            });
                        }
                        
                        if (filterSelect) {
                            filterSelect.innerHTML = '<option value="">Toutes les catégories</option>';
                            categories.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.id;
                                option.textContent = category.name;
                                filterSelect.appendChild(option);
                            });
                        }
                    } else {
                        console.warn('Erreur lors du chargement des catégories:', data.message);
                        showNotification('Impossible de charger les catégories', 'warning');
                    }
                } catch (error) {
                    console.error('Erreur lors du chargement des catégories:', error);
                    showNotification('Erreur lors du chargement des catégories', 'error');
                }
            }

            // Charger les services
            async function loadServices() {
                console.log('Chargement des services...');
                try {
                    showLoading(true);
                    
                    const search = document.getElementById('searchInput')?.value || '';
                    const status = document.getElementById('statusFilter')?.value || '';
                    const category = document.getElementById('categoryFilter')?.value || '';
                    
                    // Construire l'URL avec les paramètres
                    let url = `/administrateurs/services?ajax=1&page=${currentPage}&per_page=10`;
                    
                    if (search) url += `&search=${encodeURIComponent(search)}`;
                    if (status) url += `&status=${encodeURIComponent(status)}`;
                    if (category) url += `&category_id=${encodeURIComponent(category)}`;
                    
                    console.log('URL de chargement:', url);
                    
                    const data = await makeRequest(url);
                    
                    if (data.success) {
                        services = data.data || [];
                        console.log(`${services.length} services chargés`);
                        renderServicesTable();
                        updateStats(data.stats || {});
                        updateTableInfo(data.meta || {});
                        updatePagination(data.meta || {});
                    } else {
                        console.warn('Erreur lors du chargement des services:', data.message);
                        showNotification(data.message || 'Erreur lors du chargement des services', 'error');
                        renderEmptyTable();
                    }
                    
                } catch (error) {
                    console.error('Erreur lors du chargement des services:', error);
                    showNotification('Erreur lors du chargement des services', 'error');
                    renderEmptyTable();
                } finally {
                    showLoading(false);
                }
            }

            // Afficher les services dans le tableau
            function renderServicesTable() {
                const tbody = document.getElementById('servicesTableBody');
                
                if (!tbody) {
                    console.error('Table body non trouvé');
                    return;
                }
                
                if (!services || services.length === 0) {
                    renderEmptyTable();
                    return;
                }

                tbody.innerHTML = services.map(service => {
                    const featuredImage = service.media?.find(m => m.is_featured) || service.media?.[0];
                    const imageUrl = featuredImage ? `/storage/${featuredImage.path}` : '/images/default-service.jpg';
                    const shortDesc = service.short_description || 
                        (service.description ? service.description.substring(0, 100) + '...' : '—');
                    
                    return `
                        <tr data-id="${service.id}">
                            <td>${service.id}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    ${service.media?.length > 0 ? `
                                        <img src="${imageUrl}" 
                                             alt="${service.title}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    ` : ''}
                                    <div>
                                        <strong style="display: block; margin-bottom: 5px;">${service.title}</strong>
                                        ${service.price ? `
                                            <div class="text-muted" style="font-size: 12px;">
                                                €${parseFloat(service.price).toFixed(2)}
                                            </div>
                                        ` : ''}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background: #e3f2fd; color: #1976d2; padding: 4px 8px; border-radius: 12px; font-size: 12px;">
                                    ${service.category?.name || 'Non catégorisé'}
                                </span>
                            </td>
                            <td style="max-width: 300px;">
                                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="${service.description}">
                                    ${shortDesc}
                                </div>
                            </td>
                            <td>
                                ${service.media_type === 'video' ? 
                                    `<div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fas fa-video" style="color: #f72585;"></i>
                                        <span style="font-size: 12px;">Vidéo</span>
                                    </div>` : 
                                    `<div style="display: flex; align-items: center; gap: 8px;">
                                        <i class="fas fa-images" style="color: #4cc9f0;"></i>
                                        <span style="font-size: 12px;">${service.media?.length || 0} image(s)</span>
                                    </div>`}
                            </td>
                            <td>
                                <span class="status-badge status-${service.status}">
                                    <i class="fas fa-circle" style="font-size: 8px;"></i>
                                    ${service.status === 'active' ? 'Actif' : 'Inactif'}
                                </span>
                            </td>
                            <td>${formatDate(service.created_at)}</td>
                            <td>
                                <div class="action-buttons">
                                    ${service.media?.length > 0 ? 
                                        `<button class="action-btn view-btn" onclick="viewServiceImages(${service.id})" title="Voir les images">
                                            <i class="fas fa-eye"></i>
                                        </button>` : ''}
                                    <button class="action-btn edit-btn" onclick="editService(${service.id})" 
                                            title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="confirmDelete(${service.id})" 
                                            title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="action-btn toggle-btn" onclick="toggleStatus(${service.id})" 
                                            title="${service.status === 'active' ? 'Désactiver' : 'Activer'}">
                                        <i class="fas fa-power-off"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
            }

            // Afficher un tableau vide
            function renderEmptyTable() {
                const tbody = document.getElementById('servicesTableBody');
                if (!tbody) return;
                
                tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center">
                            <div style="padding: 40px; color: #6c757d;">
                                <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                                <p>Aucun service trouvé</p>
                                ${document.getElementById('searchInput')?.value || 
                                  document.getElementById('statusFilter')?.value || 
                                  document.getElementById('categoryFilter')?.value ? 
                                    '<small>Essayez de modifier vos filtres de recherche</small>' : ''}
                            </div>
                        </td>
                    </tr>
                `;
            }

            // Mettre à jour les statistiques
            function updateStats(stats) {
                document.getElementById('totalServices').textContent = stats.total || 0;
                document.getElementById('activeServices').textContent = stats.active || 0;
                document.getElementById('inactiveServices').textContent = stats.inactive || 0;
                document.getElementById('totalCategories').textContent = categories.length || 0;
            }

            // Mettre à jour les informations du tableau
            function updateTableInfo(meta) {
                const infoElement = document.getElementById('tableInfo');
                if (!infoElement) return;
                
                const startIndex = meta.from || 0;
                const endIndex = meta.to || 0;
                const total = meta.total || 0;
                infoElement.textContent = 
                    `Affichage de ${startIndex} à ${endIndex} sur ${total} services`;
            }

            // Mettre à jour la pagination
            function updatePagination(meta) {
                const paginationElement = document.getElementById('pagination');
                if (!paginationElement) return;
                
                const totalPages = meta.last_page || 1;
                const current = meta.current_page || 1;
                
                if (totalPages <= 1) {
                    paginationElement.innerHTML = '';
                    return;
                }

                let html = '';
                
                // Bouton précédent
                html += `<button class="page-link ${current === 1 ? 'disabled' : ''}" 
                          onclick="changePage(${current - 1})" ${current === 1 ? 'disabled' : ''}>
                          <i class="fas fa-chevron-left"></i>
                        </button>`;
                
                // Pages
                const maxVisiblePages = 5;
                let startPage = Math.max(1, current - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
                
                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }
                
                for (let i = startPage; i <= endPage; i++) {
                    if (i === startPage && startPage > 1) {
                        html += `<button class="page-link" onclick="changePage(1)">1</button>`;
                        if (startPage > 2) html += '<span class="page-link disabled">...</span>';
                    }
                    
                    html += `<button class="page-link ${i === current ? 'active' : ''}" 
                              onclick="changePage(${i})">${i}</button>`;
                    
                    if (i === endPage && endPage < totalPages) {
                        if (endPage < totalPages - 1) html += '<span class="page-link disabled">...</span>';
                        html += `<button class="page-link" onclick="changePage(${totalPages})">${totalPages}</button>`;
                    }
                }
                
                // Bouton suivant
                html += `<button class="page-link ${current === totalPages ? 'disabled' : ''}" 
                          onclick="changePage(${current + 1})" ${current === totalPages ? 'disabled' : ''}>
                          <i class="fas fa-chevron-right"></i>
                        </button>`;
                
                paginationElement.innerHTML = html;
            }

            // Configurer les écouteurs d'événements
            function setupEventListeners() {
                console.log('Configuration des écouteurs d\'événements...');
                
                // Bouton d'ajout
                const addBtn = document.getElementById('addServiceBtn');
                if (addBtn) {
                    addBtn.addEventListener('click', openAddModal);
                }
                
                // Fermer les modals
                attachModalListeners();
                
                // Gestion du type de média
                document.querySelectorAll('input[name="media_type"]').forEach(radio => {
                    radio.addEventListener('change', toggleMediaType);
                });
                
                // Upload de fichiers
                setupFileUpload();
                
                // Recherche et filtres
                const searchInput = document.getElementById('searchInput');
                const categoryFilter = document.getElementById('categoryFilter');
                const statusFilter = document.getElementById('statusFilter');
                
                if (searchInput) searchInput.addEventListener('input', debounce(filterServices, 500));
                if (categoryFilter) categoryFilter.addEventListener('change', filterServices);
                if (statusFilter) statusFilter.addEventListener('change', filterServices);
                
                // Soumission du formulaire
                const serviceForm = document.getElementById('serviceForm');
                if (serviceForm) {
                    serviceForm.addEventListener('submit', saveService);
                }
                
                console.log('Écouteurs d\'événements configurés ✓');
            }

            // Attacher les écouteurs pour les modals
            function attachModalListeners() {
                // Fermer les modals
                document.getElementById('closeModal')?.addEventListener('click', closeModal);
                document.getElementById('closeDeleteModal')?.addEventListener('click', closeDeleteModal);
                document.getElementById('closeImagePreview')?.addEventListener('click', closeImagePreview);
                document.getElementById('cancelBtn')?.addEventListener('click', closeModal);
                document.getElementById('cancelDeleteBtn')?.addEventListener('click', closeDeleteModal);
                
                // Confirmer la suppression
                document.getElementById('confirmDeleteBtn')?.addEventListener('click', deleteService);
                
                // Fermer les modals en cliquant à l'extérieur
                document.addEventListener('click', (e) => {
                    if (e.target.id === 'serviceModal') closeModal();
                    if (e.target.id === 'deleteModal') closeDeleteModal();
                    if (e.target.id === 'imagePreviewModal') closeImagePreview();
                });
                
                // Fermer avec ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        closeModal();
                        closeDeleteModal();
                        closeImagePreview();
                    }
                });
            }

            // Configurer l'upload de fichiers
            function setupFileUpload() {
                const fileUploadArea = document.getElementById('fileUploadArea');
                const fileInput = document.getElementById('media_files');
                
                if (!fileUploadArea || !fileInput) return;
                
                fileUploadArea.addEventListener('click', () => fileInput.click());
                fileUploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    fileUploadArea.style.borderColor = '#4361ee';
                    fileUploadArea.style.backgroundColor = 'rgba(67, 97, 238, 0.1)';
                });
                fileUploadArea.addEventListener('dragleave', () => {
                    fileUploadArea.style.borderColor = '#ddd';
                    fileUploadArea.style.backgroundColor = '';
                });
                fileUploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    fileUploadArea.style.borderColor = '#ddd';
                    fileUploadArea.style.backgroundColor = '';
                    
                    if (e.dataTransfer.files.length) {
                        handleFileUpload(e.dataTransfer.files);
                    }
                });
                
                fileInput.addEventListener('change', (e) => {
                    if (e.target.files.length) {
                        handleFileUpload(e.target.files);
                    }
                });
            }

            // Fonctions pour les modals
            async function openAddModal() {
                console.log('Ouverture du modal d\'ajout');
                document.getElementById('modalTitle').textContent = 'Ajouter un Nouveau Service';
                document.getElementById('serviceForm').reset();
                document.getElementById('serviceId').value = '';
                document.getElementById('status').value = 'active';
                document.getElementById('filePreview').innerHTML = '';
                mediaFiles = [];
                existingMedia = [];
                
                document.querySelector('input[name="media_type"][value="image"]').checked = true;
                toggleMediaType();
                
                document.getElementById('serviceModal').classList.add('show');
            }

            async function openEditModal(service) {
                console.log('Ouverture du modal d\'édition pour service ID:', service.id);
                try {
                    const data = await makeRequest(`/administrateurs/services/${service.id}/edit`);
                    
                    if (data.success) {
                        document.getElementById('modalTitle').textContent = 'Modifier le Service';
                        document.getElementById('serviceId').value = data.data.id;
                        document.getElementById('title').value = data.data.title;
                        document.getElementById('category_id').value = data.data.category_id;
                        document.getElementById('description').value = data.data.description;
                        document.getElementById('status').value = data.data.status;
                        
                        // Gérer le type de média
                        const mediaType = data.data.media_type || 'image';
                        document.querySelector(`input[name="media_type"][value="${mediaType}"]`).checked = true;
                        
                        if (mediaType === 'video') {
                            document.getElementById('video_url').value = data.data.video_url || '';
                        }
                        
                        toggleMediaType();
                        
                        // Gérer les médias existants
                        existingMedia = data.data.media || [];
                        updateFilePreview();
                        
                        document.getElementById('serviceModal').classList.add('show');
                    } else {
                        showNotification(data.message || 'Erreur lors du chargement du service', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors du chargement du service:', error);
                    showNotification('Erreur lors du chargement du service', 'error');
                }
            }

            function closeModal() {
                document.getElementById('serviceModal')?.classList.remove('show');
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                if (modal) {
                    modal.classList.remove('show');
                    currentServiceId = null;
                }
            }

            function closeImagePreview() {
                document.getElementById('imagePreviewModal')?.classList.remove('show');
            }

            // Gérer le type de média
            function toggleMediaType() {
                const mediaType = document.querySelector('input[name="media_type"]:checked')?.value;
                const imageGroup = document.getElementById('imageUploadGroup');
                const videoGroup = document.getElementById('videoUrlGroup');
                
                if (!mediaType) return;
                
                if (mediaType === 'image') {
                    if (imageGroup) imageGroup.style.display = 'block';
                    if (videoGroup) videoGroup.style.display = 'none';
                } else {
                    if (imageGroup) imageGroup.style.display = 'none';
                    if (videoGroup) videoGroup.style.display = 'block';
                }
            }

            // Gérer l'upload de fichiers
            function handleFileUpload(files) {
                Array.from(files).forEach(file => {
                    if (!file.type.startsWith('image/')) {
                        showNotification('Seules les images sont acceptées', 'error');
                        return;
                    }
                    
                    if (file.size > 5 * 1024 * 1024) {
                        showNotification(`L'image ${file.name} dépasse 5MB`, 'error');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        mediaFiles.push({
                            file: file,
                            preview: e.target.result,
                            name: file.name,
                            size: file.size
                        });
                        updateFilePreview();
                    };
                    reader.readAsDataURL(file);
                });
                
                document.getElementById('media_files').value = '';
            }

            function updateFilePreview() {
                const previewContainer = document.getElementById('filePreview');
                if (!previewContainer) return;
                
                previewContainer.innerHTML = '';
                
                // Afficher les médias existants
                existingMedia.forEach((media, index) => {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    previewItem.innerHTML = `
                        <img src="/storage/${media.path}" 
                             alt="${media.alt_text || ''}" 
                             onclick="viewImagePreview('/storage/${media.path}')">
                        <button type="button" class="remove-preview" onclick="removeExistingMedia(${media.id}, ${index})">
                            <i class="fas fa-times"></i>
                        </button>
                        <div style="position: absolute; bottom: 5px; left: 5px; background: rgba(0,0,0,0.7); color: white; padding: 2px 6px; border-radius: 4px; font-size: 10px;">
                            Existant
                        </div>
                    `;
                    previewContainer.appendChild(previewItem);
                });
                
                // Afficher les nouveaux fichiers
                mediaFiles.forEach((fileData, index) => {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    previewItem.innerHTML = `
                        <img src="${fileData.preview}" 
                             alt="Preview" 
                             onclick="viewImagePreview('${fileData.preview}')">
                        <button type="button" class="remove-preview" onclick="removeNewMedia(${index})">
                            <i class="fas fa-times"></i>
                        </button>
                        <div style="position: absolute; bottom: 5px; left: 5px; background: rgba(67, 97, 238, 0.9); color: white; padding: 2px 6px; border-radius: 4px; font-size: 10px;">
                            Nouveau
                        </div>
                    `;
                    previewContainer.appendChild(previewItem);
                });
            }

            // Sauvegarder le service
            async function saveService(e) {
                e.preventDefault();
                console.log('Sauvegarde du service...');
                
                if (!validateForm()) {
                    return;
                }
                
                const serviceId = document.getElementById('serviceId').value;
                const isEdit = !!serviceId;
                const mediaType = document.querySelector('input[name="media_type"]:checked')?.value;
                
                try {
                    const saveBtn = document.getElementById('saveBtn');
                    if (!saveBtn) return;
                    
                    const originalText = saveBtn.innerHTML;
                    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
                    saveBtn.disabled = true;
                    
                    const formData = new FormData();
                    formData.append('title', document.getElementById('title').value);
                    formData.append('category_id', document.getElementById('category_id').value);
                    formData.append('description', document.getElementById('description').value);
                    formData.append('price', document.getElementById('price').value || '');
                    formData.append('duration', document.getElementById('duration').value || '');
                    formData.append('media_type', mediaType);
                    formData.append('status', document.getElementById('status').value);
                    
                    if (mediaType === 'video') {
                        formData.append('video_url', document.getElementById('video_url').value);
                    }
                    
                    // Ajouter les nouveaux fichiers
                    mediaFiles.forEach((fileData, index) => {
                        formData.append('media_files[]', fileData.file);
                        formData.append('alt_text[]', '');
                    });
                    
                    const url = isEdit 
                        ? `/administrateurs/services/${serviceId}` 
                        : '/administrateurs/services';
                    
                    // Pour Laravel, on utilise _method pour PUT
                    if (isEdit) {
                        formData.append('_method', 'PUT');
                    }
                    
                    console.log('Envoi des données à:', url, isEdit ? '(PUT)' : '(POST)');
                    
                    const data = await makeRequest(url, 'POST', formData);
                    
                    if (data.success) {
                        showNotification(data.message, 'success');
                        closeModal();
                        await loadServices();
                    } else {
                        if (data.errors) {
                            Object.values(data.errors).forEach(errorArray => {
                                errorArray.forEach(error => {
                                    showNotification(error, 'error');
                                });
                            });
                        } else {
                            showNotification(data.message || 'Erreur lors de la sauvegarde', 'error');
                        }
                    }
                    
                } catch (error) {
                    console.error('Erreur lors de la sauvegarde:', error);
                    showNotification('Erreur: ' + error.message, 'error');
                } finally {
                    const saveBtn = document.getElementById('saveBtn');
                    if (saveBtn) {
                        saveBtn.innerHTML = '<i class="fas fa-save"></i> Enregistrer';
                        saveBtn.disabled = false;
                    }
                }
            }

            // Validation du formulaire
            function validateForm() {
                const title = document.getElementById('title')?.value.trim();
                const category = document.getElementById('category_id')?.value;
                const description = document.getElementById('description')?.value.trim();
                const mediaType = document.querySelector('input[name="media_type"]:checked')?.value;
                
                if (!title) {
                    showNotification('Le titre est requis', 'error');
                    document.getElementById('title').focus();
                    return false;
                }
                
                if (!category) {
                    showNotification('La catégorie est requise', 'error');
                    document.getElementById('category_id').focus();
                    return false;
                }
                
                if (!description) {
                    showNotification('La description est requise', 'error');
                    document.getElementById('description').focus();
                    return false;
                }
                
                if (mediaType === 'image' && mediaFiles.length === 0 && existingMedia.length === 0) {
                    showNotification('Veuillez ajouter au moins une image', 'error');
                    return false;
                }
                
                if (mediaType === 'video') {
                    const videoUrl = document.getElementById('video_url')?.value.trim();
                    if (!videoUrl) {
                        showNotification('L\'URL de la vidéo est requise', 'error');
                        return false;
                    }
                }
                
                return true;
            }

            // Fonctions globales
            window.changePage = function(page) {
                console.log('Changement de page:', page);
                currentPage = page;
                loadServices();
            };

            window.editService = function(id) {
                console.log('Édition service ID:', id);
                const service = services.find(s => s.id == id);
                if (service) {
                    openEditModal(service);
                }
            };

            window.confirmDelete = function(id) {
                console.log('Confirmation suppression service ID:', id);
                currentServiceId = id;
                const service = services.find(s => s.id == id);
                if (service) {
                    document.getElementById('deleteModal')?.classList.add('show');
                }
            };

            window.toggleStatus = async function(id) {
                console.log('Changement statut service ID:', id);
                try {
                    const data = await makeRequest(`/administrateurs/services/toggle-status/${id}`, 'POST');
                    
                    if (data.success) {
                        showNotification(data.message, 'success');
                        await loadServices();
                    } else {
                        showNotification(data.message || 'Erreur lors du changement de statut', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors du changement de statut:', error);
                    showNotification('Erreur lors du changement de statut', 'error');
                }
            };

            window.removeNewMedia = function(index) {
                console.log('Suppression nouveau média index:', index);
                mediaFiles.splice(index, 1);
                updateFilePreview();
            };

            window.removeExistingMedia = async function(mediaId, index) {
                console.log('Suppression média existant ID:', mediaId);
                try {
                    const data = await makeRequest(`/administrateurs/services/${currentServiceId}/media/${mediaId}`, 'DELETE');
                    
                    if (data.success) {
                        existingMedia.splice(index, 1);
                        updateFilePreview();
                        showNotification('Média supprimé', 'success');
                    } else {
                        showNotification(data.message || 'Erreur lors de la suppression', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors de la suppression du média:', error);
                    showNotification('Erreur lors de la suppression du média', 'error');
                }
            };

            window.viewImagePreview = function(imageSrc) {
                console.log('Visualisation image:', imageSrc);
                const previewImage = document.getElementById('previewImage');
                const modal = document.getElementById('imagePreviewModal');
                
                if (previewImage && modal) {
                    previewImage.src = imageSrc;
                    modal.classList.add('show');
                }
            };

            window.viewServiceImages = function(serviceId) {
                console.log('Visualisation images du service ID:', serviceId);
                const service = services.find(s => s.id == serviceId);
                if (service && service.media?.length > 0) {
                    const firstImage = service.media[0];
                    viewImagePreview(`/storage/${firstImage.path}`);
                }
            };

            // Supprimer un service
            async function deleteService() {
                if (!currentServiceId) return;
                
                console.log('Suppression service ID:', currentServiceId);
                try {
                    const data = await makeRequest(`/administrateurs/services/${currentServiceId}`, 'DELETE');
                    
                    if (data.success) {
                        showNotification(data.message, 'success');
                        closeDeleteModal();
                        await loadServices();
                        currentServiceId = null;
                    } else {
                        showNotification(data.message || 'Erreur lors de la suppression', 'error');
                    }
                } catch (error) {
                    console.error('Erreur lors de la suppression:', error);
                    showNotification('Erreur lors de la suppression du service', 'error');
                }
            }

            // Filtrer les services
            function filterServices() {
                console.log('Filtrage des services');
                currentPage = 1;
                loadServices();
            }

            // Fonction debounce
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Afficher/masquer le chargement
            function showLoading(show) {
                const loadingRow = document.getElementById('loadingRow');
                if (loadingRow) {
                    loadingRow.style.display = show ? 'table-row' : 'none';
                }
            }

            // Formater une date
            function formatDate(dateString) {
                if (!dateString) return '—';
                try {
                    const date = new Date(dateString);
                    return date.toLocaleDateString('fr-FR', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                } catch (e) {
                    return '—';
                }
            }

            // Afficher une notification
            function showNotification(message, type = 'info') {
                console.log(`Notification ${type}: ${message}`);
                
                // Supprimer les notifications existantes
                const existingNotifications = document.querySelectorAll('.notification');
                existingNotifications.forEach(notification => notification.remove());
                
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.innerHTML = `
                    <div class="notification-content">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                        <span>${message}</span>
                    </div>
                    <button class="notification-close" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                
                document.body.appendChild(notification);
                
                setTimeout(() => notification.classList.add('show'), 10);
                
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.classList.remove('show');
                        setTimeout(() => {
                            if (notification.parentNode) notification.remove();
                        }, 300);
                    }
                }, 5000);
            }
        });
    </script>

    <style>
        /* Styles pour les notifications */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 300px;
            max-width: 400px;
            transform: translateX(120%);
            transition: transform 0.3s ease;
            z-index: 9999;
            border-left: 4px solid #4361ee;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification-success {
            border-left-color: #06d6a0;
        }
        
        .notification-error {
            border-left-color: #ef476f;
        }
        
        .notification-warning {
            border-left-color: #ffc107;
        }
        
        .notification-info {
            border-left-color: #4361ee;
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }
        
        .notification-content i {
            font-size: 20px;
        }
        
        .notification-success .notification-content i {
            color: #06d6a0;
        }
        
        .notification-error .notification-content i {
            color: #ef476f;
        }
        
        .notification-warning .notification-content i {
            color: #ffc107;
        }
        
        .notification-info .notification-content i {
            color: #4361ee;
        }
        
        .notification-close {
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            margin-left: 10px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
        }
        
        .notification-close:hover {
            color: #212529;
            background: #f8f9fa;
        }
        
        @media (max-width: 768px) {
            .notification {
                min-width: auto;
                width: calc(100% - 40px);
                max-width: none;
                left: 20px;
                right: 20px;
                top: 10px;
            }
        }
    </style>
@endsection