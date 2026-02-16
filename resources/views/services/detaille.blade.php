@extends('base.layouts')

@section('title', 'Mi-Gban - Application Immobilière en Côte d\'Ivoire | NDOUBLE')

@section('description', 'Mi-Gban révolutionne l\'immobilier en Côte d\'Ivoire. Trouvez, louez ou vendez votre bien facilement. Téléchargez l\'application maintenant !')

{{-- Meta Open Graph pour Mi-Gban --}}
@section('og-site-name', 'Mi-Gban by NDOUBLE')
@section('og-title', 'Mi-Gban - Application Immobilière en Côte d\'Ivoire')
@section('og-description', 'Trouvez, louez ou vendez votre bien en quelques clics. L\'application qui révolutionne l\'immobilier en Côte d\'Ivoire.')
@section('og-image', asset('visiteur/assets/img/logo-migban.png'))

{{-- Favicon Mi-Gban --}}
@section('favicon', asset('visiteur/assets/img/logo-migban.png'))
@section('apple-touch-icon', asset('visiteur/assets/img/logo-migban.png'))

@section('body-class', 'mi-gban-page')

@section('page-styles')
<style>
  /* Styles spécifiques à Mi-Gban */
  .mi-gban-page { 
    --mi-gban-primary: #ec681d;
    --mi-gban-secondary: #d45810;
  }
  
  .section {
    padding: 80px 0;
  }
  
  @media (max-width: 768px) {
    .section {
      padding: 60px 0;
    }
  }
  
  /* Hero section Mi-Gban */
  #hero-migban {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    position: relative;
    overflow: hidden;
  }
  
  #hero-migban::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ec681d' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.3;
  }
  
  .hero-image-wrapper {
    position: relative;
    padding: 20px;
  }
  
  .hero-image-wrapper img {
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    transition: transform 0.5s ease;
  }
  
  .hero-image-wrapper img:hover {
    transform: translateY(-10px) scale(1.02);
  }
  
  /* Cards */
  .benefit-card, .feature-card {
    transition: all 0.3s ease;
    border-left: 4px solid var(--mi-gban-primary) !important;
  }
  
  .benefit-card:hover, .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(236, 104, 29, 0.15) !important;
  }
  
  /* Property types */
  .property-type-card {
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background: white !important;
  }
  
  .property-type-card:hover {
    border-color: var(--mi-gban-primary);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(236, 104, 29, 0.1) !important;
  }
  
  .property-type-card i {
    color: var(--mi-gban-primary);
  }
  
  /* Stats animation */
  @keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .display-4 {
    animation: countUp 1s ease forwards;
  }
  
  /* CTA section */
  #cta-migban {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    position: relative;
    overflow: hidden;
  }
  
  #cta-migban::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
      radial-gradient(circle at 20% 80%, rgba(236, 104, 29, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba(236, 104, 29, 0.05) 0%, transparent 50%);
  }
  
  .cta-content {
    position: relative;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .hero-image-wrapper {
      padding: 15px;
      margin-bottom: 30px;
    }
    
    .hero-image-wrapper img {
      border-radius: 15px;
    }
    
    .display-4 {
      font-size: 2.5rem;
    }
    
    .display-5 {
      font-size: 2rem;
    }
    
    .btn-lg {
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
    }
  }
  
  @media (max-width: 576px) {
    .section-header h2 {
      font-size: 1.8rem;
    }
    
    .icon-wrapper {
      width: 50px !important;
      height: 50px !important;
    }
  }
</style>
@endsection

@section('content')
<main class="main" id="migban-page">

  <!-- Hero Section Mi-Gban -->
  <section id="hero-migban" class="section " >
    <div class="container-fluid px-0 position-relative overflow-hidden mt-5">
      <div class="row g-0 align-items-center min-vh-50">
        <div class="col-lg-6 order-lg-1 order-2 py-lg-0 py-5">
          <div class="px-4 px-lg-5 text-center text-lg-start">
            <h1 class="display-4 fw-bold text-white mb-3">
              Mi-Gban
            </h1>
            <p class="lead text-light mb-4 opacity-90">
              L'application qui révolutionne l'immobilier en Côte d'Ivoire. 
              Trouvez, louez ou vendez votre bien en quelques clics.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
              @if($apkExists)
              <a href="{{ $apkUrl }}" 
               
              style="background-color: var(--mi-gban-primary); border-color: var(--mi-gban-primary);"
                 class="btn btn-primary btn-lg px-4 py-3 shadow"
                 download="MIGBAN.apk">
                <i class="fas fa-download me-2"></i>Télécharger l'application
              </a>
              @endif
              <a href="#features" class="btn btn-outline-light btn-lg px-4 py-3">
                <i class="fas fa-play-circle me-2"></i>Découvrir les fonctionnalités
              </a>
            </div>
            
            <div class="mt-4 text-light">
              <small><i class="fas fa-star text-warning me-1"></i> {{ $nombreDeTelechargement }}+ téléchargements • Gratuit</small>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 order-lg-2 order-1">
          <div class="hero-image-wrapper">
            <img src="{{ asset('visiteur/assets/img/migban/bannier-mi-gban.png') }}" 
                 alt="Mi-Gban Application Interface"
                 class="img-fluid w-100">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Téléchargement -->
  <section id="download" class="section py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card border-0 shadow-lg overflow-hidden">
            <div class="row g-0">
              <div class="col-md-6  p-4 p-lg-5 d-flex align-items-center">
                <div class="text-center text-white w-100">
                  <img src="{{ asset('visiteur/assets/img/migban/mi-gban-logo.png') }}" 
                       alt="Logo Mi-Gban" 
                       class="img-fluid mb-4"
                       style="max-height: 80px;">
                  <h3 class="h2 mb-3 text-secondary" >Téléchargez maintenant</h3>
                  <p class="mb-4 opacity-90">Disponible gratuitement sur Android</p>
                  
                  @if($apkExists)
                  <div class="d-grid">
                    <a href="{{ $apkUrl }}" 
                       class="btn btn-light btn-lg fw-bold py-3 shadow-sm"
                       download="MIGBAN.apk">
                      <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-download fa-2x me-3"></i>
                        <div class="text-start">
                          <div>MI-GBAN APP</div>
                          <small class="text-muted">{{ $apkSize }} MB • Android 5.0+</small>
                        </div>
                      </div>
                    </a>
                  </div>
                  @else
                  <div class="alert alert-warning mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Bientôt disponible
                  </div>
                  @endif
                </div>
              </div>
              
              <div class="col-md-6 p-4 p-lg-5">
                <div class="text-center h-100 d-flex flex-column justify-content-center">
                  <h4 class="mb-4">Scan QR Code</h4>
                  <div class="mb-4 mx-auto">
                    <div class="qr-container p-3 bg-white rounded-3 shadow-sm d-inline-block">
                      <img src="{{ $qrCodeUrl }}" 
                           alt="QR Code Mi-Gban" 
                           class="img-fluid"
                           style="width: 200px; height: 200px;">
                    </div>
                  </div>
                  <div class="requirements">
                    <h5 class="h6 mb-3">Configuration requise</h5>
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <i class="fas fa-check text-success me-2"></i>
                          <small>Android 5.0+</small>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <i class="fas fa-check text-success me-2"></i>
                          <small>Internet</small>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <i class="fas fa-check text-success me-2"></i>
                          <small>500 MB libre</small>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <i class="fas fa-check text-success me-2"></i>
                          <small>2GB RAM</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Problématique -->
  <section id="problem" class="section py-5">
    <div class="container">
      <div class="section-header text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 mb-3">
          <i class="fas fa-exclamation-triangle me-2"></i>Problématique
        </span>
        <h2 class="display-5 fw-bold mb-3">Les défis immobiliers en Côte d'Ivoire</h2>
        <p class="lead text-muted">Nous identifions et résolvons les principaux obstacles</p>
      </div>

      <div class="row g-4">
        @php
        $problems = [
          ['icon' => 'fa-question-circle', 'color' => 'primary', 'title' => 'Manque de Fiabilité', 'desc' => 'Offres obsolètes ou inexactes sur des plateformes non centralisées'],
          ['icon' => 'fa-clock', 'color' => 'info', 'title' => 'Processus Long', 'desc' => 'Déplacements répétés et perte de temps considérable'],
          ['icon' => 'fa-eye-slash', 'color' => 'primary', 'title' => 'Manque de Transparence', 'desc' => 'Informations partielles et difficulté à comparer'],
          ['icon' => 'fa-money-bill-wave', 'color' => 'info', 'title' => 'Coûts Élevés', 'desc' => 'Frais d\'agence disproportionnés et frais cachés'],
        ];
        @endphp
        
        @foreach($problems as $problem)
        <div class="col-md-6 col-lg-3">
          <div class="">
            <div class="card-body text-center p-4">
              <div class="icon-wrapper mb-4 mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                   style="width: 70px; height: 70px; background: rgba(var(--bs-{{ $problem['color'] }}-rgb), 0.1);">
                <i class="fas {{ $problem['icon'] }} fa-2x text-{{ $problem['color'] }}"></i>
              </div>
              <h4 class="h5 fw-bold mb-3">{{ $problem['title'] }}</h4>
              <p class="text-muted mb-0">{{ $problem['desc'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Fonctionnalités -->
  <section id="features" class="section py-5 bg-light">
    <div class="container">
      <div class="section-header text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 mb-3">
          <i class="fas fa-star me-2"></i>Fonctionnalités
        </span>
        <h2 class="display-5 fw-bold mb-3">Tout ce dont vous avez besoin</h2>
        <p class="lead text-muted">Une expérience immobilière complète et intuitive</p>
      </div>

      <div class="row g-4 mb-5">
        <div class="col-lg-6">
          <div class="">
            <div class="card-header bg-primary bg-opacity-10 border-0 py-4">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="icon-wrapper rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                       style="width: 60px; height: 60px;">
                    <i class="fas fa-user-tie fa-lg"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-4">
                  <h3 class="h4 mb-0">Pour Propriétaires & Agents</h3>
                  <p class="text-muted mb-0 small">Gérez efficacement vos biens</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4">
              <div class="row g-3">
                @php
                $featuresOwners = [
                  'Ajout et gestion simplifiée des biens',
                  'Tableau de bord avec statistiques',
                  'Suivi des réservations temps réel',
                  'Gestion des médias (photos/vidéos)',
                  'Notifications pour nouvelles demandes',
                  'Gestion des contrats numériques'
                ];
                @endphp
                
                @foreach($featuresOwners as $feature)
                <div class="col-md-6">
                  <div class="d-flex align-items-start mb-3">
                    <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                    <span class="flex-grow-1">{{ $feature }}</span>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="">
            <div class="card-header bg-info bg-opacity-10 border-0 py-4">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="icon-wrapper rounded-circle bg-info text-white d-flex align-items-center justify-content-center" 
                       style="width: 60px; height: 60px;">
                    <i class="fas fa-search fa-lg"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-4">
                  <h3 class="h4 mb-0">Pour Chercheurs de Biens</h3>
                  <p class="text-muted mb-0 small">Trouvez votre bien idéal</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4">
              <div class="row g-3">
                @php
                $featuresUsers = [
                  'Recherche avancée multi-critères',
                  'Alertes personnalisées par email',
                  'Réservation en ligne sécurisée',
                  'Comparaison côte à côte',
                  'Visites virtuelles 360°',
                  'Avis et notations vérifiées'
                ];
                @endphp
                
                @foreach($featuresUsers as $feature)
                <div class="col-md-6">
                  <div class="d-flex align-items-start mb-3">
                    <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                    <span class="flex-grow-1">{{ $feature }}</span>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Types de biens -->
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-lg-5">
              <h3 class="h4 text-center mb-4">
                <i class="fas fa-home text-primary me-2"></i>
                Types de biens gérés
              </h3>
              <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                @php
                $propertyTypes = [
                  ['icon' => 'fa-home', 'label' => 'Maisons'],
                  ['icon' => 'fa-building', 'label' => 'Appartements'],
                  ['icon' => 'fa-map-marked-alt', 'label' => 'Terrains'],
                  ['icon' => 'fa-hotel', 'label' => 'Hôtels'],
                  ['icon' => 'fa-industry', 'label' => 'Bureaux'],
                  ['icon' => 'fa-plus', 'label' => 'Et bien plus...'],
                ];
                @endphp
                
                @foreach($propertyTypes as $type)
                <div class="col">
                  <div class="property-type-card text-center p-3 rounded-3">
                    <div class="mb-2">
                      <i class="fas {{ $type['icon'] }} fa-2x"></i>
                    </div>
                    <small class="fw-semibold">{{ $type['label'] }}</small>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bénéfices -->
  <section id="benefits" class="section py-5">
    <div class="container">
      <div class="section-header text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 mb-3">
          Avantages
        </span>
        <h2 class="display-5 fw-bold mb-3">Pourquoi choisir Mi-Gban ?</h2>
        <p class="lead text-muted">Des bénéfices concrets pour tous les acteurs</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="">
            <div class="d-flex align-items-center mb-4">
              <div class="flex-shrink-0">
                <div class="icon-wrapper bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                     style="width: 50px; height: 50px;">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
              <div class="flex-grow-1 ms-3">
                <h3 class="h5 fw-bold mb-0">Pour Agents & Propriétaires</h3>
                <small class="text-muted">Augmentez votre efficacité</small>
              </div>
            </div>
            
            <div class="row g-3">
              @php
              $benefitsAgents = [
                ['icon' => 'fa-chart-line', 'title' => 'Visibilité multipliée', 'desc' => 'Portée nationale de vos annonces'],
                ['icon' => 'fa-clock', 'title' => '70% de temps gagné', 'desc' => 'Automatisation des processus'],
                ['icon' => 'fa-money-bill-wave', 'title' => '+40% de ventes', 'desc' => 'Meilleur ciblage des clients'],
                ['icon' => 'fa-users', 'title' => 'Portfolio digital', 'desc' => 'Gestion centralisée de tous vos biens'],
              ];
              @endphp
              
              @foreach($benefitsAgents as $benefit)
              <div class="col-md-6">
                <div class="d-flex align-items-start h-100">
                  <i class="fas {{ $benefit['icon'] }} text-primary mt-1 me-3"></i>
                  <div>
                    <h5 class="h6 fw-bold mb-1">{{ $benefit['title'] }}</h5>
                    <p class="small text-muted mb-0">{{ $benefit['desc'] }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="">
            <div class="d-flex align-items-center mb-4">
              <div class="flex-shrink-0">
                <div class="icon-wrapper bg-info text-white rounded-circle d-flex align-items-center justify-content-center" 
                     style="width: 50px; height: 50px;">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <div class="flex-grow-1 ms-3">
                <h3 class="h5 fw-bold mb-0">Pour les Utilisateurs</h3>
                <small class="text-muted">Trouvez votre bien idéal</small>
              </div>
            </div>
            
            <div class="row g-3">
              @php
              $benefitsUsers = [
                ['icon' => 'fa-bolt', 'title' => 'Recherche ultra-rapide', 'desc' => 'Trouvez en moins de 5 minutes'],
                ['icon' => 'fa-shield-alt', 'title' => '100% sécurisé', 'desc' => 'Transactions vérifiées et traçables'],
                ['icon' => 'fa-piggy-bank', 'title' => 'Jusqu\'à -30%', 'desc' => 'Réduction des frais intermédiaires'],
                ['icon' => 'fa-star', 'title' => 'Expérience premium', 'desc' => 'Interface intuitive et fluide'],
              ];
              @endphp
              
              @foreach($benefitsUsers as $benefit)
              <div class="col-md-6">
                <div class="d-flex align-items-start h-100">
                  <i class="fas {{ $benefit['icon'] }} text-primary mt-1 me-3"></i>
                  <div>
                    <h5 class="h6 fw-bold mb-1">{{ $benefit['title'] }}</h5>
                    <p class="small text-muted mb-0">{{ $benefit['desc'] }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="section py-5 bg-primary">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3 col-6">
          <div class="text-center text-white">
            <div class="display-4 fw-bold mb-2" data-count="100000">+100K</div>
            <p class="mb-0 opacity-90">Utilisateurs actifs</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="text-center text-white">
            <div class="display-4 fw-bold mb-2" data-count="50000">+50K</div>
            <p class="mb-0 opacity-90">Biens répertoriés</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="text-center text-white">
            <div class="display-4 fw-bold mb-2">4.8</div>
            <p class="mb-0 opacity-90">Note moyenne</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="text-center text-white">
            <div class="display-4 fw-bold mb-2" data-count="98">98%</div>
            <p class="mb-0 opacity-90">Satisfaction</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partage -->
  <section id="share" class="section py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
               style="width: 80px; height: 80px;">
            <i class="fas fa-share-alt fa-2x"></i>
          </div>
          <h2 class="h1 fw-bold mb-3">Partagez l'innovation</h2>
          <p class="lead text-muted mb-5">Aidez vos proches à découvrir Mi-Gban</p>
          
          <div class="row g-3 mb-5">
            <div class="col-md-3 col-6">
              <a href="#" 
                 data-share="facebook"
                 class="social-share-btn btn-facebook w-100 py-3">
                <i class="fab fa-facebook-f fa-lg me-2"></i>
                Facebook
              </a>
            </div>
            <div class="col-md-3 col-6">
              <a href="#" 
                 data-share="twitter"
                 class="social-share-btn btn-twitter w-100 py-3">
                <i class="fab fa-twitter fa-lg me-2"></i>
                Twitter
              </a>
            </div>
            <div class="col-md-3 col-6">
              <a href="#" 
                 data-share="whatsapp"
                 class="social-share-btn btn-whatsapp w-100 py-3">
                <i class="fab fa-whatsapp fa-lg me-2"></i>
                WhatsApp
              </a>
            </div>
            <div class="col-md-3 col-6">
              <a href="#" 
                 data-share="linkedin"
                 class="social-share-btn btn-linkedin w-100 py-3">
                <i class="fab fa-linkedin-in fa-lg me-2"></i>
                LinkedIn
              </a>
            </div>
          </div>
          
          <div class="copy-link-container">
            <h5 class="h6 mb-3">Ou copiez le lien :</h5>
            <div class="input-group input-group-lg">
              <input type="text" 
                     class="form-control border-primary" 
                     value="{{ url()->current() }}" 
                     id="share-url"
                     readonly>
              <button class="btn btn-primary" 
                      type="button" 
                      data-action="copy-link">
                <i class="fas fa-copy me-2"></i>Copier
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Final -->
  <section id="cta-migban" class="section py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <div class="cta-content p-5 rounded-4">
            <span class="badge bg-white text-primary px-4 py-2 mb-4">
              Lancez-vous
            </span>
            
            <h2 class="display-5 fw-bold text-white mb-4">
              Prêt à révolutionner <br>votre expérience immobilière ?
            </h2>
            
            <p class="lead text-light mb-5 opacity-90">
              Rejoignez des milliers d'utilisateurs satisfaits et transformez 
              votre recherche ou gestion immobilière dès aujourd'hui.
            </p>
            
            <div class="d-flex flex-column flex-md-row gap-3 justify-content-center mb-5">
              @if($apkExists)
              <a href="{{ $apkUrl }}" 
                  style="background-color: var(--mi-gban-primary); border-color: var(--mi-gban-primary);"
                 class="btn btn-primary btn-lg px-5 py-3 shadow"
                 download="MIGBAN.apk">
                <i class="fas fa-download fa-lg me-2"></i>
                Télécharger gratuitement
              </a>
              @else
              <button class="btn btn-secondary btn-lg px-5 py-3" disabled>
                <i class="fas fa-clock me-2"></i>
                Disponible prochainement
              </button>
              @endif
              
              <a href="tel:+2250712566956" class="btn btn-outline-light btn-lg px-5 py-3">
                <i class="fas fa-phone-alt me-2"></i>
                Nous contacter
              </a>
            </div>
            
            <div class="trust-badges d-flex flex-wrap justify-content-center gap-4">
              <div class="d-flex align-items-center">
                <i class="fas fa-shield-alt text-success fa-lg me-2"></i>
                <small class="text-light">100% Sécurisé</small>
              </div>
              <div class="d-flex align-items-center">
                <i class="fas fa-leaf text-success fa-lg me-2"></i>
                <small class="text-light">Sans publicité</small>
              </div>
              <div class="d-flex align-items-center">
                <i class="fas fa-headset text-success fa-lg me-2"></i>
                <small class="text-light">Support 7j/7</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection

@section('page-scripts')
<script>
  // Animation des compteurs
  function animateCounters() {
    const counters = document.querySelectorAll('[data-count]');
    
    counters.forEach(counter => {
      const target = parseInt(counter.getAttribute('data-count'));
      const duration = 2000;
      const step = target / (duration / 16);
      let current = 0;
      
      const timer = setInterval(() => {
        current += step;
        if (current >= target) {
          counter.textContent = target >= 1000 ? 
            '+' + Math.floor(target/1000) + 'K' : 
            target.toLocaleString();
          clearInterval(timer);
        } else {
          counter.textContent = current >= 1000 ? 
            '+' + Math.floor(current/1000) + 'K' : 
            Math.floor(current).toLocaleString();
        }
      }, 16);
    });
  }

  // Observer pour animer les compteurs quand ils deviennent visibles
  const observerOptions = {
    threshold: 0.5
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounters();
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observer les stats
  const statsSection = document.querySelector('.bg-primary');
  if (statsSection) {
    observer.observe(statsSection);
  }

  // Suivi des téléchargements
  document.addEventListener('DOMContentLoaded', function() {
    console.log('📱 Page Mi-Gban chargée');
    
    @if($apkExists)
      console.log('✅ APK disponible : {{ $apkSize }} MB');
      
      // Suivi des clics sur le téléchargement
      document.querySelectorAll('a[href*="MIGBAN.apk"]').forEach(link => {
        link.addEventListener('click', function() {
          console.log('📥 Téléchargement Mi-Gban initié');
          // Ajouter votre suivi analytics ici
          // gtag('event', 'download', { item_name: 'Mi-Gban APK' });
        });
      });
    @else
      console.warn('⚠️ APK non disponible - Mode démonstration');
    @endif
  });
</script>
@endsection