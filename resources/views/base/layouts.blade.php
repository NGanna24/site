<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  {{-- Titre dynamique --}}
  <title>@yield('title', 'NDOUBLE - Agence Digitale & Solutions IT Innovantes')</title>
  
  {{-- Meta description dynamique --}}
  <meta name="description" content="@yield('description', 'NDOUBLE - Agence digitale spécialisée en développement web, applications mobiles, design UX/UI et solutions informatiques innovantes à Bouaké')">
  
  {{-- Meta Open Graph dynamiques --}}
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="@yield('og-site-name', 'NDOUBLE')">
  <meta property="og:locale" content="fr_CI">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('og-title', 'NDOUBLE - Agence Digitale & Solutions IT Innovantes')">
  <meta property="og:description" content="@yield('og-description', 'Agence digitale spécialisée en développement web, applications mobiles, design UX/UI et solutions informatiques innovantes à Bouaké')">
  <meta property="og:image" content="@yield('og-image', asset('visiteur/assets/img/logo.png'))">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/jpeg">
  
  {{-- Twitter Card dynamiques --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@ndouble_ci">
  <meta name="twitter:creator" content="@ndouble_ci">
  <meta name="twitter:title" content="@yield('og-title', 'NDOUBLE - Agence Digitale')">
  <meta name="twitter:description" content="@yield('og-description', 'Solutions digitales innovantes pour votre transformation numérique')">
  <meta name="twitter:image" content="@yield('og-image', asset('visiteur/assets/img/logo.png'))">
  
  {{-- Favicon dynamique --}}
  <link href="@yield('favicon', asset('visiteur/assets/img/favicon.png'))" rel="icon" id="default-favicon">
  <link href="@yield('apple-touch-icon', asset('visiteur/assets/img/apple-touch-icon.png'))" rel="apple-touch-icon">
  
  <meta name="keywords" content="agence digitale, développement web, applications mobiles, design UX/UI, solutions IT, transformation numérique, Bouaké, Côte d'Ivoire">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('visiteur/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('visiteur/assets/css/main.css') }}" rel="stylesheet">
  
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  {{-- Styles spécifiques --}}
  @yield('page-styles')

  <style>
    /* Votre CSS existant... */
    :root {
      --primary: #ec681d;
      --primary-dark: #ec681d;
      --secondary: #ec691dde;
      --accent: #ec681d;
      --dark: #1e293b;
      --light: #f8fafc;
      --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      --gradient-light: linear-gradient(135deg, rgba(236, 104, 29, 0.1) 0%, rgba(236, 105, 29, 0.1) 100%);
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
    }

    /* ... Le reste de votre CSS ... */
    
  </style>
</head>

<body class="index-page @yield('body-class')">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center">
      
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('visiteur/assets/img/logo.png') }}" alt="NDOUBLE Logo" style="max-height: 40px;">
        <span class="ms-2">NDOUBLE</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
          <li><a href="#about">À Propos</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Réalisations</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#" class="btn btn-accent btn-sm ms-2">Espace Client</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links d-none d-lg-flex">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="https://www.facebook.com/share/1GzcJB2YpA/?mibextid=wwXIfr" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>

  @yield('content')

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <span class="sitename">NDOUBLE</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Agence digitale spécialisée en solutions web, mobiles et IT innovantes</p>
            <p class="mt-3"><strong>Téléphone:</strong> <span>+225 07 12 566 956</span></p>
            <p><strong>Email:</strong> <span>ndouble024@gmail.com</span></p>
            <p><strong>Adresse:</strong> <span>Bouaké, Côte d'Ivoire</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Navigation</h4>
          <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Réalisations</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Solutions Digitales</h4>
          <ul>
            <li><a href="#">Développement Web</a></li>
            <li><a href="#">Applications Mobiles</a></li>
            <li><a href="#">Design UX/UI</a></li>
            <li><a href="#">Solutions Cloud</a></li>
            <li><a href="#">Stratégie Digitale</a></li>
            <li><a href="#">Infographie & Branding</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-newsletter">
          <h4>Newsletter Tech</h4>
          <p>Recevez nos insights et innovations digitales</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form">
              <input type="email" name="email" placeholder="Votre email" required>
              <input type="submit" value="S'abonner" class="btn btn-primary">
            </div>
            <div class="loading">Chargement</div>
            <div class="error-message"></div>
            <div class="sent-message">Inscription réussie !</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">NDOUBLE</strong> <span>Tous droits réservés</span></p>
      <div class="credits">
        Agence Digitale & Solutions IT Innovantes
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('visiteur/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('visiteur/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('visiteur/assets/js/main.js') }}"></script>

  <script>
    // Configuration globale SIMPLIFIÉE
    const APP_CONFIG = {
      isMiGbanPage: function() {
        return window.location.pathname.includes('migban') || 
               document.querySelector('body.mi-gban-page') !== null;
      },
      
      getShareConfig: function() {
        // Récupérer les valeurs depuis les meta tags
        const ogTitle = document.querySelector('meta[property="og:title"]')?.content || document.title;
        const ogDescription = document.querySelector('meta[property="og:description"]')?.content;
        const ogImage = document.querySelector('meta[property="og:image"]')?.content;
        
        return {
          url: window.location.href,
          title: ogTitle,
          description: ogDescription,
          hashtags: this.isMiGbanPage() ? "MiGban,Immobilier,CoteIvoire,NDOUBLE" : "NDOUBLE,DigitalSolutions,AgenceDigitale",
          image: ogImage
        };
      }
    };

    // Système de partage intelligent
    class SmartShare {
      constructor() {
        this.config = APP_CONFIG.getShareConfig();
      }
      
      init() {
        this.updateShareLinks();
        this.setupCopyButton();
      }
      
      updateShareLinks() {
        const encodedUrl = encodeURIComponent(this.config.url);
        const encodedTitle = encodeURIComponent(this.config.title);
        const encodedDesc = encodeURIComponent(this.config.description || '');
        
        const shareUrls = {
          facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}&quote=${encodedTitle}`,
          twitter: `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}&hashtags=${this.config.hashtags}`,
          whatsapp: `https://api.whatsapp.com/send?text=${encodedTitle}%20-%20${encodedUrl}`,
          linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`
        };
        
        // Mettre à jour tous les boutons de partage
        document.querySelectorAll('[data-share]').forEach(btn => {
          const platform = btn.getAttribute('data-share');
          if (shareUrls[platform]) {
            btn.href = shareUrls[platform];
            btn.target = '_blank';
            btn.onclick = (e) => this.trackShare(platform);
          }
        });
        
        // Compatibilité avec les anciens boutons
        document.querySelectorAll('.btn-facebook:not([data-share])').forEach(btn => {
          btn.href = shareUrls.facebook;
          btn.target = '_blank';
        });
        
        document.querySelectorAll('.btn-twitter:not([data-share])').forEach(btn => {
          btn.href = shareUrls.twitter;
          btn.target = '_blank';
        });
        
        document.querySelectorAll('.btn-whatsapp:not([data-share])').forEach(btn => {
          btn.href = shareUrls.whatsapp;
          btn.target = '_blank';
        });
      }
      
      setupCopyButton() {
        const copyButtons = document.querySelectorAll('[data-action="copy-link"]');
        copyButtons.forEach(btn => {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            this.copyToClipboard(this.config.url);
          });
        });
      }
      
      async copyToClipboard(text) {
        try {
          await navigator.clipboard.writeText(text);
          this.showCopyMessage('✅ Lien copié dans le presse-papier !');
        } catch (err) {
          console.error('Erreur lors de la copie:', err);
          this.showCopyMessage('❌ Erreur lors de la copie', 'error');
        }
      }
      
      showCopyMessage(message, type = 'success') {
        document.querySelectorAll('.copy-message').forEach(el => el.remove());
        
        const alert = document.createElement('div');
        alert.className = `copy-message alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alert);
        
        setTimeout(() => {
          alert.remove();
        }, 3000);
      }
      
      trackShare(platform) {
        console.log(`📤 Partage sur ${platform}:`, this.config.url);
      }
    }

    // Initialisation principale
    document.addEventListener('DOMContentLoaded', function() {
      console.log('🚀 Initialisation du système de partage...');
      
      // 1. Configurer le partage
      const shareManager = new SmartShare();
      shareManager.init();
      
      // 2. Mobile Navigation
      const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
      const navMenu = document.querySelector('#navmenu');
      const body = document.body;
      
      if (mobileNavToggle) {
        mobileNavToggle.addEventListener('click', function(e) {
          e.preventDefault();
          navMenu.classList.toggle('active');
          this.classList.toggle('bi-list');
          this.classList.toggle('bi-x');
          
          if (navMenu.classList.contains('active')) {
            body.style.overflow = 'hidden';
          } else {
            body.style.overflow = '';
          }
        });
      }
      
      // 3. Navigation active
      const updateActiveLink = () => {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('#navmenu a[href^="#"]');
        let current = '';
        const scrollY = window.pageYOffset;
        const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
        
        sections.forEach(section => {
          const sectionHeight = section.offsetHeight;
          const sectionTop = section.offsetTop - headerHeight - 100;
          const sectionId = section.getAttribute('id');
          
          if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            current = sectionId;
          }
        });
        
        navLinks.forEach(link => {
          link.classList.remove('active');
          const href = link.getAttribute('href').replace('#', '');
          if (href === current) {
            link.classList.add('active');
          }
        });
      };
      
      window.addEventListener('scroll', updateActiveLink);
      updateActiveLink();
      
      console.log('✅ Système initialisé avec succès');
    });

    // Fonction globale pour copier
    window.copyToClipboard = function(text) {
      const shareManager = new SmartShare();
      shareManager.copyToClipboard(text || window.location.href);
    };
  </script>

  @yield('page-scripts')
</body>
</html>