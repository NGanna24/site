<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Print & Tech Pro - Tableau de Bord</title>
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
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
                        <li>
                            <a href="{{ route('categorie_service.create') }}"><i data-feather="settings"></i> <span>Catégories</span></a>
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

        @yield('content')


    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>

</html>