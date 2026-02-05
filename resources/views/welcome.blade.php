<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NDOUBLE - Solutions Digitales Innovantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a56db;
            --secondary-blue: #3b82f6;
            --accent-orange: #f97316;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-blue);
            text-decoration: none;
        }
        
        .logo span {
            color: var(--accent-orange);
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            transition: color 0.3s;
            position: relative;
        }
        
        .nav-links a:hover {
            color: var(--primary-blue);
        }
        
        .nav-links a:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-orange);
            transition: width 0.3s;
        }
        
        .nav-links a:hover:after {
            width: 100%;
        }
        
        .nav-cta {
            background: var(--primary-blue);
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .nav-cta:hover {
            background: var(--secondary-blue);
            transform: translateY(-2px);
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-dark);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #1e3a8a 100%);
            color: white;
            padding: 160px 0 100px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero h1 span {
            color: var(--accent-orange);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #cbd5e1;
        }
        
        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .btn-primary {
            background: var(--accent-orange);
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: #ea580c;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }
        
        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent-orange);
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Services Section */
        .section {
            padding: 100px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .section-title p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border: 1px solid #e2e8f0;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-blue);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }
        
        .service-icon i {
            font-size: 30px;
            color: white;
        }
        
        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .service-card p {
            color: var(--text-light);
            margin-bottom: 20px;
        }
        
        .service-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s;
        }
        
        .service-link:hover {
            gap: 10px;
        }
        
        /* Portfolio Section */
        .portfolio {
            background: var(--light-bg);
        }
        
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .portfolio-item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .portfolio-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .portfolio-img {
            height: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .portfolio-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .portfolio-content {
            padding: 25px;
        }
        
        .portfolio-tags {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        
        .tag {
            background: #e0f2fe;
            color: var(--primary-blue);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        /* Process Section */
        .process-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .process-steps:before {
            content: '';
            position: absolute;
            top: 30px;
            left: 50px;
            right: 50px;
            height: 2px;
            background: #e2e8f0;
            z-index: 1;
        }
        
        .step {
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: white;
            border: 3px solid var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0 auto 20px;
        }
        
        .step h4 {
            margin-bottom: 10px;
        }
        
        /* Testimonials */
        .testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }
        
        .testimonial {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .client-rating {
            color: #fbbf24;
            margin-bottom: 20px;
        }
        
        .client-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        .client-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-bg) 100%);
            color: white;
            text-align: center;
            padding: 80px 20px;
            border-radius: 15px;
            margin: 50px 0;
        }
        
        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        /* Footer */
        .footer {
            background: var(--dark-bg);
            color: white;
            padding: 80px 0 30px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .footer-logo {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 20px;
            display: block;
        }
        
        .footer-links h4 {
            margin-bottom: 20px;
            color: var(--accent-orange);
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: var(--accent-orange);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.8rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .process-steps {
                flex-direction: column;
                gap: 40px;
            }
            
            .process-steps:before {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .section {
                padding: 70px 0;
            }
            
            .hero-btns {
                flex-direction: column;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">N<span>DOUBLE</span></a>
            
            <div class="nav-links">
                <a href="#accueil">Accueil</a>
                <a href="#services">Services</a>
                <a href="#portfolio">Réalisations</a>
                <a href="#process">Processus</a>
                <a href="#about">À propos</a>
                <a href="#contact">Contact</a>
            </div>
            
            <a href="#contact" class="nav-cta">Demander un devis</a>
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="accueil">
        <div class="container">
            <div class="hero-content animate-fade-in">
                <h1>Transformons vos idées en <span>solutions digitales</span> innovantes</h1>
                <p>NDOUBLE accompagne les entreprises dans leur transformation numérique avec des solutions sur mesure en développement logiciel, communication visuelle et services IT.</p>
                
                <div class="hero-btns">
                    <a href="#portfolio" class="btn-primary delay-100">
                        <i class="fas fa-eye"></i> Voir nos réalisations
                    </a>
                    <a href="#contact" class="btn-secondary delay-200">
                        <i class="fas fa-comment-dots"></i> Discuter de votre projet
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">150+</span>
                        <span class="stat-label">Projets réalisés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label">Clients satisfaits</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5+</span>
                        <span class="stat-label">Années d'expérience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Support technique</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Nos Expertises</h2>
                <p>Des solutions complètes pour tous vos besoins digitaux</p>
            </div>
            
            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card animate-fade-in delay-100">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Développement Logiciel</h3>
                    <p>Applications web et mobiles sur mesure, SaaS, ERP, CRM et solutions métier adaptées à vos besoins spécifiques.</p>
                    <a href="#" class="service-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card animate-fade-in delay-200">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Communication Visuelle</h3>
                    <p>Design graphique, branding, identité visuelle, supports imprimés et marketing digital pour une image impactante.</p>
                    <a href="#" class="service-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card animate-fade-in delay-300">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Formation Informatique</h3>
                    <p>Formations adaptées aux entreprises et particuliers : développement, bureautique, outils collaboratifs et cybersécurité.</p>
                    <a href="#" class="service-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <!-- Service 4 -->
                <div class="service-card animate-fade-in delay-400">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Maintenance IT</h3>
                    <p>Support technique, maintenance préventive et corrective, infogérance et sécurité des systèmes d'information.</p>
                    <a href="#" class="service-link">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section portfolio" id="portfolio">
        <div class="container">
            <div class="section-title">
                <h2>Nos Réalisations</h2>
                <p>Découvrez des projets concrets qui ont transformé nos clients</p>
            </div>
            
            <div class="portfolio-grid">
                <!-- Project 1 -->
                <div class="portfolio-item animate-fade-in">
                    <div class="portfolio-img">
                        <!-- Remplacer par une image réelle -->
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: white; font-size: 1.5rem; font-weight: 700;">
                            ERP Manufacturier
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <div class="portfolio-tags">
                            <span class="tag">Logiciel</span>
                            <span class="tag">ERP</span>
                            <span class="tag">Laravel</span>
                        </div>
                        <h3>Système de gestion intégré pour l'industrie</h3>
                        <p>Développement d'un ERP complet avec gestion de production, stocks, RH et comptabilité.</p>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="portfolio-item animate-fade-in delay-100">
                    <div class="portfolio-img">
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: white; font-size: 1.5rem; font-weight: 700;">
                            Plateforme E-Learning
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <div class="portfolio-tags">
                            <span class="tag">Éducation</span>
                            <span class="tag">React</span>
                            <span class="tag">Node.js</span>
                        </div>
                        <h3>Plateforme de formation en ligne interactive</h3>
                        <p>Solution complète avec cours vidéo, quiz, certifications et suivi des apprenants.</p>
                    </div>
                </div>
                
                <!-- Project 3 -->
                <div class="portfolio-item animate-fade-in delay-200">
                    <div class="portfolio-img">
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: white; font-size: 1.5rem; font-weight: 700;">
                            Application Mobile
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <div class="portfolio-tags">
                            <span class="tag">Mobile</span>
                            <span class="tag">React Native</span>
                            <span class="tag">API</span>
                        </div>
                        <h3>Application de livraison express</h3>
                        <p>Développement d'une application cross-platform avec suivi GPS en temps réel.</p>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 50px;">
                <a href="#" class="btn-primary">
                    <i class="fas fa-folder-open"></i> Voir tous les projets
                </a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section" id="process">
        <div class="container">
            <div class="section-title">
                <h2>Notre Processus</h2>
                <p>Une méthodologie éprouvée pour garantir votre succès</p>
            </div>
            
            <div class="process-steps">
                <!-- Step 1 -->
                <div class="step animate-fade-in">
                    <div class="step-number">1</div>
                    <h4>Analyse & Conception</h4>
                    <p>Étude approfondie de vos besoins et conception de la solution.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="step animate-fade-in delay-100">
                    <div class="step-number">2</div>
                    <h4>Développement</h4>
                    <p>Création itérative avec des livrables réguliers pour validation.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="step animate-fade-in delay-200">
                    <div class="step-number">3</div>
                    <h4>Tests & Validation</h4>
                    <p>Tests rigoureux et validation complète avant déploiement.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="step animate-fade-in delay-300">
                    <div class="step-number">4</div>
                    <h4>Support & Évolution</h4>
                    <p>Accompagnement continu et améliorations constantes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section portfolio">
        <div class="container">
            <div class="section-title">
                <h2>Témoignages Clients</h2>
                <p>Ce que disent nos partenaires de confiance</p>
            </div>
            
            <div class="testimonial-slider">
                <div class="testimonial animate-fade-in">
                    <div class="client-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"NDOUBLE a complètement transformé notre gestion d'entreprise avec leur ERP sur mesure. L'équipe est professionnelle, réactive et extrêmement compétente. Une vraie valeur ajoutée pour notre croissance."</p>
                    
                    <div class="client-info">
                        <div class="client-avatar">MC</div>
                        <div>
                            <h4>Marie-Claire Dubois</h4>
                            <p>Directrice Générale, ManufacturierPlus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section" id="contact">
        <div class="container">
            <div class="cta animate-fade-in">
                <h2>Prêt à transformer votre projet ?</h2>
                <p style="max-width: 600px; margin: 0 auto 30px; color: #cbd5e1;">
                    Discutons de vos besoins et trouvons ensemble la solution digitale parfaite pour votre entreprise.
                </p>
                <a href="#contact-form" class="btn-primary" style="background: var(--accent-orange);">
                    <i class="fas fa-paper-plane"></i> Commencer votre projet
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div>
                    <a href="#" class="footer-logo">N<span>DOUBLE</span></a>
                    <p style="color: #cbd5e1; margin-bottom: 20px;">
                        Solutions digitales innovantes pour votre réussite. Développement logiciel, communication visuelle et services IT.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-links">
                    <h4>Liens Rapides</h4>
                    <ul>
                        <li><a href="#accueil">Accueil</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Réalisations</a></li>
                        <li><a href="#process">Processus</a></li>
                        <li><a href="#about">À propos</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div class="footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Développement Logiciel</a></li>
                        <li><a href="#">Communication Visuelle</a></li>
                        <li><a href="#">Formation Informatique</a></li>
                        <li><a href="#">Maintenance IT</a></li>
                        <li><a href="#">Création de Sites Web</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="footer-links">
                    <h4>Contact</h4>
                    <ul style="color: #cbd5e1;">
                        <li><i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i> Abidjan, Côte d'Ivoire</li>
                        <li><i class="fas fa-phone" style="margin-right: 10px;"></i> +225 XX XX XX XX</li>
                        <li><i class="fas fa-envelope" style="margin-right: 10px;"></i> contact@ndouble.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2024 NDOUBLE. Tous droits réservés. | <a href="#" style="color: var(--accent-orange);">Mentions légales</a> | <a href="#" style="color: var(--accent-orange);">Politique de confidentialité</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '100%';
            navLinks.style.left = '0';
            navLinks.style.right = '0';
            navLinks.style.background = 'white';
            navLinks.style.padding = '20px';
            navLinks.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
        });
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.animate-fade-in').forEach(el => {
            observer.observe(el);
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>
</html>