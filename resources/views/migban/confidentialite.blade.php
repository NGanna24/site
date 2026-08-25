<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Politique de confidentialité de Mi-Gban - Application de mise en relation immobilière. Découvrez comment vos données personnelles sont collectées, utilisées et protégées.">
    <meta name="keywords" content="politique de confidentialité, Mi-Gban, données personnelles, immobilier, protection des données, RGPD">
    <title>Politique de Confidentialité - Mi-Gban</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
            color: #1f2937;
            line-height: 1.7;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        .header {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 2px solid #f1f5f9;
            margin-bottom: 30px;
        }
        .header a img {
            width: 200px;
        

        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            text-decoration: none;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #0808c0, #1525b9);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            color: #fff;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 800;
            color: #1f2937;
            letter-spacing: -0.5px;
        }

        .logo-text span {
            color: #2C5745;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .header .last-update {
            color: #6b7280;
            font-size: 15px;
            font-weight: 500;
            background: #f1f5f9;
            display: inline-block;
            padding: 4px 16px;
            border-radius: 20px;
        }

        .toc {
            background: #f8fafc;
            padding: 24px 30px;
            border-radius: 14px;
            margin-bottom: 40px;
            border: 1px solid #e5e7eb;
        }

        .toc h2 {
            font-size: 16px;
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .toc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 4px 20px;
        }

        .toc a {
            color: #2C5745;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            padding: 2px 0;
            transition: color 0.2s;
        }

        .toc a:hover {
            color: #cc6a00;
            text-decoration: underline;
        }

        .section {
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 1px solid #f1f5f9;
        }

        .section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section h2 .badge {
            font-size: 12px;
            font-weight: 600;
            background: #2C5745;
            color: #fff;
            padding: 2px 12px;
            border-radius: 20px;
            margin-left: 8px;
        }

        .section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .section h4 {
            font-size: 16px;
            font-weight: 600;
            color: #4b5563;
            margin-top: 16px;
            margin-bottom: 8px;
        }

        .section p {
            color: #4b5563;
            margin-bottom: 12px;
        }

        .section ul, .section ol {
            margin: 8px 0 16px 24px;
            color: #4b5563;
        }

        .section ul li, .section ol li {
            margin-bottom: 6px;
        }

        .highlight-box {
            background: #EB7D00;
            padding: 16px 20px;
            border-radius: 8px;
            margin: 16px 0;
        }

        .highlight-box p {
            margin-bottom: 0;
            color: #ffffff;
        }

        .contact-card {
            background: #f1f5f9;
            padding: 20px 24px;
            border-radius: 12px;
            margin-top: 16px;
        }

        .contact-card p {
            margin-bottom: 4px;
            color: #374151;
        }

        .contact-card strong {
            color: #1f2937;
        }

        .footer {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 2px solid #f1f5f9;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }

        .footer a {
            color: #2C5745;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 24px 20px;
                border-radius: 12px;
            }

            .header h1 {
                font-size: 24px;
            }

            .logo-text {
                font-size: 22px;
            }

            .section h2 {
                font-size: 19px;
            }

            .toc-grid {
                grid-template-columns: 1fr 1fr;
            }

            .toc {
                padding: 16px 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 16px;
            }

            .toc-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 20px;
            }

            .logo-text {
                font-size: 18px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .section h2 {
                font-size: 17px;
            }

            .section ul, .section ol {
                margin-left: 16px;
            }
        }

        /* Print styles */
        @media print {
            body {
                background: #fff;
                padding: 0;
            }

            .container {
                box-shadow: none;
                padding: 40px;
                border-radius: 0;
            }

            .toc {
                break-inside: avoid;
            }

            .section {
                break-inside: avoid;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('visiteur/assets/img/LogoMi-gban2.png') }}" alt="Mi-Gban" class="logo-image" >
            </a>
            <h1>Politique de Confidentialité</h1>
            <span class="last-update">Dernière mise à jour : 25 août 2026</span>
        </div>

        <!-- Table des matières -->
        <div class="toc">
            <h2> Sommaire</h2>
            <div class="toc-grid">
                <a href="#intro">1. Introduction</a>
                <a href="#responsable">2. Responsable du traitement</a>
                <a href="#donnees">3. Données collectées</a>
                <a href="#telephone">4. Numéro de téléphone</a>
                <a href="#localisation">5. Données de localisation</a>
                <a href="#professionnels">6. Données professionnelles</a>
                <a href="#documents">7. Documents d'identité</a>
                <a href="#camera">8. Appareil photo</a>
                <a href="#photos">9. Photos et galerie</a>
                <a href="#notifications">10. Notifications</a>
                <a href="#audio">11. Audio et microphone</a>
                <a href="#proprietes">12. Données immobilières</a>
                <a href="#demandes">13. Demandes et réservations</a>
                <a href="#finalites">14. Utilisation des données</a>
                <a href="#partage">15. Partage des données</a>
                <a href="#securite">16. Sécurité des données</a>
                <a href="#conservation">17. Conservation des données</a>
                <a href="#suppression">18. Suppression du compte</a>
                <a href="#droits">19. Droits des utilisateurs</a>
                <a href="#mineurs">20. Données des mineurs</a>
                <a href="#tiers">21. Services tiers</a>
                <a href="#autorisations">22. Autorisations</a>
                <a href="#modifications">23. Modifications</a>
                <a href="#contact">24. Contact</a>
                <a href="#acceptation">25. Acceptation</a>
            </div>
        </div>

        <!-- Section 1 -->
        <div class="section" id="intro">
            <h2>1. Introduction</h2>
            <p>Bienvenue sur <strong>Mi-Gban</strong>, une application dédiée à la recherche, à la consultation et à la mise en relation dans le domaine immobilier.</p>
            <p>Mi-Gban permet notamment aux utilisateurs de consulter des propriétés immobilières, de rechercher des biens selon leur localisation et leurs caractéristiques, de contacter des propriétaires ou des agents immobiliers et, selon leur profil, de soumettre une demande afin de devenir propriétaire, agent immobilier ou gestionnaire sur la plateforme.</p>
            <p>La présente Politique de confidentialité explique quelles données personnelles nous pouvons collecter, pourquoi nous les collectons, comment elles sont utilisées, avec qui elles peuvent être partagées et quels sont les droits des utilisateurs.</p>
            <div class="highlight-box">
                <p><strong> En utilisant Mi-Gban, vous reconnaissez avoir pris connaissance de la présente Politique de confidentialité.</strong></p>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="section" id="responsable">
            <h2>2. Responsable du traitement</h2>
            <p>Le responsable du traitement des données collectées dans le cadre de l'utilisation de Mi-Gban est :</p>
            <div class="contact-card">
                <p><strong>Nom de l'éditeur :</strong> Koné N'ganna Mondésir</p>
                <p><strong>Nom commercial :</strong> Mi-Gban</p>
                <p><strong>Adresse :</strong> Bouaké, Air France 3</p>
                <p><strong>E-mail :</strong> ndouble024@gmail.com</p>
                <p><strong>Téléphone :</strong> +225 07 12 56 69 56</p>
            </div>
            <p>Pour toute question relative à la protection de vos données personnelles, vous pouvez nous contacter aux coordonnées indiquées ci-dessus.</p>
        </div>

        <!-- Section 3 -->
        <div class="section" id="donnees">
            <h2>3. Données personnelles que nous collectons</h2>
            <p>Selon votre utilisation de Mi-Gban, nous pouvons collecter différentes catégories de données personnelles.</p>

            <h3>3.1. Données nécessaires à la création du compte</h3>
            <p>Lorsqu'un utilisateur crée un compte Mi-Gban, nous pouvons collecter :</p>
            <ul>
                <li>Nom</li>
                <li>Prénom</li>
                <li>Adresse e-mail</li>
                <li>Numéro de téléphone</li>
                <li>Mot de passe</li>
            </ul>
            <p>Ces informations permettent notamment de :</p>
            <ul>
                <li>créer et gérer le compte utilisateur ;</li>
                <li>permettre à l'utilisateur de se connecter à son compte ;</li>
                <li>personnaliser son expérience ;</li>
                <li>communiquer avec l'utilisateur lorsque cela est nécessaire ;</li>
                <li>permettre certaines fonctionnalités de la plateforme.</li>
            </ul>
            <div class="highlight-box">
                <p><strong>Sécurité :</strong> Le mot de passe est destiné à l'authentification de l'utilisateur. Il est stocké de manière sécurisée et n'est pas accessible en clair.</p>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="section" id="telephone">
            <h2>4. Numéro de téléphone</h2>
            <p>Le numéro de téléphone peut être utilisé afin de permettre la mise en relation entre les utilisateurs et les professionnels ou propriétaires présents sur Mi-Gban.</p>
            <p>Par exemple, lorsqu'un utilisateur manifeste un intérêt pour une propriété, le numéro de téléphone peut permettre à un agent immobilier, un propriétaire ou un administrateur de prendre contact avec lui lorsque cela est nécessaire au fonctionnement du service.</p>
            <p>Le numéro de téléphone peut également être utilisé pour la gestion du compte et pour certaines communications relatives aux services proposés par Mi-Gban.</p>
        </div>

        <!-- Section 5 -->
        <div class="section" id="localisation">
            <h2>5. Données de localisation</h2>
            <p>Mi-Gban peut demander l'accès à la localisation géographique de l'utilisateur lorsque cette fonctionnalité est nécessaire.</p>
            <p>La localisation peut être utilisée notamment pour :</p>
            <ul>
                <li>afficher des propriétés situées à proximité de l'utilisateur ;</li>
                <li>permettre à l'utilisateur de rechercher des propriétés selon une zone géographique ;</li>
                <li>afficher ou déterminer la localisation approximative d'une propriété ;</li>
                <li>améliorer et personnaliser l'expérience utilisateur ;</li>
                <li>proposer des biens correspondant à la localité recherchée.</li>
            </ul>
            <p>La localisation n'est pas utilisée à d'autres fins incompatibles avec celles décrites dans la présente politique.</p>
            <p>Lorsque cela est techniquement possible, Mi-Gban privilégie l'utilisation d'une localisation approximative plutôt qu'une localisation plus précise lorsque la précision n'est pas nécessaire au fonctionnement de la fonctionnalité.</p>
        </div>

        <!-- Section 6 -->
        <div class="section" id="professionnels">
            <h2>6. Données relatives aux professionnels et aux demandes de vérification</h2>
            <p>Les utilisateurs souhaitant exercer certaines fonctions sur Mi-Gban, notamment en tant qu'agent immobilier, propriétaire ou gestionnaire, peuvent être invités à fournir des informations supplémentaires afin de permettre la vérification de leur profil.</p>
            <p>Ces informations peuvent notamment comprendre :</p>
            <ul>
                <li>type de pièce d'identité ;</li>
                <li>numéro de pièce d'identité ;</li>
                <li>numéro de carte professionnelle ;</li>
                <li>nom de l'agence ;</li>
                <li>Identifiant Unique (IDU) ou informations liées à l'enregistrement professionnel ;</li>
                <li>adresse professionnelle ;</li>
                <li>nombre d'années d'expérience ;</li>
                <li>site internet professionnel, lorsqu'il existe ;</li>
                <li>types de biens proposés ou gérés ;</li>
                <li>zones géographiques couvertes ;</li>
                <li>photographies ou copies de documents justificatifs ;</li>
                <li>photographies ou autres éléments nécessaires à la vérification de l'activité.</li>
            </ul>
            <p>Ces informations sont utilisées principalement afin de :</p>
            <ul>
                <li>vérifier l'identité et les informations déclarées ;</li>
                <li>vérifier la légitimité ou l'activité professionnelle déclarée ;</li>
                <li>évaluer les demandes d'inscription comme agent immobilier, propriétaire ou gestionnaire ;</li>
                <li>lutter contre les fraudes, les fausses identités et les annonces frauduleuses ;</li>
                <li>améliorer la confiance et la sécurité des utilisateurs de Mi-Gban ;</li>
                <li>permettre aux administrateurs de traiter et de valider les demandes.</li>
            </ul>
            <div class="highlight-box">
                <p><strong>Données sensibles :</strong> Certaines de ces données peuvent être particulièrement sensibles en raison de leur nature. Elles sont traitées uniquement lorsque cela est nécessaire à la vérification et à la sécurité de la plateforme.</p>
            </div>
        </div>

        <!-- Section 7 -->
        <div class="section" id="documents">
            <h2>7. Documents d'identité et justificatifs</h2>
            <p>Lorsqu'un utilisateur soumet une demande de vérification, Mi-Gban peut lui demander de fournir des images ou copies de documents justificatifs.</p>
            <p>Ces documents peuvent notamment être utilisés pour vérifier :</p>
            <ul>
                <li>l'identité de la personne ;</li>
                <li>l'existence d'une activité professionnelle ;</li>
                <li>les informations relatives à une agence ;</li>
                <li>la légitimité d'un professionnel ;</li>
                <li>la conformité des informations communiquées lors de l'inscription.</li>
            </ul>
            <p>Ces documents sont accessibles uniquement aux personnes autorisées à effectuer les opérations de vérification et d'administration nécessaires au fonctionnement de Mi-Gban.</p>
            <p>Mi-Gban met en œuvre des mesures raisonnables destinées à empêcher tout accès non autorisé, toute modification, perte ou divulgation injustifiée de ces documents.</p>
        </div>

        <!-- Section 8 -->
        <div class="section" id="camera">
            <h2>8. Appareil photo et caméra</h2>
            <p>Mi-Gban peut demander l'autorisation d'accéder à la caméra de l'appareil.</p>
            <p>Cet accès est utilisé uniquement lorsque l'utilisateur souhaite utiliser une fonctionnalité nécessitant la prise d'une image ou d'une vidéo.</p>
            <p>Par exemple :</p>
            <ul>
                <li>ajouter ou modifier une photo de profil ;</li>
                <li>photographier un document justificatif ;</li>
                <li>prendre des photos d'une propriété ;</li>
                <li>enregistrer une vidéo d'une propriété ;</li>
                <li>ajouter des médias à une annonce immobilière.</li>
            </ul>
            <p>Mi-Gban ne doit accéder à la caméra que lorsque l'utilisateur utilise une fonctionnalité nécessitant cette autorisation.</p>
        </div>

        <!-- Section 9 -->
        <div class="section" id="photos">
            <h2>9. Photos et galerie de l'appareil</h2>
            <p>Mi-Gban peut demander l'autorisation d'accéder aux photos ou médias sélectionnés sur l'appareil de l'utilisateur.</p>
            <p>Cette autorisation permet notamment à l'utilisateur :</p>
            <ul>
                <li>de choisir une photo de profil ;</li>
                <li>d'ajouter des photos à une propriété ;</li>
                <li>d'ajouter des vidéos à une annonce ;</li>
                <li>de sélectionner des documents nécessaires à une demande de vérification.</li>
            </ul>
            <p>Mi-Gban n'a pas vocation à accéder à l'ensemble des photos personnelles de l'utilisateur lorsque seules certaines images sont nécessaires à une fonctionnalité.</p>
        </div>

        <!-- Section 10 -->
        <div class="section" id="notifications">
            <h2>10. Notifications</h2>
            <p>Mi-Gban peut envoyer des notifications afin d'informer les utilisateurs de certains événements liés à leur compte ou aux services utilisés.</p>
            <p>Les notifications peuvent notamment concerner :</p>
            <ul>
                <li>une nouvelle demande ;</li>
                <li>une réservation ;</li>
                <li>la modification du statut d'une réservation ;</li>
                <li>une réponse d'un professionnel ;</li>
                <li>une demande de visite ;</li>
                <li>une validation ou un refus de demande ;</li>
                <li>des informations importantes relatives au compte ;</li>
                <li>des informations relatives à une propriété ou à une transaction initiée par l'utilisateur.</li>
            </ul>
            <p>Pour permettre l'envoi de notifications push, Mi-Gban peut utiliser un identifiant technique ou un token de notification associé à l'appareil.</p>
            <p>Ce token permet au service de notification d'identifier l'appareil ou l'installation de l'application auquel une notification doit être envoyée.</p>
            <p>Le token de notification n'est pas utilisé pour connaître la position physique de l'utilisateur.</p>
        </div>

        <!-- Section 11 -->
        <div class="section" id="audio">
            <h2>11. Audio et microphone</h2>
            <p>Mi-Gban peut proposer des contenus vidéo contenant du son.</p>
            <p>La lecture du son d'une vidéo ou d'une notification ne nécessite pas nécessairement l'accès au microphone de l'appareil.</p>
            <p>Lorsque Mi-Gban ne propose pas de fonctionnalité nécessitant l'enregistrement audio, l'application n'a pas vocation à utiliser le microphone de l'appareil pour collecter des données personnelles.</p>
            <p>Si une fonctionnalité nécessitant effectivement l'utilisation du microphone est ajoutée ultérieurement, cette politique pourra être mise à jour afin d'expliquer clairement cette utilisation et l'autorisation correspondante sera demandée à l'utilisateur lorsque cela est nécessaire.</p>
        </div>

        <!-- Section 12 -->
        <div class="section" id="proprietes">
            <h2>12. Données relatives aux propriétés immobilières</h2>
            <p>Lorsqu'un utilisateur publie ou gère une propriété, Mi-Gban peut collecter et afficher des informations relatives au bien, telles que :</p>
            <ul>
                <li>titre de l'annonce ;</li>
                <li>description ;</li>
                <li>prix ;</li>
                <li>type de propriété ;</li>
                <li>caractéristiques du bien ;</li>
                <li>localisation ;</li>
                <li>photos ;</li>
                <li>vidéos ;</li>
                <li>informations sur le propriétaire ou l'agent immobilier ;</li>
                <li>coordonnées nécessaires à la mise en relation ;</li>
                <li>autres informations fournies volontairement par l'utilisateur.</li>
            </ul>
            <p>Ces informations sont utilisées pour permettre la publication, la recherche et la consultation des propriétés sur la plateforme.</p>
        </div>

        <!-- Section 13 -->
        <div class="section" id="demandes">
            <h2>13. Données relatives aux demandes et réservations</h2>
            <p>Lorsque l'utilisateur utilise les fonctionnalités de demande de visite ou de réservation, Mi-Gban peut traiter les informations nécessaires à la gestion de ces opérations.</p>
            <p>Cela peut comprendre :</p>
            <ul>
                <li>identité de l'utilisateur ;</li>
                <li>coordonnées ;</li>
                <li>propriété concernée ;</li>
                <li>date et heure demandées ;</li>
                <li>informations relatives à la demande ;</li>
                <li>statut de la demande ou de la réservation ;</li>
                <li>communications nécessaires au traitement de la demande.</li>
            </ul>
            <p>Ces informations permettent notamment de mettre en relation le client avec le propriétaire ou le professionnel concerné et de gérer le suivi de la demande.</p>
        </div>

        <!-- Section 14 -->
        <div class="section" id="finalites">
            <h2>14. Pourquoi utilisons-nous vos données ?</h2>
            <p>Les données personnelles collectées peuvent être utilisées pour :</p>
            <ol>
                <li>créer et gérer votre compte ;</li>
                <li>vous authentifier ;</li>
                <li>personnaliser votre expérience ;</li>
                <li>vous proposer des propriétés correspondant à votre localisation ou à vos recherches ;</li>
                <li>permettre la publication et la consultation d'annonces ;</li>
                <li>faciliter la mise en relation entre clients, propriétaires et professionnels ;</li>
                <li>gérer les demandes de visite et les réservations ;</li>
                <li>vérifier l'identité et les informations professionnelles des utilisateurs concernés ;</li>
                <li>prévenir les fraudes et les activités abusives ;</li>
                <li>sécuriser la plateforme ;</li>
                <li>envoyer des notifications importantes ;</li>
                <li>améliorer les fonctionnalités et la qualité du service ;</li>
                <li>répondre aux demandes des utilisateurs ;</li>
                <li>respecter les obligations légales applicables.</li>
            </ol>
        </div>

        <!-- Section 15 -->
        <div class="section" id="partage">
            <h2>15. Avec qui vos données peuvent-elles être partagées ?</h2>
            <p><strong>Mi-Gban ne vend pas les données personnelles de ses utilisateurs à des tiers.</strong></p>
            <p>Certaines informations peuvent néanmoins être communiquées à d'autres utilisateurs lorsque cela est nécessaire au fonctionnement de la plateforme.</p>
            <p>Par exemple, certaines coordonnées ou informations de contact peuvent être communiquées à un propriétaire ou à un agent immobilier lorsqu'un client souhaite obtenir des informations ou entrer en contact concernant une propriété.</p>
            <p>Les données peuvent également être accessibles à des personnes autorisées à administrer et sécuriser la plateforme, dans la mesure nécessaire à leurs fonctions.</p>
            <p>Mi-Gban peut également faire appel à des prestataires techniques nécessaires au fonctionnement de ses services, notamment pour :</p>
            <ul>
                <li>l'hébergement ;</li>
                <li>le stockage sécurisé ;</li>
                <li>l'envoi de notifications ;</li>
                <li>l'infrastructure technique ;</li>
                <li>la sécurité ;</li>
                <li>l'analyse technique et la maintenance.</li>
            </ul>
            <p>Ces prestataires ne doivent utiliser les données que dans le cadre des services qu'ils fournissent à Mi-Gban et conformément aux obligations qui leur sont applicables.</p>
        </div>

        <!-- Section 16 -->
        <div class="section" id="securite">
            <h2>16. Sécurité des données</h2>
            <p>Mi-Gban prend des mesures techniques et organisationnelles raisonnables afin de protéger les données personnelles contre :</p>
            <ul>
                <li>les accès non autorisés ;</li>
                <li>la perte ;</li>
                <li>la destruction ;</li>
                <li>la modification non autorisée ;</li>
                <li>la divulgation injustifiée ;</li>
                <li>les utilisations abusives.</li>
            </ul>
            <div class="highlight-box">
                <p><strong>Les mots de passe sont protégés à l'aide de mécanismes de stockage sécurisés et ne sont pas conservés en clair.</strong></p>
            </div>
            <p>Cependant, aucun système informatique ou service accessible sur Internet ne peut garantir une sécurité absolue.</p>
        </div>

        <!-- Section 17 -->
        <div class="section" id="conservation">
            <h2>17. Conservation des données</h2>
            <p>Mi-Gban conserve les données personnelles pendant la durée nécessaire aux finalités pour lesquelles elles ont été collectées.</p>
            <p>La durée de conservation peut notamment dépendre :</p>
            <ul>
                <li>de la durée d'utilisation du compte ;</li>
                <li>de la nécessité de fournir le service ;</li>
                <li>des demandes ou réservations effectuées ;</li>
                <li>des obligations légales ;</li>
                <li>des besoins de sécurité et de prévention des fraudes ;</li>
                <li>du traitement d'une demande de vérification professionnelle.</li>
            </ul>
            <p>Les documents d'identité et justificatifs professionnels ne doivent pas être conservés plus longtemps que nécessaire à leur finalité de vérification, sous réserve des obligations légales applicables.</p>
        </div>

        <!-- Section 18 -->
        <div class="section" id="suppression">
            <h2>18. Suppression du compte et des données</h2>
            <p>L'utilisateur peut demander la suppression de son compte Mi-Gban et, lorsque cela est légalement possible, la suppression des données personnelles qui lui sont associées.</p>
            <p>Certaines données peuvent toutefois être conservées pendant une durée limitée lorsque leur conservation est nécessaire pour :</p>
            <ul>
                <li>respecter une obligation légale ;</li>
                <li>résoudre un litige ;</li>
                <li>prévenir une fraude ;</li>
                <li>assurer la sécurité de la plateforme ;</li>
                <li>respecter une obligation contractuelle ou réglementaire.</li>
            </ul>
            <p>Lorsqu'une donnée n'est plus nécessaire et qu'aucune obligation ne justifie sa conservation, elle peut être supprimée ou anonymisée.</p>
        </div>

        <!-- Section 19 -->
        <div class="section" id="droits">
            <h2>19. Droits des utilisateurs</h2>
            <p>Selon la législation applicable, les utilisateurs peuvent disposer de plusieurs droits concernant leurs données personnelles, notamment :</p>
            <ul>
                <li><strong>droit d'accès</strong> à leurs données ;</li>
                <li><strong>droit de rectification</strong> des données incorrectes ;</li>
                <li><strong>droit de demander la suppression</strong> de certaines données ;</li>
                <li><strong>droit de demander la limitation</strong> de certains traitements ;</li>
                <li><strong>droit de s'opposer</strong> à certains traitements lorsque la législation le permet ;</li>
                <li><strong>droit de retirer un consentement</strong> lorsque le traitement repose sur celui-ci ;</li>
                <li><strong>droit de demander des informations</strong> sur l'utilisation de leurs données.</li>
            </ul>
            <p>Pour exercer vos droits, vous pouvez contacter Mi-Gban à l'adresse suivante :</p>
            <div class="contact-card">
                <p><strong>E-mail :</strong> ndouble024@gmail.com</p>
            </div>
            <p>Nous pouvons demander certaines informations afin de vérifier l'identité de la personne à l'origine de la demande.</p>
        </div>

        <!-- Section 20 -->
        <div class="section" id="mineurs">
            <h2>20. Données des mineurs</h2>
            <p>Mi-Gban n'est pas destiné à collecter volontairement des données personnelles de personnes qui ne sont pas autorisées à utiliser le service selon la législation applicable.</p>
            <p>Si nous découvrons qu'une donnée personnelle a été collectée auprès d'un mineur sans l'autorisation requise, nous prendrons les mesures raisonnables nécessaires pour traiter cette situation conformément à la législation applicable.</p>
        </div>

        <!-- Section 21 -->
        <div class="section" id="tiers">
            <h2>21. Services et technologies tiers</h2>
            <p>Mi-Gban peut utiliser des services techniques tiers nécessaires au fonctionnement de l'application, notamment pour l'hébergement, les notifications push, le stockage, la sécurité ou d'autres fonctionnalités techniques.</p>
            <p>Ces services peuvent traiter certaines informations techniques nécessaires à leur fonctionnement.</p>
            <p>Mi-Gban veille à utiliser ces services dans le respect des exigences applicables en matière de protection des données.</p>
            <p>La liste des services tiers effectivement utilisés par Mi-Gban peut évoluer en fonction des besoins techniques de l'application.</p>
        </div>

        <!-- Section 22 -->
        <div class="section" id="autorisations">
            <h2>22. Autorisations demandées par l'application</h2>
            <p>Selon les fonctionnalités utilisées, Mi-Gban peut demander certaines autorisations sur l'appareil de l'utilisateur.</p>

            <h3>Localisation</h3>
            <p>Utilisée pour les fonctionnalités liées à la recherche et à l'affichage de propriétés selon une zone géographique.</p>

            <h3>Caméra</h3>
            <p>Utilisée pour prendre des photos ou vidéos, notamment pour les profils, les propriétés et certains documents.</p>

            <h3> Photos / Galerie</h3>
            <p>Utilisée pour permettre à l'utilisateur de sélectionner des images, vidéos ou documents depuis son appareil.</p>

            <h3>Notifications</h3>
            <p>Utilisées pour envoyer des informations relatives au compte, aux demandes, aux réservations et aux autres événements importants.</p>

            <div class="highlight-box">
                <p><strong> Mi-Gban demande ces autorisations uniquement lorsqu'elles sont nécessaires à une fonctionnalité concernée.</strong></p>
                <p>L'utilisateur peut refuser certaines autorisations. Toutefois, certaines fonctionnalités peuvent alors ne pas fonctionner correctement.</p>
            </div>
        </div>

        <!-- Section 23 -->
        <div class="section" id="modifications">
            <h2>23. Modifications de la présente politique</h2>
            <p>Mi-Gban peut modifier cette Politique de confidentialité lorsque cela est nécessaire, notamment en raison de l'évolution :</p>
            <ul>
                <li>de l'application ;</li>
                <li>de ses fonctionnalités ;</li>
                <li>des technologies utilisées ;</li>
                <li>de ses pratiques de traitement des données ;</li>
                <li>des exigences légales ou réglementaires.</li>
            </ul>
            <p>La date de dernière mise à jour sera indiquée en haut de cette page.</p>
            <p>Nous encourageons les utilisateurs à consulter régulièrement cette politique afin de prendre connaissance des éventuelles modifications.</p>
        </div>

        <!-- Section 24 -->
        <div class="section" id="contact">
            <h2>24. Contact</h2>
            <p>Pour toute question concernant cette Politique de confidentialité, vos données personnelles ou l'exercice de vos droits, vous pouvez contacter Mi-Gban :</p>
            <div class="contact-card">
                <p><strong>Nom :</strong> Mi-Gban</p>
                <p><strong>Éditeur :</strong> KONE N'GANNA MONDESIR</p>
                <p><strong>E-mail :</strong> ndouble024@gmail.com</p>
                <p><strong>Téléphone :</strong> +225 07 12 56 69 56</p>
                <p><strong>Adresse :</strong> Bouaké, Air France 3</p>
            </div>
        </div>

        <!-- Section 25 -->
        <div class="section" id="acceptation">
            <h2>25. Acceptation</h2>
            <div class="highlight-box">
                <p><strong> En utilisant Mi-Gban, l'utilisateur reconnaît avoir pris connaissance de la présente Politique de confidentialité et comprendre la manière dont ses données personnelles peuvent être collectées et utilisées dans le cadre des services proposés par Mi-Gban.</strong></p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2026 <a href="https://mi-gban.com">Mi-Gban</a> – Tous droits réservés.</p>
            <p style="margin-top: 8px; font-size: 13px; color: #9ca3af;">
                Politique de confidentialité – Dernière mise à jour : 25 août 2026
            </p>
        </div>

    </div>

</body>
</html>