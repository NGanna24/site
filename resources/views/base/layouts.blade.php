<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  {{-- Titre dynamique --}}
  <title>@yield('title', 'NDOUBLE - Agence Digitale & Solutions IT Innovantes')</title>
  
  {{-- Meta description dynamique --}}
  <meta name="description" content="@yield('description', 'NDOUBLE - Agence digitale spécialisée en développement web, applications mobiles, design UX/UI et solutions informatiques innovantes à Bouaké')">
  
  {{-- Meta Open Graph par défaut (NDOUBLE) --}}
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NDOUBLE">
  <meta property="og:locale" content="fr_CI">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="NDOUBLE - Agence Digitale & Solutions IT Innovantes">
  <meta property="og:description" content="Agence digitale spécialisée en développement web, applications mobiles, design UX/UI et solutions informatiques innovantes à Bouaké">
  <meta property="og:image" content="{{ asset('visiteur/assets/img/og-default.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/jpeg">
  
  {{-- Twitter Card par défaut (NDOUBLE) --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@ndouble_ci">
  <meta name="twitter:creator" content="@ndouble_ci">
  <meta name="twitter:title" content="NDOUBLE - Agence Digitale">
  <meta name="twitter:description" content="Solutions digitales innovantes pour votre transformation numérique">
  <meta name="twitter:image" content="{{ asset('visiteur/assets/img/logo.png') }}">
  
  {{-- Ces meta seront écrasés par Mi-Gban si besoin --}}
  @yield('meta-og-override')
  
  <meta name="keywords" content="agence digitale, développement web, applications mobiles, design UX/UI, solutions IT, transformation numérique, Bouaké, Côte d'Ivoire">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  {{-- Favicon NDOUBLE par défaut --}}
  <link href="{{ asset('visiteur/assets/img/favicon.png') }}" rel="icon" id="default-favicon">
  <link href="{{ asset('visiteur/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  
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

    /* ===== RESPONSIVE HEADER ===== */
    .header {
      padding: 15px 0;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--primary);
      text-decoration: none;
    }

    .logo img {
      max-height: 40px;
      transition: all 0.3s;
    }

    /* Navigation active state */
    .navmenu a.active {
      color: var(--primary) !important;
      font-weight: 600;
      position: relative;
    }

    .navmenu a.active::before {
      content: '';
      position: absolute;
      left: 50%;
      bottom: -5px;
      transform: translateX(-50%);
      width: 30px;
      height: 2px;
      background: var(--gradient);
      border-radius: 2px;
    }

    .navmenu li {
      position: relative;
    }

    /* Mobile Navigation */
    @media (max-width: 992px) {
      .navmenu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 280px;
        height: 100vh;
        background: white;
        padding-top: 80px;
        transition: 0.3s;
        z-index: 999;
        overflow-y: auto;
        box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
      }

      .navmenu.active {
        right: 0;
      }

      .navmenu ul {
        display: block;
        padding: 0;
        margin: 0;
      }

      .navmenu li {
        margin: 0;
        border-bottom: 1px solid #eee;
      }

      .navmenu a {
        display: block;
        padding: 15px 25px;
        font-size: 1rem;
        color: var(--dark);
        text-decoration: none;
        transition: all 0.3s;
      }

      .navmenu a:hover,
      .navmenu a.active {
        color: var(--primary);
        background: var(--gradient-light);
      }

      .navmenu a.active::before {
        left: 25px;
        transform: none;
        width: 3px;
        height: 20px;
        bottom: auto;
        top: 50%;
        transform: translateY(-50%);
      }

      .navmenu a.btn-accent {
        margin: 15px 25px;
        text-align: center;
        display: inline-block;
        width: calc(100% - 50px);
      }

      .mobile-nav-toggle {
        display: block !important;
        position: fixed;
        right: 20px;
        top: 20px;
        font-size: 1.5rem;
        cursor: pointer;
        z-index: 1000;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex !important;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: none;
      }

      .header-social-links {
        display: none;
      }
    }

    /* Mobile Nav Toggle */
    .mobile-nav-toggle {
      display: none;
    }

    /* ===== RESPONSIVE BUTTONS ===== */
    .btn-primary {
      background: var(--gradient);
      border: none;
      padding: 12px 28px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s;
      color: white;
      text-decoration: none;
      display: inline-block;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(236, 104, 29, 0.2);
      color: white;
    }

    .btn-get-started {
      background: var(--gradient);
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
      font-weight: 600;
      color: white;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s;
    }

    .btn-get-started:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(236, 104, 29, 0.3);
      color: white;
    }

    /* ===== RESPONSIVE HERO SECTION ===== */
    @media (max-width: 768px) {
      .hero {
        padding: 80px 0 40px;
      }

      .hero h2 {
        font-size: 1.8rem !important;
        line-height: 1.3;
        margin-bottom: 15px;
      }

      .hero p {
        font-size: 1rem !important;
        line-height: 1.6;
        margin-bottom: 20px;
      }

      .carousel-indicators {
        bottom: 10px;
      }

      .carousel-control-prev,
      .carousel-control-next {
        display: none;
      }

      .hero .container {
        padding: 0 20px;
      }
    }

    /* ===== RESPONSIVE ABOUT SECTION ===== */
    @media (max-width: 992px) {
      .about-img {
        margin-bottom: 30px;
        text-align: center;
      }

      .about-img img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
      }

      .inner-title {
        font-size: 2rem !important;
      }

      .our-story h3 {
        font-size: 1.5rem !important;
      }

      .stats {
        margin-top: 20px !important;
      }

      .stats .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
        margin-bottom: 15px;
        text-align: center;
      }

      .stats span {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        display: block;
      }

      .stats p {
        font-size: 0.9rem;
        color: #666;
        margin-top: 5px;
      }
    }

    /* ===== RESPONSIVE SERVICES SECTION ===== */
    @media (max-width: 768px) {
      .service-item {
        margin-bottom: 30px;
        padding: 25px 20px !important;
      }

      .service-item .icon {
        margin-bottom: 20px;
      }

      .service-item h3 {
        font-size: 1.3rem !important;
        margin-bottom: 10px;
      }

      .service-item p {
        font-size: 0.95rem;
        line-height: 1.5;
      }

      .section-title h2 {
        font-size: 2rem !important;
      }

      .section-title p {
        font-size: 1rem !important;
        padding: 0 15px;
      }
    }

    /* ===== RESPONSIVE PORTFOLIO SECTION ===== */
    @media (max-width: 768px) {
      .portfolio-item {
        margin-bottom: 30px;
      }

      .isotope-filters {
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        padding: 0 15px;
      }

      .isotope-filters li {
        padding: 8px 15px;
        font-size: 0.9rem;
        margin: 0 5px 10px;
      }

      .portfolio-info {
        padding: 15px !important;
      }

      .portfolio-info h4 {
        font-size: 1.1rem !important;
      }

      .portfolio-info p {
        font-size: 0.9rem !important;
      }
    }

    /* ===== RESPONSIVE CONTACT SECTION ===== */
    @media (max-width: 768px) {
      .contact .col-lg-6 {
        margin-bottom: 30px;
      }

      .info-item {
        margin-bottom: 20px;
        padding: 15px;
        background: var(--gradient-light);
        border-radius: 10px;
      }

      .info-item i {
        font-size: 1.5rem;
        margin-right: 15px;
        color: var(--primary);
      }

      .php-email-form .form-control {
        padding: 12px 15px;
        font-size: 1rem;
      }

      .php-email-form button[type="submit"] {
        width: 100%;
        padding: 15px;
        font-size: 1rem;
      }

      .col-md-6 {
        margin-bottom: 15px;
      }
    }

    /* ===== RESPONSIVE FOOTER ===== */
    @media (max-width: 768px) {
      .footer-top .row > div {
        margin-bottom: 30px;
      }

      .footer-links,
      .footer-about,
      .footer-newsletter {
        text-align: center;
      }

      .social-links {
        justify-content: center;
      }

      .footer-contact p {
        text-align: center;
      }

      .newsletter-form {
        flex-direction: column;
        gap: 10px;
      }

      .newsletter-form input[type="email"],
      .newsletter-form input[type="submit"] {
        width: 100%;
        margin-bottom: 10px;
      }
    }

    /* ===== IMAGES RESPONSIVE ===== */
    img {
      max-width: 100%;
      height: auto;
    }

    .img-fluid {
      max-width: 100%;
      height: auto;
    }

    /* ===== GENERAL RESPONSIVE ===== */
    .container {
      padding-left: 15px;
      padding-right: 15px;
    }

    @media (max-width: 576px) {
      .container {
        padding-left: 20px;
        padding-right: 20px;
      }
    }

    /* ===== DIGITAL STYLING ===== */
    .text-gradient {
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .bg-gradient {
      background: var(--gradient) !important;
    }

    .service-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .service-item .icon i {
      font-size: 2.5rem;
      color: var(--primary);
    }

    /* Digital animation */
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .service-item:hover .icon i {
      animation: float 2s ease-in-out infinite;
    }

    /* Section spacing mobile */
    section {
      padding: 60px 0;
    }

    @media (max-width: 768px) {
      section {
        padding: 40px 0;
      }
    }

    /* Row spacing mobile */
    .row.gy-4 {
      --bs-gutter-y: 1.5rem;
    }

    @media (max-width: 768px) {
      .row.gy-4 {
        --bs-gutter-y: 1rem;
      }
    }

    /* Scroll offset for fixed header */
    section[id] {
      scroll-margin-top: 80px;
    }
    
    /* ===== STYLES POUR LE PARTAGE ===== */
    .social-share-btn {
      border: none;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      padding: 12px 20px;
    }
    
    .social-share-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .btn-facebook {
      background: #1877F2;
      color: white;
    }
    
    .btn-twitter {
      background: #1DA1F2;
      color: white;
    }
    
    .btn-whatsapp {
      background: #25D366;
      color: white;
    }
    
    .btn-linkedin {
      background: #0077B5;
      color: white;
    }
    
    .btn-copy {
      background: #6c757d;
      color: white;
    }
    
    .btn-copy:hover {
      background: #5a6268;
    }
    
    /* Copy message */
    .copy-message {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      animation: slideIn 0.3s ease;
    }
    
    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    /* Styles pour Mi-Gban */
    .mi-gban-theme .btn-primary {
      background: linear-gradient(135deg, #ec681d 0%, #d45810 100%);
    }
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
    // Configuration globale
    const APP_CONFIG = {
      isMiGbanPage: function() {
        return window.location.pathname.includes('migban') || 
               document.title.includes('Mi-Gban') ||
               document.querySelector('#hero-migban') !== null ||
               document.querySelector('#migban-page') !== null;
      },
      
      getCurrentPageType: function() {
        if (this.isMiGbanPage()) {
          return 'migban';
        }
        return 'ndouble';
      },
      
      getShareConfig: function() {
        const pageType = this.getCurrentPageType();
        
        if (pageType === 'migban') {
          return {
            url: window.location.href,
            title: "Mi-Gban - Application Immobilière en Côte d'Ivoire",
            description: "Trouvez, louez ou vendez votre bien en quelques clics. L'application qui révolutionne l'immobilier en Côte d'Ivoire.",
            hashtags: "MiGban,Immobilier,CoteIvoire,NDOUBLE",
            image: "{{ asset('visiteur/assets/img/migban/share-preview.jpg') }}",
            favicon: "{{ asset('visiteur/assets/img/migban/mi-gban-favicon.png') }}",
            appleTouch: "{{ asset('visiteur/assets/img/migban/mi-gban-logo.png') }}"
          };
        } else {
          return {
            url: window.location.href,
            title: document.title,
            description: document.querySelector('meta[name="description"]')?.content || "NDOUBLE - Agence Digitale & Solutions IT Innovantes",
            hashtags: "NDOUBLE,DigitalSolutions,AgenceDigitale",
            image: "{{ asset('visiteur/assets/img/logo.png') }}",
            favicon: "{{ asset('visiteur/assets/img/favicon.png') }}",
            appleTouch: "{{ asset('visiteur/assets/img/apple-touch-icon.png') }}"
          };
        }
      }
    };

    // Système de favicon intelligent
    class SmartFavicon {
      constructor() {
        this.config = APP_CONFIG.getShareConfig();
        this.pageType = APP_CONFIG.getCurrentPageType();
      }
      
      async init() {
        console.log(`🌐 Page détectée: ${this.pageType.toUpperCase()}`);
        
        // Vérifier si le favicon spécifique existe
        const faviconExists = await this.checkImageExists(this.config.favicon);
        
        if (faviconExists && this.pageType === 'migban') {
          await this.setFavicon(this.config.favicon, this.config.appleTouch);
          console.log('✅ Favicon Mi-Gban appliqué');
        } else {
          console.log('✅ Favicon NDOUBLE appliqué (par défaut)');
          // Le favicon NDOUBLE est déjà défini dans le HTML
        }
      }
      
      checkImageExists(url) {
        return new Promise((resolve) => {
          const img = new Image();
          img.onload = () => resolve(true);
          img.onerror = () => resolve(false);
          img.src = url;
        });
      }
      
      async setFavicon(faviconUrl, appleTouchUrl) {
        // Mettre à jour le favicon standard
        let link = document.querySelector("link[rel*='icon']");
        if (!link) {
          link = document.createElement('link');
          link.rel = 'icon';
          document.head.appendChild(link);
        }
        link.href = faviconUrl;
        
        // Mettre à jour l'apple touch icon
        let appleLink = document.querySelector("link[rel*='apple-touch-icon']");
        if (!appleLink) {
          appleLink = document.createElement('link');
          appleLink.rel = 'apple-touch-icon';
          document.head.appendChild(appleLink);
        }
        appleLink.href = appleTouchUrl;
      }
    }

    // Système de partage intelligent
    class SmartShare {
      constructor() {
        this.config = APP_CONFIG.getShareConfig();
      }
      
      init() {
        this.updateMetaTags();
        this.updateShareLinks();
        this.setupCopyButton();
      }
      
      updateMetaTags() {
        // Mettre à jour les meta tags Open Graph
        this.setMetaTag('property', 'og:title', this.config.title);
        this.setMetaTag('property', 'og:description', this.config.description);
        this.setMetaTag('property', 'og:image', this.config.image);
        this.setMetaTag('property', 'og:url', this.config.url);
        
        // Mettre à jour Twitter Card
        this.setMetaTag('name', 'twitter:title', this.config.title);
        this.setMetaTag('name', 'twitter:description', this.config.description);
        this.setMetaTag('name', 'twitter:image', this.config.image);
        
        console.log('✅ Meta tags de partage mis à jour');
      }
      
      setMetaTag(attribute, name, content) {
        let meta = document.querySelector(`meta[${attribute}="${name}"]`);
        if (!meta) {
          meta = document.createElement('meta');
          meta.setAttribute(attribute, name);
          document.head.appendChild(meta);
        }
        meta.content = content;
      }
      
      updateShareLinks() {
        const encodedUrl = encodeURIComponent(this.config.url);
        const encodedTitle = encodeURIComponent(this.config.title);
        const encodedDesc = encodeURIComponent(this.config.description);
        
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
        
        // Mettre à jour les boutons avec classes spécifiques (pour compatibilité)
        document.querySelectorAll('.btn-facebook').forEach(btn => {
          if (!btn.hasAttribute('data-share')) {
            btn.href = shareUrls.facebook;
            btn.target = '_blank';
            btn.onclick = () => this.trackShare('facebook');
          }
        });
        
        document.querySelectorAll('.btn-twitter').forEach(btn => {
          if (!btn.hasAttribute('data-share')) {
            btn.href = shareUrls.twitter;
            btn.target = '_blank';
            btn.onclick = () => this.trackShare('twitter');
          }
        });
        
        document.querySelectorAll('.btn-whatsapp').forEach(btn => {
          if (!btn.hasAttribute('data-share')) {
            btn.href = shareUrls.whatsapp;
            btn.target = '_blank';
            btn.onclick = () => this.trackShare('whatsapp');
          }
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
          console.log('📋 Lien copié:', text);
        } catch (err) {
          console.error('Erreur lors de la copie:', err);
          this.showCopyMessage('❌ Erreur lors de la copie', 'error');
        }
      }
      
      showCopyMessage(message, type = 'success') {
        // Supprimer les messages précédents
        document.querySelectorAll('.copy-message').forEach(el => el.remove());
        
        const alert = document.createElement('div');
        alert.className = `copy-message alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alert);
        
        // Auto-dismiss après 3 secondes
        setTimeout(() => {
          alert.remove();
        }, 3000);
      }
      
      trackShare(platform) {
        console.log(`📤 Partage sur ${platform}:`, this.config.url);
        // Ici vous pouvez ajouter Google Analytics ou autre suivi
        // gtag('event', 'share', { method: platform, content_type: this.pageType });
      }
    }

    // Initialisation principale
    document.addEventListener('DOMContentLoaded', async function() {
      console.log('🚀 Initialisation du système intelligent...');
      
      // 1. Gérer le favicon
      const faviconManager = new SmartFavicon();
      await faviconManager.init();
      
      // 2. Configurer le partage
      const shareManager = new SmartShare();
      shareManager.init();
      
      // 3. Ajouter des classes au body selon la page
      if (APP_CONFIG.isMiGbanPage()) {
        document.body.classList.add('mi-gban-theme');
        console.log('🎨 Thème Mi-Gban activé');
      }
      
      // 4. Mobile Navigation (existant)
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
      
      // 5. Navigation active (existant)
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
      
      console.log('✅ Système intelligent initialisé avec succès');
    });

    // Fonction globale pour copier (pour compatibilité)
    window.copyToClipboard = function(text) {
      const shareManager = new SmartShare();
      shareManager.copyToClipboard(text || window.location.href);
    };
  </script>

  @yield('page-scripts')
</body>
</html>