@extends('base.layouts')
@section('content')

<main class="main">

  <!-- Hero Section pour Mi-Gban -->
  <section id="hero-migban" class="hero section" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="d-flex align-items-center mb-3">
            <div class="app-icon me-3">
              <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 28px;">🏠</span>
              </div>
            </div>
            <div>
              <span class="badge bg-white text-dark px-3 py-2 mb-2">Application Immobilière</span>
            </div>
          </div>
          
          <h1 class="display-4 fw-bold mb-4 text-white">
            <span style="background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">MI-GBAN</span><br>
            L'Immobilier Réinventé
          </h1>
          
          <p class="lead mb-4 text-light">
            L'application qui révolutionne la recherche et la gestion immobilière en Côte d'Ivoire.
            Trouvez, louez ou achetez votre bien en quelques clics.
          </p>
          
          <div class="d-flex flex-wrap gap-3 mb-4">
            @if($apkExists)
              <a href="{{ $apkUrl }}" class="btn btn-primary btn-lg px-4" style="background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%); border: none;">
                <span class="me-2">📥</span>Télécharger l'App
              </a>
            @else
              <button class="btn btn-secondary btn-lg px-4" disabled>
                <span class="me-2">⏳</span>Bientôt disponible
              </button>
            @endif
            <a href="#features" class="btn btn-outline-light btn-lg px-4">
              <span class="me-2">✨</span>Découvrir
            </a>
          </div>
          
          <!-- Indicateur APK -->
          @if(!$apkExists)
            <div class="alert alert-warning mt-3">
              <small><strong>ℹ️ Information :</strong> Le fichier APK sera bientôt disponible.</small>
            </div>
          @endif
          
          <!-- Partager sur réseaux sociaux -->
          <div class="social-share mt-4">
            <p class="text-light mb-2">Partager l'application :</p>
            <div class="d-flex gap-2">
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                 target="_blank" 
                 class="btn btn-sm btn-outline-light d-flex align-items-center">
                <span class="me-2">📘</span> Facebook
              </a>
              <a href="https://twitter.com/intent/tweet?text=Découvrez%20Mi-Gban%2C%20l'application%20immobilière%20révolutionnaire%20en%20Côte%20d'Ivoire&url={{ urlencode(url()->current()) }}" 
                 target="_blank" 
                 class="btn btn-sm btn-outline-light d-flex align-items-center">
                <span class="me-2">🐦</span> Twitter
              </a>
              <a href="https://api.whatsapp.com/send?text=Découvrez Mi-Gban, l'application immobilière révolutionnaire : {{ urlencode(url()->current()) }}" 
                 target="_blank" 
                 class="btn btn-sm btn-outline-light d-flex align-items-center">
                <span class="me-2">💬</span> WhatsApp
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <img src="{{ asset('visiteur/assets/img/migban/bannier-mi-gban.png') }}" 
               alt="Application Mi-Gban Mobile" 
               class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Section Téléchargement -->
  <section id="download" class="section py-5" style="background: #f8fafc;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
         
          <img src="{{ asset('visiteur/assets/img/migban/mi-gban-logo.png') }}" 
               alt="Logo Mi-Gban" 
               class="img-fluid mb-4"
               style="max-height: 100px;">
          
          <h2 class="mb-3" style="color: #1e293b;">Téléchargez Mi-Gban Maintenant</h2>
          
          @if($apkExists)
            <p class="lead mb-4" style="color: #64748b;">Disponible gratuitement pour Android • {{ $apkSize }} MB</p>
          @else
            <p class="lead mb-4" style="color: #64748b;">Bientôt disponible • Préparation en cours</p>
          @endif
          
          <div class="download-buttons">
            <!-- Bouton de téléchargement -->
            @if($apkExists)
              <a href="{{ $apkUrl }}" 
                 class="btn btn-primary btn-lg px-5 py-3 mb-3" 
                 style="background: linear-gradient(135deg, #ec681d 0%, #d45810 100%); border: none;"
                 download="MIGBAN.apk">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="fs-3 me-3">📥</span>
                  <div class="text-start">
                    <div class="fw-bold">TÉLÉCHARGER MI-GBAN</div>
                    <small class="opacity-75">Version 1.0 • Android 5.0+ • {{ $apkSize }} MB</small>
                  </div>
                </div>
              </a>
            @else
              <div class="alert alert-info mb-3">
                <strong>📱 Téléchargement bientôt disponible</strong><br>
                Le fichier APK est en cours de finalisation.
              </div>
            @endif
            
            <!-- QR Code dynamique -->
            <div class="mt-3">
              <p class="text-muted mb-2">Scannez le QR Code :</p>
              <div class="d-inline-block p-3 bg-white rounded-3 shadow-sm">
                <!-- QR Code généré par le contrôleur -->
               <!-- LIGNE 132 : REMPLACEZ -->


<!-- PAR : -->
<img src="{{ $qrCodeUrl }}" 
     alt="QR Code Mi-Gban" 
     style="width: 150px; height: 150px;">
              </div>
              <p class="text-muted mt-2 small">
                📱 Pointez votre appareil photo vers ce code
                @if($apkExists)
                  <br>↪️ Redirige vers le téléchargement
                @else
                  <br>⚠️ Le lien sera activé bientôt
                @endif
              </p>
            </div>
            
            <!-- Télécharger le QR Code -->
            <div class="mt-2">
              <a href="{{ $qrCodeUrl  }}" 
                 download="qr-code-migban.png"
                 class="btn btn-sm btn-outline-primary">
                <span class="me-1">💾</span> Télécharger ce QR Code
              </a>
            </div>
            
            <div class="requirements mt-4 pt-4 border-top">
              <h5 class="mb-3">📋 Configuration requise :</h5>
              <div class="row justify-content-center">
                <div class="col-auto">
                  <div class="d-flex align-items-center mb-2">
                    <span class="me-2 text-success">✅</span>
                    <span>Android 5.0 ou supérieur</span>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="d-flex align-items-center mb-2">
                    <span class="me-2 text-success">✅</span>
                    <span>Connexion Internet</span>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="d-flex align-items-center mb-2">
                    <span class="me-2 text-success">✅</span>
                    <span>500 MB d'espace libre</span>
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
  <section id="problem" class="section" style="background: white;">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>🚨 Problématique <span style="color: #ec681d;">Immobilière</span></h2>
        <p style="color: #64748b;">Les défis actuels dans la recherche de biens en Côte d'Ivoire</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="problem-card p-4 h-100" style="border-left: 4px solid #ec681d; background: #f8fafc; border-radius: 8px;">
            <div class="mb-3" style="font-size: 40px;">🤔</div>
            <h4 class="h5 mb-3" style="color: #1e293b;">Manque de Fiabilité</h4>
            <p class="mb-0" style="color: #64748b;">Plateformes non centralisées et offres souvent obsolètes ou inexactes</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="problem-card p-4 h-100" style="border-left: 4px solid #1fb9eb; background: #f8fafc; border-radius: 8px;">
            <div class="mb-3" style="font-size: 40px;">⏳</div>
            <h4 class="h5 mb-3" style="color: #1e293b;">Processus Long</h4>
            <p class="mb-0" style="color: #64748b;">Déplacements répétés et perte de temps dans les recherches</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
          <div class="problem-card p-4 h-100" style="border-left: 4px solid #ec681d; background: #f8fafc; border-radius: 8px;">
            <div class="mb-3" style="font-size: 40px;">👁️‍🗨️</div>
            <h4 class="h5 mb-3" style="color: #1e293b;">Manque de Transparence</h4>
            <p class="mb-0" style="color: #64748b;">Informations partielles et difficulté à comparer les offres</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
          <div class="problem-card p-4 h-100" style="border-left: 4px solid #1fb9eb; background: #f8fafc; border-radius: 8px;">
            <div class="mb-3" style="font-size: 40px;">💰</div>
            <h4 class="h5 mb-3" style="color: #1e293b;">Coûts Élevés</h4>
            <p class="mb-0" style="color: #64748b;">Frais d'agence disproportionnés et frais cachés</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Fonctionnalités -->
  <section id="features" class="section" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>🎯 Fonctionnalités <span style="color: #ec681d;">Principales</span></h2>
        <p style="color: #64748b;">Découvrez comment Mi-Gban simplifie l'immobilier</p>
      </div>

      <div class="row g-4">
        <!-- Pour les Propriétaires/Agents -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 h-100" style="background: white; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-top: 4px solid #ec681d;">
            <div class="d-flex align-items-center mb-4">
              <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                <span style="font-size: 24px;">👨‍💼</span>
              </div>
              <h3 class="h4 mb-0" style="color: #1e293b;">Pour Propriétaires & Agents</h3>
            </div>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Ajout et gestion simplifiée des biens</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Tableau de bord intuitif avec statistiques</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Suivi des réservations en temps réel</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Gestion des médias (photos/vidéos)</span>
              </li>
              <li class="d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Notifications pour nouvelles demandes</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Pour les Utilisateurs -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="p-4 h-100" style="background: white; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-top: 4px solid #1fb9eb;">
            <div class="d-flex align-items-center mb-4">
              <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1fb9eb 0%, #ec681d 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                <span style="font-size: 24px;">🔍</span>
              </div>
              <h3 class="h4 mb-0" style="color: #1e293b;">Pour Chercheurs de Biens</h3>
            </div>
            <ul class="list-unstyled">
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Recherche avancée multi-critères</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Système d'alertes personnalisées</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Réservation en ligne sécurisée</span>
              </li>
              <li class="mb-3 d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Comparaison des offres</span>
              </li>
              <li class="d-flex align-items-center">
                <span class="me-3" style="color: #10b981;">✅</span>
                <span style="color: #475569;">Notifications push instantanées</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Types de biens -->
      <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
        <div class="col-12">
          <h3 class="text-center mb-4" style="color: #1e293b;">🏘️ Types de Biens Gérés</h3>
          <div class="row g-3 justify-content-center">
            <div class="col-auto">
              <span class="badge px-3 py-2" style="background: rgba(236, 104, 29, 0.1); color: #ec681d; font-size: 15px;">🏠 Maisons</span>
            </div>
            <div class="col-auto">
              <span class="badge px-3 py-2" style="background: rgba(31, 185, 235, 0.1); color: #1fb9eb; font-size: 15px;">🏢 Appartements</span>
            </div>
            <div class="col-auto">
              <span class="badge px-3 py-2" style="background: rgba(236, 104, 29, 0.1); color: #ec681d; font-size: 15px;">📐 Terrains</span>
            </div>
            <div class="col-auto">
              <span class="badge px-3 py-2" style="background: rgba(31, 185, 235, 0.1); color: #1fb9eb; font-size: 15px;">🏨 Hôtels/Résidences</span>
            </div>
            <div class="col-auto">
              <span class="badge px-3 py-2" style="background: rgba(236, 104, 29, 0.1); color: #ec681d; font-size: 15px;">🏭 Locaux Commerciaux</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bénéfices -->
  <section id="benefits" class="section" style="background: white;">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>💎 Bénéfices <span style="color: #ec681d;">Concrets</span></h2>
        <p style="color: #64748b;">Ce que Mi-Gban apporte à chaque partie</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 h-100" style="border-radius: 12px; border: 2px solid #ec681d; background: #f8fafc;">
            <h3 class="h4 mb-4" style="color: #ec681d;">👨‍💼 Pour les Agents & Propriétaires</h3>
            <div class="d-flex align-items-start mb-3">
              <span class="me-3" style="font-size: 24px;">📈</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Visibilité Accrue</h5>
                <p class="small mb-0" style="color: #64748b;">Multipliez la portée de vos annonces</p>
              </div>
            </div>
            <div class="d-flex align-items-start mb-3">
              <span class="me-3" style="font-size: 24px;">⏱️</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Gain de Temps</h5>
                <p class="small mb-0" style="color: #64748b;">Gestion centralisée et automatisation</p>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="me-3" style="font-size: 24px;">💰</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Augmentation des Ventes</h5>
                <p class="small mb-0" style="color: #64748b;">Ciblez mieux vos clients potentiels</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="p-4 h-100" style="border-radius: 12px; border: 2px solid #1fb9eb; background: #f8fafc;">
            <h3 class="h4 mb-4" style="color: #1fb9eb;">👤 Pour les Utilisateurs</h3>
            <div class="d-flex align-items-start mb-3">
              <span class="me-3" style="font-size: 24px;">⚡</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Recherche Rapide</h5>
                <p class="small mb-0" style="color: #64748b;">Trouvez en quelques minutes</p>
              </div>
            </div>
            <div class="d-flex align-items-start mb-3">
              <span class="me-3" style="font-size: 24px;">🛡️</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Sécurité</h5>
                <p class="small mb-0" style="color: #64748b;">Transactions sécurisées et traçables</p>
              </div>
            </div>
            <div class="d-flex align-items-start">
              <span class="me-3" style="font-size: 24px;">💸</span>
              <div>
                <h5 class="h6 mb-1" style="color: #1e293b;">Économies</h5>
                <p class="small mb-0" style="color: #64748b;">Réduction des frais intermédiaires</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partager Section -->
  <section id="share" class="section py-5" style="background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%);">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <div class="mb-4" style="font-size: 48px;">📢</div>
          <h2 class="mb-4 text-white">Partagez Mi-Gban avec vos amis</h2>
          <p class="lead mb-4 text-white">Aidez-nous à révolutionner l'immobilier en Côte d'Ivoire</p>
          
          <div class="social-share-large">
            <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote=Découvrez%20Mi-Gban,%20l'application%20qui%20révolutionne%20l'immobilier%20en%20Côte%20d'Ivoire%20!%20🏠✨" 
                 target="_blank" 
                 class="btn btn-lg px-4 py-3 d-flex align-items-center"
                 style="background: #1877F2; color: white; border: none;">
                <span class="fs-4 me-2">📘</span>
                <div class="text-start">
                  <div class="fw-bold">Partager sur Facebook</div>
                  <small class="opacity-75">2.9 milliards d'utilisateurs</small>
                </div>
              </a>
              
              <a href="https://twitter.com/intent/tweet?text=🚀%20Découvrez%20Mi-Gban%20!%20L'application%20qui%20révolutionne%20l'immobilier%20en%20Côte%20d'Ivoire.%20Trouvez,%20louez%20ou%20achetez%20votre%20bien%20en%20quelques%20clics.%20👉%20{{ urlencode(url()->current()) }}%20%23MiGban%20%23Immobilier%20%23CotedIvoire" 
                 target="_blank" 
                 class="btn btn-lg px-4 py-3 d-flex align-items-center"
                 style="background: #1DA1F2; color: white; border: none;">
                <span class="fs-4 me-2">🐦</span>
                <div class="text-start">
                  <div class="fw-bold">Partager sur Twitter</div>
                  <small class="opacity-75">450 millions d'utilisateurs</small>
                </div>
              </a>
              
              <a href="https://api.whatsapp.com/send?text=🏠 *MI-GBAN* - L'application qui révolutionne l'immobilier en Côte d'Ivoire !%0A%0A✨ *Fonctionnalités :*%0A• Recherche avancée de biens%0A• Alertes personnalisées%0A• Réservation en ligne%0A• Gestion complète%0A%0A📥 Téléchargez maintenant :%0A{{ urlencode(url()->current()) }}%0A%0A#MiGban #Immobilier #CôteDIvoire" 
                 target="_blank" 
                 class="btn btn-lg px-4 py-3 d-flex align-items-center"
                 style="background: #25D366; color: white; border: none;">
                <span class="fs-4 me-2">💬</span>
                <div class="text-start">
                  <div class="fw-bold">Partager sur WhatsApp</div>
                  <small class="opacity-75">2 milliards d'utilisateurs</small>
                </div>
              </a>
            </div>
          </div>
          
          <div class="mt-5">
            <p class="text-white mb-3">Ou copiez le lien :</p>
            <div class="input-group input-group-lg mx-auto" style="max-width: 500px;">
              <input type="text" 
                     class="form-control" 
                     value="{{ url()->current() }}" 
                     id="share-url"
                     readonly
                     style="border-radius: 8px 0 0 8px;">
              <button class="btn btn-light" 
                      type="button" 
                      onclick="copyToClipboard()"
                      style="border-radius: 0 8px 8px 0;">
                <span class="me-2">📋</span> Copier
              </button>
            </div>
            <div id="copy-message" class="mt-2" style="display: none;">
              <span class="text-white">✅ Lien copié !</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Final -->
  <section id="cta-migban" class="section py-5" style="background: #1e293b;">
    <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up">
        <div class="col-lg-8">
          <div class="mb-4" style="font-size: 48px;">🚀</div>
          <h2 class="display-5 fw-bold mb-4 text-white">Prêt à Révolutionner l'Immobilier ?</h2>
          <p class="lead mb-5 text-light">
            Téléchargez Mi-Gban dès aujourd'hui et bénéficiez d'un accès privilégié à la première 
            plateforme immobilière digitale complète de Côte d'Ivoire.
          </p>
          
          <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
            @if($apkExists)
              <a href="{{ $apkUrl }}" 
                 class="btn btn-primary btn-lg px-5 py-3"
                 style="background: linear-gradient(135deg, #ec681d 0%, #1fb9eb 100%); border: none;"
                 download="MIGBAN.apk">
                <span class="fs-4 me-2">📥</span>TÉLÉCHARGER GRATUITEMENT
              </a>
            @else
              <button class="btn btn-secondary btn-lg px-5 py-3" disabled>
                <span class="fs-4 me-2">⏳</span>Bientôt disponible
              </button>
            @endif
            
            <a href="#contact" class="btn btn-outline-light btn-lg px-5 py-3">
              <span class="me-2">👥</span>Devenir Partenaire
            </a>
          </div>
          
          <p class="mt-4 small opacity-75 text-light">
            Développé avec ❤️ par <strong style="color: #ec681d;">NDOUBLE</strong> - Innovation & Excellence Digitale
          </p>
          
          <!-- Stats -->
          <div class="row mt-5 pt-4 border-top border-secondary">
            <div class="col-md-4">
              <div class="stat-item">
                <div class="fs-2 fw-bold text-primary">200+</div>
                <div class="text-light">Utilisateurs Actifs</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-item">
                <div class="fs-2 fw-bold" style="color: #1fb9eb;">500+</div>
                <div class="text-light">Biens Répertoriés</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-item">
                <div class="fs-2 fw-bold" style="color: #ec681d;">4.8★</div>
                <div class="text-light">Note Moyenne</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<style>
  #hero-migban {
    padding: 100px 0 60px;
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
  }

  .problem-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .problem-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  .download-buttons a:hover:not([disabled]) {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(236, 104, 29, 0.3);
    transition: all 0.3s ease;
  }

  .social-share-large .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
  }

  .stat-item {
    padding: 15px;
  }

  @media (max-width: 768px) {
    #hero-migban {
      padding: 80px 0 40px;
      text-align: center;
    }
    
    .social-share-large .btn {
      width: 100%;
      margin-bottom: 10px;
    }
  }
</style>

<script>
  function copyToClipboard() {
    const copyText = document.getElementById("share-url");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    
    const message = document.getElementById("copy-message");
    message.style.display = "block";
    setTimeout(() => {
      message.style.display = "none";
    }, 2000);
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Page Mi-Gban chargée');
    
    @if($apkExists)
      console.log('✅ APK disponible : {{ $apkSize }} MB');
      
      // Suivi des téléchargements
      document.querySelectorAll('a[href*="MIGBAN.apk"]').forEach(link => {
        link.addEventListener('click', function() {
          console.log('Téléchargement Mi-Gban initié');
        });
      });
    @else
      console.warn('⚠️ APK non disponible');
    @endif
  });
</script>

@endsection