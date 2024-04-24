<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
  </head>
  <style>
    .iti {
      width: 100%;
    }
  </style>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
    </symbol>
    <symbol id="twitter" viewBox="0 0 16 16">
      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
    </symbol>
  </svg>
  <body>
  <nav>
    <div class="logo">
      <a href="index.php">
        <img src="logoabujad.png" alt="">
      </a>
    </div>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li class="active"><a href="formulaire.php">Formulaire</a></li>
        <li><a href="classement.php">Classement</a></li>
        <li><a href="spectacle.php">Spectacle</a></li>
        <li><a href="#"><li class="fa fa-bars"></li></a></li>
      </ul>
    </nav>
    <div class="mainContainer">
      <div class="leftContainer">
        <div class="whiteContainer hidden">
          <h2><strong>Formulaire de renseignement</strong></h2>
          <p>Remplissez dès maintenant le formulaire et bénéficiez aussi de notre accompagnement.</p>
          <div class="d-flex justify-content-center mt-4">
            <div class="spinner-border text-warning" id="spinner" style="display:none;" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
          <form id="form" class="formulaire">
            <div class="mb-3 sm-flex justify-content-between">
              <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastName" id="lastName" autocomplete="family-name" required>
              </div>
              <div class="mb-3">
                <label for="firstName" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstName" id="firstName" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="dateDeNaissance" class="form-label">Date de naissance</label>
              <input type="date" name="dateNaissance"class="form-control" id="dateDeNaissance" required>
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Sexe</label>
              <select class="form-select" name="gender" id="gender" required>
                <option selected>Femme</option>
                <option value="0">Homme</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Adresse e-mail</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Numéro Whatsapp</label>
              <input id="phone" type="tel" name="phoneNumber" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="country" class="form-label">Pays</label>
              <select class="form-select" name="country" required>
                <option value="Maroc" selected="selected">Maroc </option>
                <option value="Afghanistan">Afghanistan </option>
                <option value="Afrique_Centrale">Afrique_Centrale </option>
                <option value="Afrique_du_sud">Afrique_du_Sud </option>
                <option value="Albanie">Albanie </option>
                <option value="Algerie">Algerie </option>
                <option value="Allemagne">Allemagne </option>
                <option value="Andorre">Andorre </option>
                <option value="Angola">Angola </option>
                <option value="Anguilla">Anguilla </option>
                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                <option value="Argentine">Argentine </option>
                <option value="Armenie">Armenie </option>
                <option value="Australie">Australie </option>
                <option value="Autriche">Autriche </option>
                <option value="Azerbaidjan">Azerbaidjan </option>
                <option value="Bahamas">Bahamas </option>
                <option value="Bangladesh">Bangladesh </option>
                <option value="Barbade">Barbade </option>
                <option value="Bahrein">Bahrein </option>
                <option value="Belgique">Belgique </option>
                <option value="Belize">Belize </option>
                <option value="Benin">Benin </option>
                <option value="Bermudes">Bermudes </option>
                <option value="Bielorussie">Bielorussie </option>
                <option value="Bolivie">Bolivie </option>
                <option value="Botswana">Botswana </option>
                <option value="Bhoutan">Bhoutan </option>
                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                <option value="Bresil">Bresil </option>
                <option value="Brunei">Brunei </option>
                <option value="Bulgarie">Bulgarie </option>
                <option value="Burkina_Faso">Burkina_Faso </option>
                <option value="Burundi">Burundi </option>
                <option value="Caiman">Caiman </option>
                <option value="Cambodge">Cambodge </option>
                <option value="Cameroun">Cameroun </option>
                <option value="Canada">Canada </option>
                <option value="Canaries">Canaries </option>
                <option value="Cap_vert">Cap_Vert </option>
                <option value="Chili">Chili </option>
                <option value="Chine">Chine </option>
                <option value="Chypre">Chypre </option>
                <option value="Colombie">Colombie </option>
                <option value="Comores">Colombie </option>
                <option value="Congo">Congo </option>
                <option value="Congo_democratique">Congo_democratique </option>
                <option value="Cook">Cook </option>
                <option value="Coree_du_Nord">Coree_du_Nord </option>
                <option value="Coree_du_Sud">Coree_du_Sud </option>
                <option value="Costa_Rica">Costa_Rica </option>
                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                <option value="Croatie">Croatie </option>
                <option value="Cuba">Cuba </option>
                <option value="Danemark">Danemark </option>
                <option value="Djibouti">Djibouti </option>
                <option value="Dominique">Dominique </option>
                <option value="Egypte">Egypte </option>
                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                <option value="Equateur">Equateur </option>
                <option value="Erythree">Erythree </option>
                <option value="Espagne">Espagne </option>
                <option value="Estonie">Estonie </option>
                <option value="Etats_Unis">Etats_Unis </option>
                <option value="Ethiopie">Ethiopie </option>
                <option value="Falkland">Falkland </option>
                <option value="Feroe">Feroe </option>
                <option value="Fidji">Fidji </option>
                <option value="Finlande">Finlande </option>
                <option value="France">France </option>
                <option value="Gabon">Gabon </option>
                <option value="Gambie">Gambie </option>
                <option value="Georgie">Georgie </option>
                <option value="Ghana">Ghana </option>
                <option value="Gibraltar">Gibraltar </option>
                <option value="Grece">Grece </option>
                <option value="Grenade">Grenade </option>
                <option value="Groenland">Groenland </option>
                <option value="Guadeloupe">Guadeloupe </option>
                <option value="Guam">Guam </option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernesey">Guernesey </option>
                <option value="Guinee">Guinee </option>
                <option value="Guinee_Bissau">Guinee_Bissau </option>
                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                <option value="Guyana">Guyana </option>
                <option value="Guyane_Francaise ">Guyane_Francaise </option>
                <option value="Haiti">Haiti </option>
                <option value="Hawaii">Hawaii </option>
                <option value="Honduras">Honduras </option>
                <option value="Hong_Kong">Hong_Kong </option>
                <option value="Hongrie">Hongrie </option>
                <option value="Inde">Inde </option>
                <option value="Indonesie">Indonesie </option>
                <option value="Iran">Iran </option>
                <option value="Iraq">Iraq </option>
                <option value="Irlande">Irlande </option>
                <option value="Islande">Islande </option>
                <option value="Israel">Israel </option>
                <option value="Italie">italie </option>
                <option value="Jamaique">Jamaique </option>
                <option value="Jan Mayen">Jan Mayen </option>
                <option value="Japon">Japon </option>
                <option value="Jersey">Jersey </option>
                <option value="Jordanie">Jordanie </option>
                <option value="Kazakhstan">Kazakhstan </option>
                <option value="Kenya">Kenya </option>
                <option value="Kirghizstan">Kirghizistan </option>
                <option value="Kiribati">Kiribati </option>
                <option value="Koweit">Koweit </option>
                <option value="Laos">Laos </option>
                <option value="Lesotho">Lesotho </option>
                <option value="Lettonie">Lettonie </option>
                <option value="Liban">Liban </option>
                <option value="Liberia">Liberia </option>
                <option value="Liechtenstein">Liechtenstein </option>
                <option value="Lituanie">Lituanie </option>
                <option value="Luxembourg">Luxembourg </option>
                <option value="Lybie">Lybie </option>
                <option value="Macao">Macao </option>
                <option value="Macedoine">Macedoine </option>
                <option value="Madagascar">Madagascar </option>
                <option value="Madère">Madère </option>
                <option value="Malaisie">Malaisie </option>
                <option value="Malawi">Malawi </option>
                <option value="Maldives">Maldives </option>
                <option value="Mali">Mali </option>
                <option value="Malte">Malte </option>
                <option value="Man">Man </option>
                <option value="Mariannes du Nord">Mariannes du Nord </option>
                <option value="Maroc">Maroc </option>
                <option value="Marshall">Marshall </option>
                <option value="Martinique">Martinique </option>
                <option value="Maurice">Maurice </option>
                <option value="Mauritanie">Mauritanie </option>
                <option value="Mayotte">Mayotte </option>
                <option value="Mexique">Mexique </option>
                <option value="Micronesie">Micronesie </option>
                <option value="Midway">Midway </option>
                <option value="Moldavie">Moldavie </option>
                <option value="Monaco">Monaco </option>
                <option value="Mongolie">Mongolie </option>
                <option value="Montserrat">Montserrat </option>
                <option value="Mozambique">Mozambique </option>
                <option value="Namibie">Namibie </option>
                <option value="Nauru">Nauru </option>
                <option value="Nepal">Nepal </option>
                <option value="Nicaragua">Nicaragua </option>
                <option value="Niger">Niger </option>
                <option value="Nigeria">Nigeria </option>
                <option value="Niue">Niue </option>
                <option value="Norfolk">Norfolk </option>
                <option value="Norvege">Norvege </option>
                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                <option value="Oman">Oman </option>
                <option value="Ouganda">Ouganda </option>
                <option value="Ouzbekistan">Ouzbekistan </option>
                <option value="Pakistan">Pakistan </option>
                <option value="Palau">Palau </option>
                <option value="Palestine">Palestine </option>
                <option value="Panama">Panama </option>
                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                <option value="Paraguay">Paraguay </option>
                <option value="Pays_Bas">Pays_Bas </option>
                <option value="Perou">Perou </option>
                <option value="Philippines">Philippines </option>
                <option value="Pologne">Pologne </option>
                <option value="Polynesie">Polynesie </option>
                <option value="Porto_Rico">Porto_Rico </option>
                <option value="Portugal">Portugal </option>
                <option value="Qatar">Qatar </option>
                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                <option value="Republique_Tcheque">Republique_Tcheque </option>
                <option value="Reunion">Reunion </option>
                <option value="Roumanie">Roumanie </option>
                <option value="Royaume_Uni">Royaume_Uni </option>
                <option value="Russie">Russie </option>
                <option value="Rwanda">Rwanda </option>
                <option value="Sahara Occidental">Sahara Occidental </option>
                <option value="Sainte_Lucie">Sainte_Lucie </option>
                <option value="Saint_Marin">Saint_Marin </option>
                <option value="Salomon">Salomon </option>
                <option value="Salvador">Salvador </option>
                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                <option value="Samoa_Americaine">Samoa_Americaine </option>
                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                <option value="Senegal">Senegal </option>
                <option value="Seychelles">Seychelles </option>
                <option value="Sierra Leone">Sierra Leone </option>
                <option value="Singapour">Singapour </option>
                <option value="Slovaquie">Slovaquie </option>
                <option value="Slovenie">Slovenie</option>
                <option value="Somalie">Somalie </option>
                <option value="Soudan">Soudan </option>
                <option value="Sri_Lanka">Sri_Lanka </option>
                <option value="Suede">Suede </option>
                <option value="Suisse">Suisse </option>
                <option value="Surinam">Surinam </option>
                <option value="Swaziland">Swaziland </option>
                <option value="Syrie">Syrie </option>
                <option value="Tadjikistan">Tadjikistan </option>
                <option value="Taiwan">Taiwan </option>
                <option value="Tonga">Tonga </option>
                <option value="Tanzanie">Tanzanie </option>
                <option value="Tchad">Tchad </option>
                <option value="Thailande">Thailande </option>
                <option value="Tibet">Tibet </option>
                <option value="Timor_Oriental">Timor_Oriental </option>
                <option value="Togo">Togo </option>
                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                <option value="Tristan da cunha">Tristan de cuncha </option>
                <option value="Tunisie">Tunisie </option>
                <option value="Turkmenistan">Turmenistan </option>
                <option value="Turquie">Turquie </option>
                <option value="Ukraine">Ukraine </option>
                <option value="Uruguay">Uruguay </option>
                <option value="Vanuatu">Vanuatu </option>
                <option value="Vatican">Vatican </option>
                <option value="Venezuela">Venezuela </option>
                <option value="Vierges_Americaines">Vierges_Americaines </option>
                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                <option value="Vietnam">Vietnam </option>
                <option value="Wake">Wake </option>
                <option value="Wallis et Futuma">Wallis et Futuma </option>
                <option value="Yemen">Yemen </option>
                <option value="Yougoslavie">Yougoslavie </option>
                <option value="Zambie">Zambie </option>
                <option value="Zimbabwe">Zimbabwe </option>
              </select>
            </div>
            <div class="mb-3">
              <label for="domaineSouhaite" class="form-label">Domaine souhaité</label>
              <select name="domaineSouhaite[]" class="js-example-basic-multiple form-select" style="width:100%;" multiple="multiple" id="domaineSouhaite" required>
                <option value="none">Aucune préférence</option>
                <option value="autre">Autres</option>
                <optgroup label="Sciences et Technologies">
                    <option value="Mathematiques">Mathématiques</option>
                    <option value="Physique">Physique</option>
                    <option value="Chimie">Chimie</option>
                    <option value="Informatique">Informatique</option>
                    <option value="GenieCivil">Génie Civil</option>
                    <option value="GenieElectrique">Génie Électrique</option>
                    <option value="GenieMecanique">Génie Mécanique</option>
                    <option value="GenieProcedes">Génie des Procédés</option>
                    <option value="GenieInformatiqueIndustrielle">Génie Informatique Industrielle</option>
                    <option value="GenieElectromecanique">Génie Électromécanique</option>
                </optgroup>
                <optgroup label="Sciences de la Vie et de la Santé">
                    <option value="Medecine">Médecine</option>
                    <option value="Pharmacie">Pharmacie</option>
                    <option value="Biologie">Biologie</option>
                    <option value="Biotechnologie">Biotechnologie</option>
                    <option value="SciencesNutrition">Sciences de la Nutrition</option>
                    <option value="SciencesInfirmieres">Sciences Infirmières</option>
                </optgroup>
                <optgroup label="Sciences Humaines et Sociales">
                    <option value="Psychologie">Psychologie</option>
                    <option value="Sociologie">Sociologie</option>
                    <option value="SciencesPolitiques">Sciences Politiques</option>
                    <option value="Histoire">Histoire</option>
                    <option value="Geographie">Géographie</option>
                    <option value="LanguesLitteratures">Langues et Littératures</option>
                    <option value="SciencesEducation">Sciences de l'Éducation</option>
                    <option value="DidactiqueLangues">Didactique des Langues</option>
                    <option value="Pedagogie">Pédagogie</option>
                </optgroup>
                <optgroup label="Droit et Sciences Juridiques">
                    <option value="DroitPublic">Droit Public</option>
                    <option value="DroitPrive">Droit Privé</option>
                    <option value="SciencesPolitiquesJuridiques">Sciences Politiques</option>
                </optgroup>
                <optgroup label="Économie et Gestion">
                    <option value="Economie">Économie</option>
                    <option value="Gestion">Gestion</option>
                    <option value="CommerceInternational">Commerce International</option>
                    <option value="FinanceBanque">Finance et Banque</option>
                    <option value="ManagementRessourcesHumaines">Management des Ressources Humaines (GRH)</option>
                </optgroup>
                <optgroup label="Ingénierie et Sciences de l'Information">
                    <option value="Telecommunications">Télécommunications</option>
                    <option value="ReseauxInformatiques">Réseaux Informatiques</option>
                    <option value="GenieLogiciel">Génie Logiciel</option>
                    <option value="IntelligenceArtificielle">Intelligence Artificielle (IA) et Sciences des Données</option>
                    <option value="AnalyseTraitementDonnees">Analyse et Traitement des Données</option>
                </optgroup>
                <optgroup label="Arts et Culture">
                    <option value="ArtsPlastiques">Arts Plastiques</option>
                    <option value="Musique">Musique</option>
                    <option value="CinemaAudiovisuel">Cinéma et Audiovisuel</option>
                    <option value="Theatre">Théâtre</option>
                    <option value="DesignGraphique">Design Graphique</option>
                    <option value="DesignInterieur">Design d'Intérieur</option>
                </optgroup>
                <optgroup label="Agriculture et Environnement">
                    <option value="Agronomie">Agronomie</option>
                    <option value="GestionEnvironnement">Gestion de l'Environnement</option>
                    <option value="BiologieMarine">Biologie Marine</option>
                    <option value="EnvironnementMarin">Environnement Marin</option>
                </optgroup>
                <optgroup label="Tourisme et Hôtellerie">
                    <option value="ManagementTourisme">Management du Tourisme</option>
                    <option value="Hotellerie">Hôtellerie</option>
                    <option value="PatrimoineTourismeCulturel">Patrimoine et Tourisme Culturel</option>
                </optgroup>
                <optgroup label="Architecture et Urbanisme">
                    <option value="Architecture">Architecture</option>
                    <option value="Urbanisme">Urbanisme</option>
                </optgroup>
                <optgroup label="Éducation et Formation">
                    <option value="SciencesEducation2">Sciences de l'Éducation</option>
                    <option value="DidactiqueLangues2">Didactique des Langues</option>
                    <option value="Pedagogie2">Pédagogie</option>
                </optgroup>
                <optgroup label="Journalisme et Communication">
                    <option value="Journalisme">Journalisme</option>
                    <option value="Communication">Communication</option>
                    <option value="CommunicationDigitale">Communication Digitale</option>
                    <option value="CommunicationVisuelle">Communication Visuelle</option>
                </optgroup>
                <optgroup label="Sciences Politiques et Relations Internationales">
                    <option value="RelationsInternationales">Relations Internationales</option>
                    <option value="Diplomatie">Diplomatie</option>
                    <option value="EtudesStrategiques">Études Stratégiques</option>
                </optgroup>
                <optgroup label="Sciences de la Communication">
                    <option value="CommunicationDigitale2">Communication Digitale</option>
                    <option value="CommunicationVisuelle2">Communication Visuelle</option>
                </optgroup>
                <optgroup label="Sciences et Techniques des Activités Physiques et Sportives (STAPS)">
                    <option value="EducationPhysiqueSportive">Éducation Physique et Sportive</option>
                    <option value="EntrainementSportif">Entraînement Sportif</option>
                </optgroup>
                <optgroup label="Énergies Renouvelables">
                    <option value="EnergiesRenouvelablesEnvironnement">Énergies Renouvelables et Environnement</option>
                    <option value="GestionEnergie">Gestion de l'Énergie</option>
                </optgroup>
                <optgroup label="Sciences Islamiques">
                    <option value="EtudesIslamiques">Études Islamiques</option>
                    <option value="DroitIslamique">Droit Islamique</option>
                </optgroup>
                <optgroup label="Management du Tourisme Culturel">
                    <option value="PatrimoineTourismeCulturel2">Patrimoine et Tourisme Culturel</option>
                </optgroup>
                <optgroup label="Biologie Marine et Environnement Marin">
                    <option value="BiologieMarine2">Biologie Marine</option>
                    <option value="EnvironnementMarin2">Environnement Marin</option>
                </optgroup>
                <optgroup label="Logistique et Gestion de la Chaîne d'Approvisionnement">
                    <option value="LogistiqueInternationale">Logistique Internationale</option>
                    <option value="GestionStocks">Gestion des Stocks</option>
                    <option value="TransportDistribution">Transport et Distribution</option>
                </optgroup>
              </select>
            </div>
            <div class="mb-3">
              <label for="etablissementPrefere" class="form-label">Établissements privés demandés</label>
              <select name="etablissementPrefere[]" class="js-example-basic-multiple form-select" style="width:100%;" name="states[]" multiple="multiple" id="etablissementPrefere" required>
                <option value="none">Aucune préférence</option>
                <option value="uir">Université Internationale de Rabat- UIR</option>
                <option value="um6ss">Université Mohammed VI des Sciences de Santé - UM6SS - Casablanca</option>
                <option value="uiass">Université Internationale Abulcasis des Sciences de Santé- UIASS - Rabat</option>
                <option value="uemf">Université Euro-méditerranéenne de Fès - UEMF</option>
                <option value="um6p">Université Mohammed VI Polytechnique - UM6PBen guérir</option>
                <option value="upm">Université Privée Marrakech Tensift El Haouz -UPM</option>
                <option value="upolis">Université Internationale d’Agadir -Universiapolis</option>
                <option value="uic">Université Internationale de Casablanca - UIC</option>
                <option value="eac">Ecole Supérieure d’Architecture de Casablanca - EAC</option>
                <option value="ecc">Ecole Centrale de Casablanca - ECC</option>
                <option value="esca">ESCA Ecole de Management</option>
                <option value="upmc">Université Privée Mundiapolis- Casablanca</option>
                <option value="upf">Université Privée de Fès - UPF</option>
                <option value="supco">Sup de Co - Ecole Supérieure de Commerce - Marrakech</option>
                <option value="estem">Ecole Supérieure en Ingénierie de l'Information, Télécoms, Management et Génie Civil – ESTEM Casablanca</option>
                <option value="igac">Institut Supérieur du Génie Appliqué Casablanca - IGA Casablanca</option>
                <option value="emsic">Ecole Marocaine des Sciences de l'Ingénieur Casablanca - EMSI Casablanca</option>
                <option value="emsir">Ecole Marocaine des Sciences de l'Ingénieur Rabat - EMSI Rabat</option>
                <option value="isgar">Institut Supérieur d'Ingénierie et des Affaires Privé - Rabat - ISGA-Rabat</option>
                <option value="isgaf">Institut Supérieur d'Ingénierie et des Affaires - ISGA-Fès</option>
                <option value="isgam">Institut Supérieur d'Ingénierie et des Affaires - ISGA-Marrakech</option>
                <option value="emgr">Ecole Marocaine d’Ingénierie - EMG-Rabat</option>
                <option value="istlc">Institut Supérieur de transport et de la Logistique - ISTL-Casablanca</option>
                <option value="hemc">Institut des Hautes Etudes de Management- HEM Casablanca</option>
                <option value="heec">Ecole des Hautes Etudes Economiques, Commerciales et d’Ingénierie - HEEC - Marrakech</option>
                <option value="supmf">Ecole Supérieure de Management de Commerce et d'Informatique- SUP'MANAGEMENT- Fès</option>
                <option value="iihem">International Institute for Higher Education in Morocco – IIHEM - Rabat</option>
                <option value="eigsica">Ecole d'Ingénierie en Génie des Systèmes Industriels de Casablanca- EIGSICA</option>
                <option value="supmti">Ecole Supérieure de Management, Informatique et Télécommunication- SUPMTI Rabat</option>
                <option value="eheio">Ecole des Hautes Etudes d’Ingénierie- EHEIO Oujda</option>
                <option value="emaaa">Ecole de Management et d'Administration des Affaires- Agadir</option>
                <option value="isgac">Institut Supérieur d'Ingénierie et des Affaires - ISGA-Casablanca</option>
                <option value="ismagi">Institut Supérieur de Management d'administration et de Genie Informatique -ISMAGI</option>
                <option value="autres">Autres</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="anneeEtude" class="form-label">Année d’études actuelle</label>
              <input type="text" name="anneeEtude" class="form-control" id="anneeEtude" required>
            </div>
            <div class="mb-3">
              <label for="dernierDiplome" class="form-label">Dernier Diplôme</label>
              <select class="form-select" name="dernierDiplome" id="dernierDiplome"  required>
                <option value="1bac">1ère bac</option>
                <option value="bac">Baccalauréat</option>
                <option value="bachelor">Bachelor</option>
                <option value="deug">DEUG</option>
                <option value="deust">DEUST</option>
                <option value="dut">DUT</option>
                <option value="bts">BTS</option>
                <option value="dts">DTS</option>
                <option value="dt">DT</option>
                <option value="lf">Licence fondamentale</option>
                <option value="lp">Licence professionnelle</option>
                <option value="lst">Licence Sciences et Techniques</option>
                <option value="ms">Master spécialisé</option>
                <option value="mst">Master Sciences et Techniques</option>
                <option value="ie">Ingénieur d'état</option>
                <option value="MBA">Master of Business Administration</option>
                <option value="d">Doctorant</option>
              </select>
            </div>
            <button class="btn btn-primary mb-5" name="submit" id="submit">Postuler pour une bourse</button>
          </form>
          <div id="merci" class="remerciement">
            <p>Merci d'avoir complété le formulaire, votre demande de bourse a été envoyée.</p>
            <a href="classement.php" class="firstButton">Accéder au classement</a>
          </div>
        </div>
      </div>
      </div>
      <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; Abujad, 2024</span>
          </div>
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/abdellahabujad/"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/AbdellahAbujad/"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </footer>
      </div>
      <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.3.3/js/intlTelInput-jquery.js" integrity="sha512-nqIIufL6zArBNYY3DE+/7rHWQ5UaI3U/K/yG4C/hbP+euJyhO19/7NV8dcZlz6ZuCmlLjZLAm134xmPLtO6nuw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="jbvalidator.min.js"></script>
    <script>
  $(document).ready(function () {
    $('#etablissementPrefere').select2();
    $('#domaineSouhaite').select2();

    $('#phone').intlTelInput({
      utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
      nationalMode:false,
      preferredCountries: ["ma"]
    });
    console.log("Initialized intlTelInput");
    $('#merci').hide();
    $("form").submit(function (e) {
      e.preventDefault();
      let url = `./formulaireprocess.php`;
      const newNumber = $("#phone").intlTelInput("getNumber");
      $("#phoneNumber").val(newNumber);
      $.ajax({
        url: url,
        method: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
          $('form').hide();
          $("#spinner").show();
        },
        success: function (data) {
          $("#spinner").hide();
          $('#merci').show();
        },
        error: function (data) {
          alert("Some error occurred.");
        },
      });
    });
  });
</script>


      </body>
      <script src="script.js"></script>
</html>