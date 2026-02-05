<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Print & Tech Pro - Infographie, Impression & Services IT</title>
  <meta name="description" content="Print & Tech Pro - Votre partenaire en infographie, impression tout support et services informatiques à Bouaké">
  <meta name="keywords" content="infographie, impression, développement web, services informatiques, Bouaké, Côte d'Ivoire, design graphique, maintenance informatique">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('visiteur/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('visiteur/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('visiteur/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('visiteur/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('visiteur/assets/css/main.css') }}" rel="stylesheet">

  <style>
    :root {
      --primary: #6C63FF;
      --white: #FFFFFF;
      --dark: #2E2E2E;
      --accent: #FF6F3C;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-accent {
      background-color: var(--accent);
      border-color: var(--accent);
      color: white;
    }

    .text-primary {
      color: var(--primary) !important;
    }

    .text-accent {
      color: var(--accent) !important;
    }

    .bg-primary {
      background-color: var(--primary) !important;
    }

    .bg-accent {
      background-color: var(--accent) !important;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Print & Tech Pro</h1><span class="text-accent">.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Accueil</a></li>
          <li><a href="#about">À Propos</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Réalisations</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#" class="btn btn-accent btn-sm ms-2">Espace Client</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
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
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Print & Tech Pro</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Votre partenaire en infographie, impression et services informatiques à Bouaké</p>
            <p class="mt-3"><strong>Téléphone:</strong> <span>+225 07 07 07 07 07</span></p>
            <p><strong>Email:</strong> <span>contact@printtechpro.ci</span></p>
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
            <li><a href="#hero">Accueil</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Réalisations</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Nos Services</h4>
          <ul>
            <li><a href="#">Infographie & Design</a></li>
            <li><a href="#">Impression Tout Support</a></li>
            <li><a href="#">Développement Web</a></li>
            <li><a href="#">Applications Mobiles</a></li>
            <li><a href="#">Maintenance Informatique</a></li>
            <li><a href="#">Formation & Conseil</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-newsletter">
          <h4>Newsletter</h4>
          <p>Restez informé de nos dernières réalisations et offres spéciales!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email" placeholder="Votre email"><input type="submit" value="S'abonner"></div>
            <div class="loading">Chargement</div>
            <div class="error-message"></div>
            <div class="sent-message">Merci pour votre inscription!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Print & Tech Pro</strong> <span>Tous droits réservés</span></p>
      <div class="credits">
        Développé avec ❤️ par <a href="#">Print & Tech Pro</a>
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

</body>

</html>