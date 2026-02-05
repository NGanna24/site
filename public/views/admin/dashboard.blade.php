@extends('admin.layouts')
@section('content')

    <div class="main-wrapper">
        <!-- HEADER MODIFIÉ -->
        <div class="header header-one">
            <div class="header-left header-left-one">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo-print-tech.png" alt="Print & Tech Pro">
                </a>
                <a href="index.html" class="white-logo">
                    <img src="assets/img/logo-white.png" alt="Print & Tech Pro">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Rechercher...">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <ul class="nav nav-tabs user-menu">
                <!-- Supprimé le sélecteur de langue -->
                
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i data-feather="bell"></i> <span class="badge rounded-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Tout effacer</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">SARL Tech Solutions</span>
                                                    a payé la facture <span class="noti-title">#PT2024001</span></p>
                                                <p class="noti-time"><span class="notification-time">Il y a 4 min</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Restaurant Le Bon Goût</span>
                                                    a accepté votre devis <span class="noti-title">#DEV458789</span></p>
                                                <p class="noti-time"><span class="notification-time">Il y a 6 min</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-primary-light"><i
                                                        class="far fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Nouveau client enregistré</span></p>
                                                <p class="noti-time"><span class="notification-time">Il y a 8 min</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">Voir toutes les notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="assets/img/profiles/avatar-01.jpg" alt="">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i>
                            Profil</a>
                        <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i>
                            Paramètres</a>
                        <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i>
                            Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- SIDEBAR MODIFIÉ -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title"><span>Principal</span></li>
                        <li class="active">
                            <a href="index.html"><i data-feather="home"></i> <span>Tableau de Bord</span></a>
                        </li>
                        <li>
                            <a href="customers.html"><i data-feather="users"></i> <span>Clients</span></a>
                        </li>
                        <li>
                            <a href="projects.html"><i data-feather="briefcase"></i> <span>Projets</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i data-feather="file-text"></i> <span> Devis</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="estimates.html">Liste des Devis</a></li>
                                <li><a href="add-estimate.html">Nouveau Devis</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i data-feather="clipboard"></i> <span> Factures</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="invoices.html">Liste des Factures</a></li>
                                <li><a href="add-invoice.html">Nouvelle Facture</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="services.html"><i data-feather="codesandbox"></i> <span>Services</span></a>
                        </li>
                        <li>
                            <a href="products.html"><i data-feather="package"></i> <span>Produits</span></a>
                        </li>
                        <li>
                            <a href="payments.html"><i data-feather="credit-card"></i> <span>Paiements</span></a>
                        </li>
                        
                        <li class="submenu">
                            <a href="#"><i data-feather="pie-chart"></i> <span> Rapports</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="sales-report.html">Rapport des Ventes</a></li>
                                <li><a href="projects-report.html">Rapport des Projets</a></li>
                                <li><a href="profit-loss-report.html">Bénéfices & Pertes</a></li>
                            </ul>
                        </li>
                        
                        <li class="submenu">
                            <a href="#"><i data-feather="grid"></i> <span> Portfolio</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="portfolio.html">Tous les Projets</a></li>
                                <li><a href="add-project.html">Ajouter un Projet</a></li>
                                <li><a href="categories.html">Catégories</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="settings.html"><i data-feather="settings"></i> <span>Paramètres</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Pages Publiques</span>
                        </li>
                        <li>
                            <a href="../index.html" target="_blank"><i data-feather="globe"></i> <span>Site Public</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- CONTENU PRINCIPAL MODIFIÉ -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- WIDGETS ADAPTÉS -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Chiffre d'Affaires</div>
                                        <div class="dash-counts">
                                            <p>1,642,000 FCFA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                    class="fas fa-arrow-up me-1"></i>15%</span> ce mois-ci</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Clients Actifs</div>
                                        <div class="dash-counts">
                                            <p>42</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 65%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                    class="fas fa-arrow-up me-1"></i>8%</span> nouveaux clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-briefcase"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Projets en Cours</div>
                                        <div class="dash-counts">
                                            <p>12</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                            class="fas fa-arrow-up me-1"></i>23%</span> charge de travail</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-4">
                                        <i class="fas fa-file-invoice"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Devis En Attente</div>
                                        <div class="dash-counts">
                                            <p>8</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-warning me-1"><i
                                            class="fas fa-clock me-1"></i>À traiter</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-7 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Analytics des Ventes</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Mensuel
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Hebdomadaire</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Mensuel</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Annuel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
                                    <div class="w-md-100 d-flex align-items-center mb-3 flex-wrap flex-md-nowrap">
                                        <div>
                                            <span>Infographie</span>
                                            <p class="h3 text-primary me-5">850,000 FCFA</p>
                                        </div>
                                        <div>
                                            <span>Impression</span>
                                            <p class="h3 text-success me-5">492,000 FCFA</p>
                                        </div>
                                        <div>
                                            <span>Services IT</span>
                                            <p class="h3 text-info me-5">300,000 FCFA</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="sales_chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Statut des Projets</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Ce mois
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Cette semaine</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Ce mois</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">Cette année</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="invoice_chart"></div>
                                <div class="text-center text-muted">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="fas fa-circle text-primary me-1"></i> En cours</p>
                                                <h5>8</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="fas fa-circle text-success me-1"></i> Terminés</p>
                                                <h5>15</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="fas fa-circle text-warning me-1"></i> En attente</p>
                                                <h5>4</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Projets Récents</h5>
                                    </div>
                                    <div class="col-auto">
                                        <a href="projects.html" class="btn-right btn btn-sm btn-outline-primary">
                                            Voir Tout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Client</th>
                                                <th>Type</th>
                                                <th>Échéance</th>
                                                <th>Statut</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img
                                                                class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                src="assets/img/profiles/avatar-04.jpg"
                                                                alt="User Image">Restaurant Le Bon Goût</a>
                                                    </h2>
                                                </td>
                                                <td>Site Web</td>
                                                <td>15 Déc 2024</td>
                                                <td><span class="badge bg-primary-light">En cours</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-project.html"><i
                                                                    class="far fa-edit me-2"></i>Modifier</a>
                                                            <a class="dropdown-item" href="view-project.html"><i
                                                                    class="far fa-eye me-2"></i>Voir</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-trash-alt me-2"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img
                                                                class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                src="assets/img/profiles/avatar-06.jpg"
                                                                alt="User Image">Boutique Mode Elegance</a>
                                                    </h2>
                                                </td>
                                                <td>Flyers</td>
                                                <td>10 Déc 2024</td>
                                                <td><span class="badge bg-warning-light">En attente</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-project.html"><i
                                                                    class="far fa-edit me-2"></i>Modifier</a>
                                                            <a class="dropdown-item" href="view-project.html"><i
                                                                    class="far fa-eye me-2"></i>Voir</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-trash-alt me-2"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img
                                                                class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                src="assets/img/profiles/avatar-08.jpg"
                                                                alt="User Image">SARL Tech Solutions</a>
                                                    </h2>
                                                </td>
                                                <td>Maintenance</td>
                                                <td>05 Déc 2024</td>
                                                <td><span class="badge bg-success-light">Terminé</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-project.html"><i
                                                                    class="far fa-edit me-2"></i>Modifier</a>
                                                            <a class="dropdown-item" href="view-project.html"><i
                                                                    class="far fa-eye me-2"></i>Voir</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-trash-alt me-2"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Devis Récents</h5>
                                    </div>
                                    <div class="col-auto">
                                        <a href="estimates.html" class="btn-right btn btn-sm btn-outline-primary">
                                            Voir Tout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Client</th>
                                                <th>Montant</th>
                                                <th>Date limite</th>
                                                <th>Statut</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img
                                                                class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                src="assets/img/profiles/avatar-05.jpg"
                                                                alt="User Image"> Pharmacie Modern</a>
                                                    </h2>
                                                </td>
                                                <td>175,000 FCFA</td>
                                                <td>15 Déc 2024</td>
                                                <td><span class="badge bg-info-light">Envoyé</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-estimate.html"><i
                                                                    class="far fa-edit me-2"></i>Modifier</a>
                                                            <a class="dropdown-item" href="view-estimate.html"><i
                                                                    class="far fa-eye me-2"></i>Voir</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-file-alt me-2"></i>Convertir en Facture</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img
                                                                class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                src="assets/img/profiles/avatar-07.jpg"
                                                                alt="User Image"> Supermarché City</a>
                                                    </h2>
                                                </td>
                                                <td>89,000 FCFA</td>
                                                <td>12 Déc 2024</td>
                                                <td><span class="badge bg-warning-light">En attente</span></td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-estimate.html"><i
                                                                    class="far fa-edit me-2"></i>Modifier</a>
                                                            <a class="dropdown-item" href="view-estimate.html"><i
                                                                    class="far fa-eye me-2"></i>Voir</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-file-alt me-2"></i>Convertir en Facture</a>
                                                        </div>
                                                    </div>
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
    </div>

@endsection