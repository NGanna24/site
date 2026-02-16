<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta Title -->
    <meta charset="utf-8"/>
    <title>NDOUBLE - Digital Solutions & Formation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="NDOUBLE - Agence digitale spécialisée en développement web, mobile, logiciels, communication, impression et formation" name="description">
    <meta content="NDOUBLE" name="author"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    
    <!-- App favicon --> 
    <link href="{{asset("admin/assets/images/ndouble-favicon.png")}}" rel="shortcut icon"/>
    
    <!-- Vendor css -->
    <link href="{{asset("admin/assets/css/vendor.min.css")}}" rel="stylesheet" type="text/css">
    <!-- Icons css -->
    <link href="{{asset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App css -->
    <link href="{{asset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Theme Config js -->
    <script src="{{asset("admin/assets/js/config.js")}}"></script>
</head>
<body>
    <!-- START Wrapper -->
    <div class="wrapper">
        <!-- ========== Topbar Start ========== -->
        <header class="topbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <button class="button-toggle-menu me-2" type="button">
                                <iconify-icon class="fs-24 align-middle" icon="solar:hamburger-menu-broken"></iconify-icon>
                            </button>
                        </div>
                        <!-- Welcome Message -->
                        <div class="topbar-item">
                            <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">
                                <span class="text-primary">NDOUBLE</span> - Innovation Digitale
                            </h4>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-1">
                        <!-- Theme Color -->
                        <div class="topbar-item">
                            <button class="topbar-button" id="light-dark-mode" type="button">
                                <iconify-icon class="fs-24 align-middle" icon="solar:moon-bold-duotone"></iconify-icon>
                            </button>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="dropdown topbar-item">
                            <button aria-expanded="false" aria-haspopup="true" class="topbar-button position-relative" data-bs-toggle="dropdown" type="button">
                                <iconify-icon class="fs-24 align-middle" icon="solar:bell-bing-bold-duotone"></iconify-icon>
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">5<span class="visually-hidden">notifications</span></span>
                            </button>
                            <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end">
                                <div class="p-3 border-0 border-bottom border-dashed">
                                    <h6 class="m-0 fs-16 fw-semibold">Notifications</h6>
                                </div>
                                <div data-simplebar style="max-height: 280px;">
                                    <a class="dropdown-item py-3 border-bottom" href="javascript:void(0);">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <span class="avatar-sm bg-soft-primary rounded-circle d-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="solar:code-bold" class="fs-20 text-primary"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0"><span class="fw-medium">Nouveau projet web</span> - Application e-commerce</p>
                                                <small class="text-muted">Il y a 10 min</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-3 border-bottom" href="javascript:void(0);">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <span class="avatar-sm bg-soft-success rounded-circle d-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="solar:printer-bold" class="fs-20 text-success"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0"><span class="fw-medium">Commande d'impression</span> - 500 flyers</p>
                                                <small class="text-muted">Il y a 25 min</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-3 border-bottom" href="javascript:void(0);">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <span class="avatar-sm bg-soft-warning rounded-circle d-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="solar:book-bold" class="fs-20 text-warning"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0"><span class="fw-medium">Nouvelle inscription</span> - Formation Laravel</p>
                                                <small class="text-muted">Il y a 1 heure</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center py-3">
                                    <a class="btn btn-primary btn-sm" href="#">Voir toutes les notifications</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Settings -->
                        <div class="topbar-item d-none d-md-flex">
                            <button class="topbar-button" data-bs-target="#theme-settings-offcanvas" data-bs-toggle="offcanvas" type="button">
                                <iconify-icon class="fs-24 align-middle" icon="solar:settings-bold-duotone"></iconify-icon>
                            </button>
                        </div>
                        
                        <!-- User Menu -->
                        <div class="dropdown topbar-item">
                            <a class="topbar-button" data-bs-toggle="dropdown" href="#" role="button">
                                <span class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="fw-semibold me-2 d-none d-sm-block">NDOUBLE</span>
                                        <span class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold">
                                            ND
                                        </span>
                                    </div>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Bienvenue chez NDOUBLE!</h6>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user-circle fs-18 align-middle me-1"></i>Mon Profil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-building fs-18 align-middle me-1"></i>Entreprise
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="bx bx-log-out fs-18 align-middle me-1"></i>Déconnexion
                                </a>
                            </div>
                        </div>
                        
                        <!-- Search -->
                        <form class="app-search d-none d-lg-block ms-2">
                            <div class="position-relative">
                                <input type="search" class="form-control" placeholder="Rechercher... (projets, clients, formations)">
                                <iconify-icon class="search-widget-icon" icon="solar:magnifer-linear"></iconify-icon>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Topbar End ========== -->

        <!-- ========== App Menu Start ========== -->
        <div class="main-nav">
            <!-- Sidebar Logo -->
            <div class="logo-box">
                <a href="{{ route('dashboard') }}">
                    <div class="d-flex align-items-center">
                        <img alt="NDOUBLE Logo" class="logo-sm" src="{{asset("admin/assets/images/ndouble-logo-sm.png")}}"/>
                        <span class="logo-lg fw-bold fs-4 ms-2 text-primary">NDOUBLE</span>
                    </div>
                </a>
            </div>
            
            <!-- Menu Toggle Button -->
            <button class="button-sm-hover" type="button">
                <iconify-icon class="button-sm-hover-icon" icon="solar:double-alt-arrow-right-bold-duotone"></iconify-icon>
            </button>
            
            <div class="scrollbar" data-simplebar>
                <ul class="navbar-nav" id="navbar-nav">
                    <!-- Menu Title: Tableau de bord -->
                    <li class="menu-title">TABLEAU DE BORD</li>
                    
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <!-- Menu Title: SERVICES DIGITAUX -->
                    <li class="menu-title mt-3">SERVICES DIGITAUX</li>
                    
                    <!-- Développement Web & Mobile -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebarDev" role="button" aria-expanded="false" aria-controls="sidebarDev">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:code-square-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Développement</span>
                            <span class="badge bg-info badge-pill ms-auto">Web/Mobile</span>
                        </a>
                        <div class="collapse" id="sidebarDev">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Applications Web</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Applications Mobiles</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Logiciels sur mesure</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Sites E-commerce</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">API & Intégrations</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Communication & Marketing -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebarCom" role="button">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:megaphone-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Communication</span>
                        </a>
                        <div class="collapse" id="sidebarCom">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Stratégie digitale</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Community Management</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Campagnes publicitaires</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">SEO/SEA</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Emailing</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Impression & Visuels -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebarPrint" role="button">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:printer-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Impression & Visuels</span>
                        </a>
                        <div class="collapse" id="sidebarPrint">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Flyers & Brochures</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Affiches & Bannières</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Cartes de visite</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">PLV & Signalétique</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Identité visuelle</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Formation -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebarFormation" role="button">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:book-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Formation</span>
                        </a>
                        <div class="collapse" id="sidebarFormation">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Développement Web</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Développement Mobile</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Design graphique</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Marketing digital</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Gestion de projet</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Bureautique</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Menu Title: GESTION PROJETS -->
                    <li class="menu-title mt-3">GESTION PROJETS</li>
                    
                    <!-- Projets -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:folder-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Tous les projets</span>
                            <span class="badge bg-success badge-pill ms-auto">12</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:clock-circle-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">En cours</span>
                            <span class="badge bg-warning badge-pill ms-auto">5</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:check-circle-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Terminés</span>
                            <span class="badge bg-primary badge-pill ms-auto">24</span>
                        </a>
                    </li>

                    <!-- Menu Title: CLIENTS -->
                    <li class="menu-title mt-3">CLIENTS</li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Liste des clients</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:hand-money-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Devis & Factures</span>
                        </a>
                    </li>

                    <!-- Menu Title: RAPPORTS -->
                    <li class="menu-title mt-3">RAPPORTS</li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:chart-2-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Analyses & Statistiques</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:wallet-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Finances</span>
                        </a>
                    </li>

                    <!-- Menu Title: ADMINISTRATION -->
                    <li class="menu-title mt-3">ADMINISTRATION</li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebarSettings" role="button">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                            </span>
                            <span class="nav-text">Paramètres</span>
                        </a>
                        <div class="collapse" id="sidebarSettings">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Utilisateurs</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Rôles & Permissions</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Services</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="#">Tarifs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
                <!-- Footer Sidebar -->
                <div class="sidebar-footer border-top mt-3 pt-3 px-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <small class="text-muted">NDOUBLE © 2026</small>
                            <div><small class="text-muted">Version 2.0.0</small></div>
                        </div>
                        <div>
                            <span class="badge bg-primary">v2.0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== App Menu End ========== -->

        <!-- ========== Content Start ========== -->
        @yield('content')
        <!-- ========== Content End ========== -->
    </div>
    <!-- END Wrapper -->

    <!-- Settings Offcanvas -->
    <div class="offcanvas offcanvas-end border-0" id="theme-settings-offcanvas" tabindex="-1">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Paramètres NDOUBLE</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="h-100" data-simplebar>
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-semibold">Préférences d'affichage</h5>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="compactMode">
                        <label class="form-check-label" for="compactMode">Mode compact</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="notificationsEnabled" checked>
                        <label class="form-check-label" for="notificationsEnabled">Notifications</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Javascript -->
    <script src="{{asset("admin/assets/js/vendor.js")}}"></script>
    <!-- App Javascript -->
    <script src="{{asset("admin/assets/js/app.js")}}"></script>
    
    @stack('scripts')
</body>
</html>