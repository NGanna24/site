@extends('base.layouts')
@section('content')
  <main class="main">

    <!-- Hero Section Spécialisé Infographie -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{ asset('visiteur/assets/img/hero-carousel/design-hero-1.jpg') }}" alt="Design Graphique Créatif">
          <div class="container">
            <h2>Design Graphique qui Captive</h2>
            <p>Transformez vos idées en visuels percutants. Notre équipe de designers talentueux crée des designs uniques qui renforcent votre identité et attirent votre audience.</p>
            <a href="#portfolio" class="btn-get-started">Voir nos créations</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="{{ asset('visiteur/assets/img/hero-carousel/design-hero-2.jpg') }}" alt="Identité Visuelle Professionnelle">
          <div class="container">
            <h2>Identité Visuelle Mémorable</h2>
            <p>Logo, charte graphique, branding... Nous construisons une identité visuelle cohérente qui vous distingue de la concurrence et fidélise vos clients.</p>
            <a href="#services-details" class="btn-get-started">Découvrir nos services</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="{{ asset('visiteur/assets/img/hero-carousel/design-hero-3.jpg') }}" alt="Design Digital Innovant">
          <div class="container">
            <h2>Créativité Sans Limites</h2>
            <p>De la conception print au design digital, nous repoussons les limites de la créativité pour donner vie à vos projets les plus ambitieux.</p>
            <a href="#contact" class="btn-get-started">Commencer un projet</a>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Section Présentation Infographie -->
    <section id="about-design" class="about section">

      <div class="container">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('visiteur/assets/img/design-about.jpg') }}" alt="Processus de Design Print & Tech Pro">
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">L'Art au Service de Votre Communication</h2>
            <div class="our-story">
              <h4>Design Graphique d'Excellence</h4>
              <h3>Notre Philosophie Créative</h3>
              <p>Chez Print & Tech Pro, nous croyons que le design graphique est bien plus qu'une simple esthétique. C'est un langage visuel qui raconte votre histoire, véhicule vos valeurs et crée une connexion émotionnelle avec votre audience.</p>
              <ul>
                <li><i class="bi bi-check-circle text-primary"></i> <span>Approche stratégique centrée sur vos objectifs business</span></li>
                <li><i class="bi bi-check-circle text-primary"></i> <span>Processus créatif collaboratif et itératif</span></li>
                <li><i class="bi bi-check-circle text-primary"></i> <span>Respect des délais et budget convenus</span></li>
                <li><i class="bi bi-check-circle text-primary"></i> <span>Adaptation à votre public cible et secteur d'activité</span></li>
              </ul>
              <p>Notre équipe combine expertise technique et sens artistique pour créer des designs qui non seulement plaisent à l'œil mais génèrent aussi des résultats concrets.</p>

              <div class="stats row mt-4">
                <div class="col-6">
                  <span class="purecounter">85</span>
                  <p>Projets Design</p>
                </div>
                <div class="col-6">
                  <span class="purecounter">42</span>
                  <p>Identités Créées</p>
                </div>
                <div class="col-6">
                  <span class="purecounter">100</span>
                  <p>% Satisfaction Client</p>
                </div>
                <div class="col-6">
                  <span class="purecounter">24</span>
                  <p>Heures Délai Moyen</p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Design Section -->

    <!-- Section Détails Services Infographie -->
    <section id="services-details" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Nos Expertises en Design Graphique</h2>
        <p>Une gamme complète de services créatifs pour tous vos besoins visuels</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <i class="bi bi-brush"></i>
              </div>
              <h3>Création de Logo</h3>
              <p>Design de logos uniques et mémorables qui représentent parfaitement votre marque et ses valeurs.</p>
              <ul class="service-features">
                <li>3 concepts initiaux</li>
                <li>Variations couleur & noir/blanc</li>
                <li>Guide d'utilisation</li>
                <li>Fichiers vectoriels</li>
              </ul>
              <div class="service-price">
                <span>À partir de 50,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <i class="bi bi-palette2"></i>
              </div>
              <h3>Charte Graphique</h3>
              <p>Identité visuelle complète avec guidelines détaillées pour une cohérence parfaite sur tous supports.</p>
              <ul class="service-features">
                <li>Logo & déclinaisons</li>
                <li>Typographie & couleurs</li>
                <li>Éléments graphiques</li>
                <li>Guide d'application</li>
              </ul>
              <div class="service-price">
                <span>À partir de 150,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <i class="bi bi-file-earmark-image"></i>
              </div>
              <h3>Design Print</h3>
              <p>Création de supports print percutants : flyers, affiches, dépliants, catalogues et bien plus.</p>
              <ul class="service-features">
                <li>Flyers & affiches</li>
                <li>Cartes de visite</li>
                <li>Dépliants & brochures</li>
                <li>Catalogues produits</li>
              </ul>
              <div class="service-price">
                <span>À partir de 25,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <i class="bi bi-phone"></i>
              </div>
              <h3>Design Digital</h3>
              <p>Interfaces utilisateur attractives pour sites web, applications mobiles et réseaux sociaux.</p>
              <ul class="service-features">
                <li>Maquettes site web</li>
                <li>Interface application mobile</li>
                <li>Bannières réseaux sociaux</li>
                <li>Email templates</li>
              </ul>
              <div class="service-price">
                <span>À partir de 75,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <div class="icon">
                <i class="bi bi-box"></i>
              </div>
              <h3>Packaging</h3>
              <p>Design d'emballages produits qui attirent l'attention et renforcent l'expérience client.</p>
              <ul class="service-features">
                <li>Études de marché</li>
                <li>Concepts créatifs</li>
                <li>Maquettes 3D</li>
                <li>Fichiers print-ready</li>
              </ul>
              <div class="service-price">
                <span>À partir de 100,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <div class="icon">
                <i class="bi bi-infinity"></i>
              </div>
              <h3>Design Éditorial</h3>
              <p>Mise en page professionnelle pour magazines, livres, rapports annuels et publications.</p>
              <ul class="service-features">
                <li>Magazines & journaux</li>
                <li>Livres & eBooks</li>
                <li>Rapports annuels</li>
                <li>Présentations corporate</li>
              </ul>
              <div class="service-price">
                <span>À partir de 60,000 FCFA</span>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Details Section -->

    <!-- Section Processus de Travail -->
    <section id="process" class="process section bg-light">

      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Notre Processus Créatif</h2>
          <p>Une méthodologie éprouvée pour des résultats exceptionnels</p>
        </div>

        <div class="row gy-5">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="process-step text-center">
              <div class="step-number">1</div>
              <div class="step-icon">
                <i class="bi bi-chat-dots"></i>
              </div>
              <h4>Brief & Analyse</h4>
              <p>Échange approfondi pour comprendre vos besoins, objectifs et contraintes</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="process-step text-center">
              <div class="step-number">2</div>
              <div class="step-icon">
                <i class="bi bi-lightbulb"></i>
              </div>
              <h4>Conception & Esquisses</h4>
              <p>Création de concepts créatifs et présentation des premières propositions</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="process-step text-center">
              <div class="step-number">3</div>
              <div class="step-icon">
                <i class="bi bi-pencil"></i>
              </div>
              <h4>Révision & Affinage</h4>
              <p>Intégration de vos feedbacks et perfectionnement du design choisi</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="process-step text-center">
              <div class="step-number">4</div>
              <div class="step-icon">
                <i class="bi bi-check-circle"></i>
              </div>
              <h4>Livraison & Support</h4>
              <p>Remise des fichiers finaux et support pour leur utilisation optimale</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Process Section -->

    <!-- Section Portfolio Design -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Nos Créations Design</h2>
        <p>Découvrez une sélection de nos réalisations en design graphique</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Tous</li>
            <li data-filter=".filter-logo">Logos</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-print">Print</li>
            <li data-filter=".filter-digital">Digital</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-logo">
              <img src="{{ asset('visiteur/assets/img/portfolio/logo-restaurant.jpg') }}" class="img-fluid" alt="Logo Restaurant">
              <div class="portfolio-info">
                <h4>Logo Gastronomique</h4>
                <p>Restaurant Le Bon Goût</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/logo-restaurant.jpg') }}" title="Logo Restaurant" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('visiteur/assets/img/portfolio/charte-graphique.jpg') }}" class="img-fluid" alt="Charte Graphique">
              <div class="portfolio-info">
                <h4>Identité Corporate</h4>
                <p>SARL Tech Solutions</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/charte-graphique.jpg') }}" title="Charte Graphique" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-print">
              <img src="{{ asset('visiteur/assets/img/portfolio/flyer-event.jpg') }}" class="img-fluid" alt="Flyer Événement">
              <div class="portfolio-info">
                <h4>Campagne Événementielle</h4>
                <p>Flyers & Affiches</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/flyer-event.jpg') }}" title="Flyer Événement" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-digital">
              <img src="{{ asset('visiteur/assets/img/portfolio/maquette-site.jpg') }}" class="img-fluid" alt="Maquette Site Web">
              <div class="portfolio-info">
                <h4>Design d'Interface</h4>
                <p>Site E-commerce Mode</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/maquette-site.jpg') }}" title="Maquette Site Web" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-logo">
              <img src="{{ asset('visiteur/assets/img/portfolio/logo-fashion.jpg') }}" class="img-fluid" alt="Logo Mode">
              <div class="portfolio-info">
                <h4>Logo Prêt-à-Porter</h4>
                <p>Boutique Mode Elegance</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/logo-fashion.jpg') }}" title="Logo Mode" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-print">
              <img src="{{ asset('visiteur/assets/img/portfolio/carte-visite.jpg') }}" class="img-fluid" alt="Cartes de Visite">
              <div class="portfolio-info">
                <h4>Cartes Professionnelles</h4>
                <p>Design Luxe & Moderne</p>
                <a href="{{ asset('visiteur/assets/img/portfolio/carte-visite.jpg') }}" title="Cartes de Visite" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Section CTA Design -->
    <section id="cta-design" class="cta-design section dark-background">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 data-aos="fade-up">Prêt à Donner Vie à Votre Projet Design ?</h2>
            <p data-aos="fade-up" data-aos-delay="100" class="mb-4">
              Contactez-nous pour une consultation gratuite et découvrez comment nous pouvons transformer vos idées en designs exceptionnels.
            </p>
            <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
              <a href="#contact" class="btn-get-started me-3">Demander un Devis</a>
              <a href="tel:+2250707070707" class="btn btn-outline-light">
                <i class="bi bi-telephone me-2"></i>Nous Appeler
              </a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /CTA Design Section -->

    <!-- Section Contact -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Parlons de Votre Projet Design</h2>
        <p>Remplissez le formulaire ci-dessous pour obtenir un devis personnalisé</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Adresse</h3>
                <p>Bouaké, Côte d'Ivoire</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Appelez-nous</h3>
                <p>+225 07 07 07 07 07</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>design@printtechpro.ci</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Horaires Design</h3>
                <p>Lun - Ven: 8H00 - 18H00<br>Réponse sous 24h</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-6">
            <form action="forms/contact-design.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Votre email" required>
                </div>

                <div class="col-md-12">
                  <select class="form-control" name="service" required>
                    <option value="">Type de service design souhaité</option>
                    <option value="logo">Création de Logo</option>
                    <option value="branding">Charte Graphique</option>
                    <option value="print">Design Print</option>
                    <option value="digital">Design Digital</option>
                    <option value="packaging">Packaging</option>
                    <option value="editorial">Design Éditorial</option>
                    <option value="autre">Autre</option>
                  </select>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Décrivez votre projet en détail (secteur d'activité, objectifs, contraintes, délais souhaités...)" required></textarea>
                </div>

                <div class="col-md-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="budget">
                    <label class="form-check-label" for="budget">
                      J'ai un budget défini pour ce projet
                    </label>
                  </div>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Chargement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre demande a été envoyée. Nous vous recontacterons sous 24h!</div>

                  <button type="submit" class="btn btn-accent">Obtenir un Devis Design</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <style>
    .service-features {
      list-style: none;
      padding: 0;
      margin: 15px 0;
    }
    
    .service-features li {
      padding: 5px 0;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .service-features li:last-child {
      border-bottom: none;
    }
    
    .service-price {
      margin-top: 15px;
      padding-top: 15px;
      border-top: 2px solid var(--primary);
      font-weight: bold;
      color: var(--primary);
    }
    
    .process-step {
      padding: 30px 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .process-step:hover {
      transform: translateY(-5px);
    }
    
    .step-number {
      width: 40px;
      height: 40px;
      background: var(--primary);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      margin: 0 auto 15px;
    }
    
    .step-icon {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 15px;
    }
    
    .cta-design {
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      padding: 80px 0;
      text-align: center;
    }
  </style>
@endsection