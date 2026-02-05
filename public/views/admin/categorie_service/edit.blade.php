@extends('admin.layouts')
@section('content')
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

@endsection