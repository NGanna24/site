@extends('administrateurs.layouts')

@section('content')
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <button class="toggle-sidebar" id="toggleSidebar">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h2>Gestion des Catégories</h2>
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
            <button class="btn btn-primary" id="addCategoryBtn" onclick="openAddModal()">
                <i class="fas fa-plus"></i> Ajouter une Catégorie
            </button>
            <div class="search-box">
                <input type="text" placeholder="Rechercher une catégorie..." id="searchInput">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon categories">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalCategories">0</h3>
                    <p>Total Catégories</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 id="activeCategories">0</h3>
                    <p>Catégories Actives</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon warning">
                    <i class="fas fa-pause-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 id="inactiveCategories">0</h3>
                    <p>Catégories Inactives</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon services">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalServices">0</h3>
                    <p>Services Associés</p>
                </div>
            </div>
        </div>

        <!-- Categories Table -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>Liste des Catégories</h3>
                <div class="table-actions">
                    <select id="statusFilter" class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="categories-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Icône</th>
                            <th>Couleur</th>
                            <th>Services</th>
                            <th>Statut</th>
                            <th>Date création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody">
                        <!-- Les catégories seront chargées ici dynamiquement -->
                        <tr>
                            <td colspan="10" class="text-center" id="loadingRow">
                                <div class="loading-spinner">
                                    <i class="fas fa-spinner fa-spin"></i> Chargement des catégories...
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="table-footer">
                <div class="table-info" id="tableInfo">
                    Affichage de 0 à 0 sur 0 catégories
                </div>
                <div class="pagination" id="pagination">
                    <!-- La pagination sera générée ici -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour Ajouter/Modifier une Catégorie -->
    <div class="modal-overlay" id="categoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Ajouter une Nouvelle Catégorie</h3>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            
            <form id="categoryForm">
                @csrf
                <input type="hidden" id="categoryId" name="id">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom de la Catégorie *</label>
                        <input type="text" id="name" name="name" required 
                               placeholder="Ex: Design Graphique">
                        <small class="form-hint">Ce nom sera affiché aux utilisateurs</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" 
                               placeholder="design-graphique">
                        <small class="form-hint">URL-friendly version du nom (auto-généré)</small>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3"
                              placeholder="Décrivez cette catégorie..."></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="icon">Icône</label>
                        <div class="icon-selector">
                            <input type="text" id="icon" name="icon" 
                                   placeholder="fas fa-paint-brush">
                            <div class="icon-preview" id="iconPreview">
                                <i class="fas fa-palette"></i>
                            </div>
                        </div>
                        <small class="form-hint">Utilisez les classes FontAwesome (ex: fas fa-paint-brush)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="color">Couleur</label>
                        <div class="color-picker">
                            <input type="color" id="color" name="color" value="#4361ee">
                            <span id="colorValue">#4361ee</span>
                        </div>
                        <small class="form-hint">Couleur d'affichage de la catégorie</small>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="meta_title">Titre SEO (Optionnel)</label>
                    <input type="text" id="meta_title" name="meta_title" 
                           placeholder="Titre pour les moteurs de recherche">
                </div>
                
                <div class="form-group">
                    <label for="meta_description">Description SEO (Optionnel)</label>
                    <textarea id="meta_description" name="meta_description" rows="2"
                              placeholder="Description pour les moteurs de recherche"></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="order">Ordre d'affichage</label>
                        <input type="number" id="order" name="order" value="0" min="0">
                        <small class="form-hint">Définit l'ordre d'affichage (plus petit = premier)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select id="status" name="status">
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
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
                <p id="deleteMessage">Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
                <p class="text-muted" id="deleteWarning" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i> Cette catégorie contient des services. 
                    Les services seront déplacés vers "Non catégorisé".
                </p>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </div>
        </div>
    </div>

    <!-- Modal des Icônes FontAwesome -->
    <div class="modal-overlay" id="iconsModal">
        <div class="modal-content icons-modal">
            <div class="modal-header">
                <h3>Sélectionner une Icône</h3>
                <button class="close-modal" id="closeIconsModal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="icons-search">
                    <input type="text" placeholder="Rechercher une icône..." id="iconSearch">
                    <i class="fas fa-search"></i>
                </div>
                <div class="icons-grid" id="iconsGrid">
                    <!-- Les icônes seront chargées ici -->
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Variables CSS manquantes */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a56d4;
            --dark-color: #212529;
            --border-radius: 8px;
            --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles de base */
        .main-content {
            padding: 20px;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .toggle-sidebar {
            background: none;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #6c757d;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

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
            font-size: 14px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
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
            transition: border-color 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.categories {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .stat-icon.success {
            background: rgba(6, 214, 160, 0.1);
            color: #06d6a0;
        }

        .stat-icon.warning {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .stat-icon.services {
            background: rgba(239, 71, 111, 0.1);
            color: #ef476f;
        }

        .stat-info h3 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .stat-info p {
            margin: 5px 0 0;
            color: #6c757d;
            font-size: 14px;
        }

        /* Table Styles */
        .dashboard-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .card-header h3 {
            margin: 0;
            color: var(--dark-color);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .categories-table {
            width: 100%;
            border-collapse: collapse;
        }

        .categories-table th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
            white-space: nowrap;
        }

        .categories-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .categories-table tr:hover {
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
            padding: 20px;
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
            border-radius: 4px;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 14px;
            min-width: 36px;
            text-align: center;
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

        .services-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 600;
        }

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

        .color-display {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .color-square {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .icon-display {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            font-size: 18px;
        }

        /* Modal Styles */
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
            z-index: 1000;
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
        }

        .delete-modal {
            max-width: 500px;
        }

        .icons-modal {
            max-width: 800px;
            max-height: 80vh;
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
        }

        .modal-header h3 {
            margin: 0;
            color: var(--dark-color);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6c757d;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-modal:hover {
            color: var(--dark-color);
            background: #f8f9fa;
            border-radius: 50%;
        }

        .modal-body {
            padding: 20px;
        }

        .warning-icon {
            font-size: 48px;
            color: #ffc107;
            display: block;
            margin: 0 auto 15px;
            text-align: center;
        }

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
        input[type="color"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
            box-sizing: border-box;
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
            min-height: 80px;
        }

        .form-hint {
            display: block;
            margin-top: 5px;
            color: #6c757d;
            font-size: 12px;
        }

        .icon-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icon-selector input {
            flex: 1;
        }

        .icon-preview {
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s;
        }

        .icon-preview:hover {
            background: #e9ecef;
            border-color: var(--primary-color);
        }

        .color-picker {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .color-picker input[type="color"] {
            width: 40px;
            height: 40px;
            padding: 0;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        #colorValue {
            font-family: monospace;
            font-size: 14px;
            color: #6c757d;
        }

        .icons-search {
            position: relative;
            margin-bottom: 20px;
        }

        .icons-search input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .icons-search i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .icons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
            max-height: 50vh;
            overflow-y: auto;
            padding: 10px 0;
        }

        .icon-item {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .icon-item:hover {
            background: #f8f9fa;
            border-color: var(--primary-color);
        }

        .icon-item.selected {
            background: rgba(67, 97, 238, 0.1);
            border-color: var(--primary-color);
        }

        .icon-item i {
            font-size: 24px;
            margin-bottom: 8px;
            color: var(--primary-color);
        }

        .icon-name {
            font-size: 10px;
            text-align: center;
            color: #6c757d;
            word-break: break-all;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .loading-spinner {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px;
            color: #6c757d;
            font-size: 14px;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6c757d !important;
        }

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
            
            .categories-table th,
            .categories-table td {
                padding: 10px 5px;
                font-size: 13px;
            }
            
            .action-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .icons-grid {
                grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
        // Déclarer les variables globales
        let currentCategoryId = null;
        let currentPage = 1;
        let categories = [];
        let totalCategories = 0;
        let icons = [];
        
        // Initialiser l'application
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM chargé - initialisation en cours...');
            
            // Vérifier les éléments importants
            const elementsToCheck = ['addCategoryBtn', 'categoryModal', 'searchInput'];
            elementsToCheck.forEach(id => {
                const element = document.getElementById(id);
                console.log(`${id}:`, element ? 'TROUVÉ ✓' : 'NON TROUVÉ ✗');
            });
            
            // Initialiser
            loadIcons();
            setupEventListeners();
            loadCategories();
        });

        // Fonctions globales accessibles
        window.openAddModal = function() {
            console.log('openAddModal appelée');
            document.getElementById('modalTitle').textContent = 'Ajouter une Nouvelle Catégorie';
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('color').value = '#4361ee';
            document.getElementById('colorValue').textContent = '#4361ee';
            document.getElementById('icon').value = 'fas fa-tag';
            document.getElementById('iconPreview').innerHTML = '<i class="fas fa-tag"></i>';
            document.getElementById('order').value = 0;
            document.getElementById('status').value = 'active';
            
            document.getElementById('categoryModal').classList.add('show');
            console.log('Modal ouverte!');
        };

        window.editCategory = async function(id) {
            console.log('Édition catégorie ID:', id);
            try {
                const response = await fetch(`/administrateurs/categories/${id}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    openEditModal(data.data);
                } else {
                    showNotification('Erreur lors du chargement de la catégorie', 'error');
                }
                
            } catch (error) {
                console.error('Erreur lors du chargement de la catégorie:', error);
                showNotification('Erreur lors du chargement de la catégorie', 'error');
            }
        };

        window.confirmDelete = function(id) {
            console.log('Confirmation suppression catégorie ID:', id);
            currentCategoryId = id;
            const category = categories.find(c => c.id == id);
            if (category) {
                const serviceCount = category.service_count || 0;
                const categoryName = category.name;
                
                document.getElementById('deleteMessage').textContent = 
                    `Êtes-vous sûr de vouloir supprimer la catégorie "${categoryName}" ?`;
                
                if (serviceCount > 0) {
                    document.getElementById('deleteWarning').style.display = 'block';
                    document.getElementById('deleteWarning').innerHTML = `
                        <i class="fas fa-exclamation-circle"></i> 
                        Cette catégorie contient ${serviceCount} service(s). 
                        ${serviceCount > 1 ? 'Les services seront déplacés vers "Non catégorisé".' : 'Le service sera déplacé vers "Non catégorisé".'}
                    `;
                } else {
                    document.getElementById('deleteWarning').style.display = 'none';
                }
                
                document.getElementById('deleteModal').classList.add('show');
            }
        };

        window.toggleStatus = async function(id) {
            console.log('Changement statut catégorie ID:', id);
            try {
                const response = await fetch(`/administrateurs/categories/toggle-status/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ _method: 'PATCH' })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    await loadCategories();
                } else {
                    showNotification(data.message || 'Erreur lors du changement de statut', 'error');
                }
                
            } catch (error) {
                console.error('Erreur lors du changement de statut:', error);
                showNotification('Erreur lors du changement de statut', 'error');
            }
        };

        window.changePage = function(page) {
            currentPage = page;
            loadCategories();
        };

        // Charger les catégories
        async function loadCategories() {
            try {
                showLoading(true);
                
                const search = document.getElementById('searchInput').value;
                const status = document.getElementById('statusFilter').value;
                
                let url = `/administrateurs/categories?page=${currentPage}&per_page=10&ajax=1`;
                
                if (search) {
                    url += `&search=${encodeURIComponent(search)}`;
                }
                
                if (status) {
                    url += `&status=${encodeURIComponent(status)}`;
                }
                
                console.log('Chargement catégories depuis:', url);
                
                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.success) {
                    categories = data.data || [];
                    totalCategories = data.meta?.total || 0;
                    renderCategoriesTable();
                    updateStats(data.stats || {});
                    updateTableInfo(data.meta || {});
                    updatePagination(data.meta || {});
                } else {
                    throw new Error(data.message || 'Erreur inconnue');
                }
                
            } catch (error) {
                console.error('Erreur lors du chargement des catégories:', error);
                showNotification('Erreur lors du chargement des catégories', 'error');
                renderEmptyTable();
            } finally {
                showLoading(false);
            }
        }

        // Afficher les catégories dans le tableau
        function renderCategoriesTable() {
            const tbody = document.getElementById('categoriesTableBody');
            
            if (!categories || categories.length === 0) {
                renderEmptyTable();
                return;
            }

            tbody.innerHTML = categories.map(category => `
                <tr data-id="${category.id}">
                    <td>${category.id}</td>
                    <td>
                        <strong>${category.name}</strong>
                        ${category.description ? `<div class="text-muted" style="font-size: 12px; margin-top: 5px;">${category.description}</div>` : ''}
                    </td>
                    <td>
                        <code style="background: #f8f9fa; padding: 2px 6px; border-radius: 4px; font-size: 12px;">${category.slug}</code>
                    </td>
                    <td style="max-width: 200px;">
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="${category.description || ''}">
                            ${category.description || '—'}
                        </div>
                    </td>
                    <td>
                        <div class="icon-display" style="background: ${category.color || '#4361ee'}20; color: ${category.color || '#4361ee'};">
                            <i class="${category.icon || 'fas fa-tag'}"></i>
                        </div>
                    </td>
                    <td>
                        <div class="color-display">
                            <div class="color-square" style="background-color: ${category.color || '#4361ee'};"></div>
                            <span style="font-size: 12px;">${category.color || '#4361ee'}</span>
                        </div>
                    </td>
                    <td>
                        <span class="services-count">${category.service_count || 0}</span>
                    </td>
                    <td>
                        <span class="status-badge status-${category.status}">
                            <i class="fas fa-circle" style="font-size: 8px;"></i>
                            ${category.status === 'active' ? 'Actif' : 'Inactif'}
                        </span>
                    </td>
                    <td>${formatDate(category.created_at)}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn edit-btn" onclick="editCategory(${category.id})" 
                                    title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn delete-btn" onclick="confirmDelete(${category.id})" 
                                    title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="action-btn toggle-btn" onclick="toggleStatus(${category.id})" 
                                    title="${category.status === 'active' ? 'Désactiver' : 'Activer'}">
                                <i class="fas fa-power-off"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Afficher un tableau vide
        function renderEmptyTable() {
            const tbody = document.getElementById('categoriesTableBody');
            tbody.innerHTML = `
                <tr>
                    <td colspan="10" class="text-center">
                        <div style="padding: 40px; color: #6c757d;">
                            <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p>Aucune catégorie trouvée</p>
                            ${document.getElementById('searchInput').value || document.getElementById('statusFilter').value ? 
                                '<small>Essayez de modifier vos filtres de recherche</small>' : ''}
                        </div>
                    </td>
                </tr>
            `;
        }

        // Ouvrir la modal d'édition
        function openEditModal(category) {
            document.getElementById('modalTitle').textContent = 'Modifier la Catégorie';
            document.getElementById('categoryId').value = category.id;
            document.getElementById('name').value = category.name;
            document.getElementById('slug').value = category.slug;
            document.getElementById('description').value = category.description || '';
            document.getElementById('icon').value = category.icon;
            document.getElementById('iconPreview').innerHTML = `<i class="${category.icon}"></i>`;
            document.getElementById('color').value = category.color;
            document.getElementById('colorValue').textContent = category.color;
            document.getElementById('meta_title').value = category.meta_title || '';
            document.getElementById('meta_description').value = category.meta_description || '';
            document.getElementById('order').value = category.order || 0;
            document.getElementById('status').value = category.status;
            
            document.getElementById('categoryModal').classList.add('show');
        }

        // Configurer les écouteurs d'événements
        function setupEventListeners() {
            console.log('Configuration des écouteurs d\'événements...');
            
            // Bouton d'ajout (déjà géré par onclick inline)
            const addBtn = document.getElementById('addCategoryBtn');
            addBtn.addEventListener('click', function(e) {
                console.log('Bouton cliqué via addEventListener');
                openAddModal();
            });
            
            // Fermer les modals
            document.getElementById('closeModal').addEventListener('click', closeModal);
            document.getElementById('closeDeleteModal').addEventListener('click', closeDeleteModal);
            document.getElementById('closeIconsModal').addEventListener('click', closeIconsModal);
            document.getElementById('cancelBtn').addEventListener('click', closeModal);
            document.getElementById('cancelDeleteBtn').addEventListener('click', closeDeleteModal);
            
            // Confirmer la suppression
            document.getElementById('confirmDeleteBtn').addEventListener('click', deleteCategory);
            
            // Générateur de slug
            document.getElementById('name').addEventListener('input', generateSlug);
            
            // Sélecteur de couleur
            document.getElementById('color').addEventListener('input', updateColorValue);
            
            // Sélecteur d'icônes
            document.getElementById('iconPreview').addEventListener('click', openIconsModal);
            const iconSearch = document.getElementById('iconSearch');
            if (iconSearch) {
                iconSearch.addEventListener('input', filterIcons);
            }
            
            // Recherche
            document.getElementById('searchInput').addEventListener('input', debounce(filterCategories, 300));
            
            // Filtres
            document.getElementById('statusFilter').addEventListener('change', filterCategories);
            
            // Soumission du formulaire
            document.getElementById('categoryForm').addEventListener('submit', saveCategory);
            
            // Fermer les modals en cliquant à l'extérieur
            document.addEventListener('click', (e) => {
                const modal = document.getElementById('categoryModal');
                const deleteModal = document.getElementById('deleteModal');
                const iconsModal = document.getElementById('iconsModal');
                
                if (e.target === modal) closeModal();
                if (e.target === deleteModal) closeDeleteModal();
                if (e.target === iconsModal) closeIconsModal();
            });
            
            // Fermer les modals avec ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                    closeDeleteModal();
                    closeIconsModal();
                }
            });
            
            console.log('Écouteurs d\'événements configurés ✓');
        }

        // Fermer les modals
        function closeModal() {
            document.getElementById('categoryModal').classList.remove('show');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
            currentCategoryId = null;
        }

        function closeIconsModal() {
            document.getElementById('iconsModal').classList.remove('show');
        }

        function openIconsModal() {
            document.getElementById('iconsModal').classList.add('show');
        }

        // Générateur de slug
        function generateSlug() {
            const name = document.getElementById('name').value;
            const slugInput = document.getElementById('slug');
            
            if (name && (!slugInput.value || slugInput.dataset.autoGenerated === 'true')) {
                const slug = name
                    .toLowerCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Enlever les accents
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim();
                slugInput.value = slug;
                slugInput.dataset.autoGenerated = 'true';
            }
        }

        // Mettre à jour la valeur de couleur
        function updateColorValue() {
            const color = document.getElementById('color').value;
            document.getElementById('colorValue').textContent = color;
        }

        // Charger les icônes
        function loadIcons() {
            icons = [
                'fas fa-paint-brush', 'fas fa-laptop-code', 'fas fa-bullhorn',
                'fas fa-chart-line', 'fas fa-mobile-alt', 'fas fa-camera',
                'fas fa-palette', 'fas fa-code', 'fas fa-search',
                'fas fa-shopping-cart', 'fas fa-users', 'fas fa-envelope',
                'fas fa-phone', 'fas fa-map-marker-alt', 'fas fa-calendar',
                'fas fa-clock', 'fas fa-star', 'fas fa-heart',
                'fas fa-image', 'fas fa-video', 'fas fa-music',
                'fas fa-book', 'fas fa-graduation-cap', 'fas fa-briefcase',
                'fas fa-home', 'fas fa-building', 'fas fa-store',
                'fas fa-utensils', 'fas fa-car', 'fas fa-plane',
                'fas fa-ship', 'fas fa-train', 'fas fa-bicycle',
                'fas fa-walking', 'fas fa-running', 'fas fa-dumbbell',
                'fas fa-football-ball', 'fas fa-basketball-ball', 'fas fa-baseball-ball',
                'fas fa-gamepad', 'fas fa-tv', 'fas fa-headphones',
                'fas fa-microphone', 'fas fa-film', 'fas fa-camera-retro',
                'fas fa-pencil-alt', 'fas fa-edit', 'fas fa-trash',
                'fas fa-save', 'fas fa-download', 'fas fa-upload',
                'fas fa-share', 'fas fa-copy', 'fas fa-cut',
                'fas fa-paste', 'fas fa-print', 'fas fa-key',
                'fas fa-lock', 'fas fa-unlock', 'fas fa-shield-alt',
                'fas fa-wifi', 'fas fa-bluetooth', 'fas fa-usb',
                'fas fa-hdd', 'fas fa-memory', 'fas fa-microchip',
                'fas fa-server', 'fas fa-database', 'fas fa-cloud',
                'fas fa-cloud-upload-alt', 'fas fa-cloud-download-alt', 'fas fa-network-wired',
                'fas fa-globe', 'fas fa-language', 'fas fa-flag',
                'fas fa-map', 'fas fa-compass', 'fas fa-mountain',
                'fas fa-tree', 'fas fa-leaf', 'fas fa-seedling',
                'fas fa-tint', 'fas fa-fire', 'fas fa-snowflake',
                'fas fa-sun', 'fas fa-moon', 'fas fa-cloud-sun',
                'fas fa-cloud-moon', 'fas fa-umbrella', 'fas fa-wind',
                'fas fa-tag', 'fas fa-tags', 'fas fa-folder',
                'fas fa-folder-open', 'fas fa-archive', 'fas fa-box'
            ];

            renderIconsGrid();
        }

        // Afficher la grille d'icônes
        function renderIconsGrid(filteredIcons = icons) {
            const iconsGrid = document.getElementById('iconsGrid');
            if (!iconsGrid) return;
            
            iconsGrid.innerHTML = filteredIcons.map(icon => `
                <div class="icon-item" data-icon="${icon}">
                    <i class="${icon}"></i>
                    <span class="icon-name">${icon.replace('fas fa-', '')}</span>
                </div>
            `).join('');

            // Ajouter les écouteurs d'événements
            document.querySelectorAll('.icon-item').forEach(item => {
                item.addEventListener('click', function() {
                    const icon = this.getAttribute('data-icon');
                    document.getElementById('icon').value = icon;
                    document.getElementById('iconPreview').innerHTML = `<i class="${icon}"></i>`;
                    closeIconsModal();
                });
            });
        }

        // Filtrer les icônes
        function filterIcons() {
            const searchTerm = document.getElementById('iconSearch').value.toLowerCase();
            const filteredIcons = icons.filter(icon => 
                icon.toLowerCase().includes(searchTerm)
            );
            renderIconsGrid(filteredIcons);
        }

// Sauvegarder la catégorie - VERSION CORRIGÉE POUR VOS ROUTES
async function saveCategory(e) {
    e.preventDefault();
    
    if (!validateForm()) {
        return;
    }
    
    const categoryId = document.getElementById('categoryId').value;
    const isEdit = !!categoryId;
    
    // CORRECTION : Utiliser les bonnes URLs selon vos routes
    const url = isEdit 
        ? `/administrateurs/categories/${categoryId}` 
        : '/administrateurs/categories';
    
    try {
        const saveBtn = document.getElementById('saveBtn');
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
        saveBtn.disabled = true;
        
        // Créer un objet FormData
        const formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('slug', document.getElementById('slug').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('icon', document.getElementById('icon').value);
        formData.append('color', document.getElementById('color').value);
        formData.append('meta_title', document.getElementById('meta_title').value);
        formData.append('meta_description', document.getElementById('meta_description').value);
        formData.append('order', parseInt(document.getElementById('order').value) || 0);
        formData.append('status', document.getElementById('status').value);
        
        // Pour les requêtes Laravel, on utilise _method pour PUT
        if (isEdit) {
            formData.append('_method', 'PUT');
        } 
        
        // Récupérer le token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        console.log('Envoi des données à:', url);
        console.log('Méthode:', isEdit ? 'PUT (via POST avec _method)' : 'POST');
        console.log('Données:', Object.fromEntries(formData));
        
        const response = await fetch(url, {
            method: 'POST', // Laravel attend POST même pour les updates avec _method
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                // Ne pas mettre 'Content-Type' quand on utilise FormData
            },
            body: formData
        });
        
        console.log('Réponse HTTP:', response.status, response.statusText);
        
        // Essayer de lire la réponse même en cas d'erreur
        let data;
        try {
            data = await response.json();
            console.log('Données JSON reçues:', data);
        } catch (jsonError) {
            console.error('Erreur de parsing JSON:', jsonError);
            const text = await response.text();
            console.error('Réponse texte:', text);
            throw new Error('Réponse non-JSON du serveur: ' + text.substring(0, 100));
        }
        
        if (data.success) {
            showNotification(data.message, 'success');
            closeModal();
            await loadCategories();
        } else {
            // Afficher les erreurs de validation
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
        console.error('Erreur complète lors de la sauvegarde:', error);
        showNotification('Erreur: ' + error.message, 'error');
    } finally {
        const saveBtn = document.getElementById('saveBtn');
        saveBtn.innerHTML = '<i class="fas fa-save"></i> Enregistrer';
        saveBtn.disabled = false;
    }
}

        // Valider le formulaire
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            
            if (!name) {
                showNotification('Le nom de la catégorie est requis', 'error');
                document.getElementById('name').focus();
                return false;
            }
            
            return true;
        }

        // Supprimer une catégorie
        async function deleteCategory() {
            if (!currentCategoryId) return;
            
            try {
                const response = await fetch(`/administrateurs/categories/${currentCategoryId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    closeDeleteModal();
                    await loadCategories();
                    currentCategoryId = null;
                } else {
                    showNotification(data.message || 'Erreur lors de la suppression', 'error');
                }
                
            } catch (error) {
                console.error('Erreur lors de la suppression:', error);
                showNotification('Erreur lors de la suppression de la catégorie', 'error');
            }
        }

        // Filtrer les catégories
        function filterCategories() {
            currentPage = 1;
            loadCategories();
        }

        // Fonction debounce pour la recherche
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

        // Mettre à jour les statistiques
        function updateStats(stats) {
            document.getElementById('totalCategories').textContent = stats.total || 0;
            document.getElementById('activeCategories').textContent = stats.active || 0;
            document.getElementById('inactiveCategories').textContent = stats.inactive || 0;
            document.getElementById('totalServices').textContent = stats.total_services || 0;
        }

        // Mettre à jour les informations du tableau
        function updateTableInfo(meta) {
            const startIndex = meta.from || 0;
            const endIndex = meta.to || 0;
            const total = meta.total || 0;
            document.getElementById('tableInfo').textContent = 
                `Affichage de ${startIndex} à ${endIndex} sur ${total} catégories`;
        }

        // Mettre à jour la pagination
        function updatePagination(meta) {
            const totalPages = meta.last_page || 1;
            const current = meta.current_page || 1;
            const pagination = document.getElementById('pagination');
            
            if (totalPages <= 1) {
                pagination.innerHTML = '';
                return;
            }

            let html = '';
            
            // Bouton précédent
            html += `<button class="page-link ${current === 1 ? 'disabled' : ''}" 
                      onclick="changePage(${current - 1})" ${current === 1 ? 'disabled' : ''}>&laquo;</button>`;
            
            // Pages
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= current - 2 && i <= current + 2)) {
                    html += `<button class="page-link ${i === current ? 'active' : ''}" 
                              onclick="changePage(${i})">${i}</button>`;
                } else if (i === current - 3 || i === current + 3) {
                    html += '<span class="page-link disabled">...</span>';
                }
            }
            
            // Bouton suivant
            html += `<button class="page-link ${current === totalPages ? 'disabled' : ''}" 
                      onclick="changePage(${current + 1})" ${current === totalPages ? 'disabled' : ''}>&raquo;</button>`;
            
            pagination.innerHTML = html;
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
            
            // Animation d'entrée
            setTimeout(() => notification.classList.add('show'), 10);
            
            // Supprimer automatiquement après 5 secondes
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        if (notification.parentNode) notification.remove();
                    }, 300);
                }
            }, 5000);
        }
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
            }
        }
    </style>
@endsection