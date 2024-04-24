<?php
include_once 'include/mysql.php';

// Create a new Connection object
$connection = new Connection();

// Open the database connection
$pdo = $connection->openConnection();

// Initialize a variable to track form submission status
$submission_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $numero_whatsapp = $_POST['numero_whatsapp'];
  if (strpos($numero_whatsapp, '0') === 0) {
      $numero_whatsapp = substr($numero_whatsapp, 1);
  }
  if (strpos($numero_whatsapp, '212') !== 0) {
      $numero_whatsapp = '212' . $numero_whatsapp;
  }
  $ville_spectacle = $_POST['ville_spectacle'];
  $nbr_tickets = $_POST['nbr_tickets'];
  $tickets_payes = isset($_POST['tickets_payes']) ? filter_var($_POST['tickets_payes'], FILTER_VALIDATE_INT) : null;
  $age = $_POST['age'];
  // Retrieve checkbox values and convert them to 1 for checked and 0 for unchecked
  $etudiant = isset($_POST['Etudiant']) ? 1 : 0;
  $bachelier = isset($_POST['Bachelier']) ? 1 : 0;
  $parent = isset($_POST['Parent']) ? 1 : 0;
  $salarie = isset($_POST['Salarie']) ? 1 : 0;
  $diplome = isset($_POST['Diplome']) ? 1 : 0;

  try {
    // Prepare SQL statement to insert data into spectacle_form table
    $sql = "INSERT INTO spectacle_form (Nom, Prenom, Email, Numero_Whatsapp, Ville_Spectacle, Nbr_Tickets, Tickets_Payes, Age, Etudiant, Bachelier, Parent, Salarie, Diplome) 
                VALUES (:Nom, :Prenom, :Email, :Numero_Whatsapp, :Ville_Spectacle, :Nbr_Tickets, :Tickets_Payes, :Age, :Etudiant, :Bachelier, :Parent, :Salarie, :Diplome)";
    // Execute the prepared statement
    $stmt = $pdo->prepare($sql);
    // Bind parameters to the statement
    $stmt->bindParam(':Nom', $nom);
    $stmt->bindParam(':Prenom', $prenom);
    $stmt->bindParam(':Email', $email);
    $stmt->bindParam(':Numero_Whatsapp', $numero_whatsapp);
    $stmt->bindParam(':Ville_Spectacle', $ville_spectacle);
    $stmt->bindParam(':Nbr_Tickets', $nbr_tickets);
    $stmt->bindParam(':Tickets_Payes', $tickets_payes);
    $stmt->bindParam(':Age', $age);
    $stmt->bindParam(':Etudiant', $etudiant, PDO::PARAM_INT);
    $stmt->bindParam(':Bachelier', $bachelier, PDO::PARAM_INT);
    $stmt->bindParam(':Parent', $parent, PDO::PARAM_INT);
    $stmt->bindParam(':Salarie', $salarie, PDO::PARAM_INT);
    $stmt->bindParam(':Diplome', $diplome, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // If data is inserted successfully
    if ($stmt->rowCount()) {
      $submission_message = "Votre demande a été envoyée!";
    } else {
      $submission_message = "Une erreur a été survenue.";
    }
  } catch (PDOException $e) {
    // Handle database errors
    $submission_message = "Error: " . $e->getMessage();
  }
}

// Close the database connection
$connection->closeConnection();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Abujad Spectacle</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./style1.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
  <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>

<body>
  <div class="flex flex-col w-full min-h-screen bg-black">
    <nav>
      <div class="logo">
        <a href="index.php">
          <img src="logoabujad.png" alt="">
        </a>
      </div>
      <ul>
        <li><a href="/">Accueil</a></li>
        <!-- <li><a href="formulaire.php">Formulaire</a></li>
        <li><a href="classement.php">Classement</a></li> -->
        <li class="active"><a href="spectacle.php">Spectacle</a></li>
        <li><a href="#">
        <li class="fa fa-bars"></li></a></li>
      </ul>
    </nav>
    <main>
      <div class="relative isolate py-14 sm:pb-40 px-6 bg-black"
        style="background-image: url('images/clip06.webp'); background-size: fit;">
        <div class="mx-auto max-w-7xl lg:flex lg:items-center">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto pb-10 pt-10">
            <h1 class="max-w-lg text-6xl font-bold tracking-tight text-gray-100 sm:text-7xl">TSTAHEL TNJEH</h1>
            <p class="mt-6 text-lg leading-8 text-gray-300">Tstahel tnjeh est une occasion unique de prendre votre
              avenir en main. Ne manquez pas ce spectacle exceptionnel qui vous permettra de faire des choix éclairés
              pour votre avenir professionnel.</p>
            <div class="mt-4">
              <a href="#form" type="button"
                class="rounded-md hover:bg-white justify-start p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:block md:hidden lg:hidden xl:hidden">Résérvez
                Maintenant</a>
            </div>
          </div>
          <div class="sm:w-2/3 bg-white p-8">
            <div class="mb-6 border-l-4 border-red-600 pl-4">
              <h2 class="text-2xl font-semibold">Réservez Votre Place</h2>
              <p class="mt-1 text-sm text-gray-300">N'attendez plus pour prendre votre avenir en main ! Inscrivez-vous
              </p>
            </div>
            <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                  <label for="nom" class="block mb-1 text-sm font-medium text-gray-700">Nom</label>
                  <input type="text" id="nom" name="nom" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Nom">
                </div>
                <div class="mb-4">
                  <label for="prenom" class="block mb-1 text-sm font-medium text-gray-700">Prènom</label>
                  <input type="text" id="prenom" name="prenom" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Prenom">
                </div>
                <div class="mb-4">
                  <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                  <input type="email" id="email" name="email" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Votre Email">
                </div>
                <div class="mb-4">
                  <label for="numero_whatsapp" class="block mb-1 text-sm font-medium text-gray-700">Numéro
                    Whatsapp</label>
                  <input type="tel" id="numero_whatsapp" name="numero_whatsapp" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                <div class="mb-4">
                  <label for="ville_spectacle" class="block mb-1 text-sm font-medium text-gray-700">Ville du
                    Spectacle Souhaitée</label>
                  <select
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Ville Spectacle" name="ville_spectacle" required>
                    <option value="Casablanca"> Casablanca</option>

                    <option value="Agadir"> Agadir</option>

                    <option value="Al Hocïema"> Al Hocïema</option>

                    <option value="Béni Mellal"> Béni Mellal</option>

                    <option value="El Jadida"> El Jadida</option>

                    <option value="Errachidia"> Errachidia</option>

                    <option value="Fès"> Fès</option>

                    <option value="Kénitra"> Kénitra</option>

                    <option value="Khénifra"> Khénifra</option>

                    <option value="Khouribga"> Khouribga</option>

                    <option value="Larache"> Larache</option>

                    <option value="Marrakech"> Marrakech</option>

                    <option value="Meknès"> Meknès</option>

                    <option value="Nador"> Nador</option>

                    <option value="Ouarzazate"> Ouarzazate</option>

                    <option value="Oujda"> Oujda</option>

                    <option value="Rabat"> Rabat</option>

                    <option value="Safi"> Safi</option>

                    <option value="Settat"> Settat</option>

                    <option value="Salé"> Salé</option>

                    <option value="Tanger"> Tanger</option>

                    <option value="Taza"> Taza</option>

                    <option value="Tétouan"> Tétouan</option>

                  </select>
                </div>
                <div class="mb-4">
                  <label for="nbr_tickets" class="block mb-1 text-sm font-medium text-gray-700">Nombre de
                    Tickets</label>
                  <input type="number" id="nbr_tickets" name="nbr_tickets" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Nbr Tickets">
                </div>
                <div class="mb-4">
                  <label for="age" class="block mb-1 text-sm font-medium text-gray-700">Âge</label>
                  <input type="number" id="age" name="age" required
                    class="form-input flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Age">
                </div>
                <div class="mb-4">
                  <label class="block mb-1 text-sm font-medium text-gray-700">Occupation</label>
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                    <div class="flex items-center">
                      <input id="Etudiant" name="Etudiant" type="checkbox" value="1"
                        class="h-4 w-4 text-primary focus:ring-primary rounded">
                      <label for="Etudiant" class="ml-2 text-sm text-gray-900">Bac+1 ou Plus</label>
                    </div>
                    <div class="flex items-center">
                      <input id="Bachelier" name="Bachelier" type="checkbox" value="1"
                        class="h-4 w-4 text-primary focus:ring-primary rounded">
                      <label for="Bachelier" class="ml-2 text-sm text-gray-900">Bachelier(e)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="Parent" name="Parent" type="checkbox" value="1"
                        class="h-4 w-4 text-primary focus:ring-primary rounded">
                      <label for="Parent" class="ml-2 text-sm text-gray-900">Parent</label>
                    </div>
                    <div class="flex items-center">
                      <input id="Salarie" name="Salarie" type="checkbox" value="1"
                        class="h-4 w-4 text-primary focus:ring-primary rounded">
                      <label for="Salarie" class="ml-2 text-sm text-gray-900">Salarié(e)</label>
                    </div>
                    <div class="flex items-center">
                      <input id="Diplome" name="Diplome" type="checkbox" value="1"
                        class="h-4 w-4 text-primary focus:ring-primary rounded">
                      <label for="Diplome" class="ml-2 text-sm text-gray-900">Diplomé(e)</label>
                    </div>
                  </div>
                </div>

                <script>
                  const etudiantCheckbox = document.getElementById('Etudiant');
                  const bachelierCheckbox = document.getElementById('Bachelier');
                  const diplomeCheckbox = document.getElementById('Diplome');

                  function updateDisabledState() {
                    // Disable interaction with "Bachelier" checkbox
                    bachelierCheckbox.classList.toggle('opacity-50', etudiantCheckbox.checked || diplomeCheckbox.checked);

                    // Disable "Etudiant" and "Diplome" only if "Bachelier" is checked
                    etudiantCheckbox.classList.toggle('opacity-50', bachelierCheckbox.checked);
                    diplomeCheckbox.classList.toggle('opacity-50', bachelierCheckbox.checked);
                  }

                  etudiantCheckbox.addEventListener('change', updateDisabledState);
                  bachelierCheckbox.addEventListener('change', updateDisabledState);
                  diplomeCheckbox.addEventListener('change', updateDisabledState);

                  // Call updateDisabledState on initial load to handle pre-checked checkboxes
                  updateDisabledState();
                </script>

              </div>
              <button
                class="mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-gray-800 text-white">
                RESERVER
              </button>
              <?php if (!empty($submission_message)): ?>
                <div class="text-lg font-bold text-center text-green-700 mb-4"><?php echo $submission_message; ?></div>
              <?php endif; ?>
            </form>

          </div>
        </div>
      </div>
      <div class="overflow-hidden bg-black py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <p
                  class="sm:mt-40 text-3xl border-l-4 border-red-600 pl-4 font-bold tracking-tight text-gray-100 sm:text-5xl underline underline-offset-auto">
                  À propos de<br> l’événement</p>
                <p class="mt-6 text-lg  leading-8 text-gray-300">Plongez dans un voyage captivant de deux heures,
                  conçu pour éclairer et inspirer les jeunes et leurs familles sur le chemin de l'orientation
                  universitaire et professionnelle. <br>C’est plus qu'un simple spectacle, c'est une expérience
                  interactive où les spectateurs sont invités à participer activement à leur propre découverte.
                  Dès les premières minutes, le public est emporté dans un univers dynamique et engageant.
                  <br>Abujad guide le déroulement de la soirée, alternant entre des présentations inspirantes,
                  des discussions stimulantes et des exercices pratiques.
                </p>
              </div>
              <div class="mt-4">
                <a href="#form" type="button"
                  class="rounded-md hover:bg-white flex justify-center p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 scroll-smooth">Résérvez
                  Maintenant</a>
              </div>
            </div>
            <div class="flex justify-center">
              <img src="images/promo.jpg" alt="Product screenshot"
                class="w-full max-w-none shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0" width="80%"
                height="100%">
            </div>
            <div class="mt-4">
              <a href="#form" type="button"
                class="rounded-md hover:bg-white flex justify-center p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:block md:hidden lg:hidden xl:hidden">Résérvez
                Maintenant</a>
            </div>
          </div>
        </div>
      </div>
      <div class="overflow-hidden bg-black py-14 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="flex justify-center">
              <div>
                <video controls width="447" height="795" title="BestOf" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" poster="images/clip03.webp" allowfullscreen>
                  <source src="images/bestof.mp4" type="video/mp4">
                </video>
              </div>
            </div>
            <div>
              <div class="lg:pr-8 lg:pt-4">
                <div class="lg:max-w-lg">
                  <p
                    class="text-3xl border-l-4 border-red-600 pl-4 font-bold tracking-tight text-gray-100 sm:text-5xl underline underline-offset-auto">
                    BEST OF TSTAHEL TNJEH</p>
                  <p class="mt-6 text-lg leading-8 text-gray-300">La vidéo offre un aperçu captivant des moments
                    forts du spectacle d'Abdellah Abujad sur l'orientation professionnelle et supérieure. <br>
                    Les spectateurs sont immergés dans une expérience dynamique, avec des présentations percutantes,
                    des conseils pratiques. <br>Abdellah Abujad partage son expertise avec passion, guidant le public
                    à travers un voyage de découverte de carrière. Les moments les plus mémorables incluent des
                    discussions animées sur les défis et les opportunités du marché du travail, des sessions
                    interactives sur le développement personnel et des réflexions profondes sur l'avenir professionnel.
                    <br>
                    Cette vidéo capture l'énergie et l'enthousiasme du spectacle d'Abdellah Abujad, offrant aux
                    spectateurs
                    une source d'inspiration et de motivation pour leur propre parcours professionnel.
                  </p>
                  <div class="mt-4">
                    <a href="#form" type="button"
                      class="rounded-md hover:bg-white flex justify-center p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 scroll-smooth">Résérvez
                      Maintenant</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overflow-hidden bg-black py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <p
                  class="sm:mt-40 text-3xl border-l-4 border-red-600 pl-4 font-bold tracking-tight text-gray-100 sm:text-5xl underline underline-offset-auto">
                  Pourquoi devriez-vous
                  assister</p>
                <p class="mt-6 text-lg leading-8 text-gray-300">L'objectif de ce spectacle est d'aider les
                  participants
                  à mieux se connaître et à explorer leurs aspirations professionnelles grâce à des activités
                  interactives.<br>
                  En les guidant à travers des exercices pratiques et des discussions, nous visons à leur fournir les
                  outils nécessaires pour prendre des décisions éclairées concernant leur orientation universitaire
                  et professionnelle.</p>
              </div>
              <div class="mt-4">
                <a href="#form" type="button"
                  class="rounded-md hover:bg-white flex justify-center p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 scroll-smooth">Résérvez
                  Maintenant</a>
              </div>
            </div>
            <img src="images/10ans.webp" alt="Product screenshot"
              class="w-full max-w-none shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0" width="80%"
              height="100%">
          </div>
          <div class="mt-4">
            <a href="#form" type="button"
              class="rounded-md hover:bg-white flex justify-center p-3 mt-8 text-sm font-semibold hover:text-red-600 shadow-sm text-white bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:block md:hidden lg:hidden xl:hidden">Résérvez
              Maintenant</a>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
          <div class="splide slider1 w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <section class="splide__track" aria-label="Splide Basic HTML Example">
              <div
                class="splide__list h-full flex lg:gap-2 md:gap-2 gap-4 items-center justify-start transition ease-out duration-700">
                <div class="splide__slide h-[500px] w-[800px] flex relative">
                  <img src="images/clip01.webp" alt="black chair and white table"
                    class="object-cover object-center w-full" height="10%" />
                </div>
                <div class="splide__slide h-[500px] flex relative">
                  <img src="images/clip02.webp" alt="sitting area" class="object-cover object-center w-full"
                    height="10%" />
                </div>
                <div class="splide__slide h-[500px] flex relative">
                  <img src="images/clip03.webp" alt="sitting area" class="object-cover object-center w-full"
                    height="10%" />
                </div>
                <div class="splide__slide h-[500px] flex relative">
                  <img src="images/clip05.webp" alt="sitting area" class="object-cover object-center w-full"
                    height="10%" />
                </div>
                <div class="splide__slide h-[500px] flex relative">
                  <img src="images/clip06.webp" alt="black chair and white table"
                    class="object-cover object-center w-full" height="10%" />
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <div class="splide slider2 bg-black py-6 sm:pb-6 sm:pt-8 xl:pb-16">
        <div class="splide__track bg-gradient-to-r from-[#000E44] to-[#00061C] xl:pb-0">
          <div class="splide__list">
            <div class="splide__slide py-24">
              <div
                class="mx-auto bg-gradient-to-r from-[#000E44] to-[#00061C] flex max-w-7xl flex-col items-center gap-x-8 px-6 lg:px-8 xl:flex-row xl:items-stretch">
                <div>
                  <div class="">
                    <img src="images/1.webp" alt="Product screenshot"
                      class="w-full max-w-none rounded rounded-lg shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0"
                      width="80%" height="100%">
                  </div>
                </div>
                <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:px-16 xl:py-24">
                  <figure class="relative isolate pt-6 sm:pt-12">
                    <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                      class="absolute left-0 top-0 -z-10 h-32 stroke-white/20">
                      <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                        d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                      <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                    </svg>
                    <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
                      <p>Je tiens à partager mon expérience après avoir assisté au spectacle sur l'orientation
                        professionnelle et les études supérieures le 1er mars. En tant qu'étudiante déterminée à
                        réussir, cet événement a été une véritable révélation pour moi.

                        Le spectacle était exceptionnel! Il nous a donné des conseils pratiques et des stratégies
                        précieuses pour réussir dans notre future carrière. En tant que jeune diplômée en devenir,
                        j'ai
                        trouvé ces conseils extrêmement utiles pour me préparer à intégrer le monde professionnel.</p>
                    </blockquote>
                  </figure>
                </div>
              </div>
            </div>
            <div class="splide__slide py-24">
              <div
                class="mx-auto bg-gradient-to-r from-[#000E44] to-[#00061C] flex max-w-7xl flex-col items-center gap-x-8 px-6 lg:px-8 xl:flex-row xl:items-stretch">
                <div>
                  <div class="">
                    <img src="images/6.webp" alt="Product screenshot"
                      class="w-full max-w-none rounded rounded-lg shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0"
                      width="80%" height="100%">
                  </div>
                </div>
                <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:px-16 xl:py-24">
                  <figure class="relative isolate pt-6 sm:pt-12">
                    <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                      class="absolute left-0 top-0 -z-10 h-32 stroke-white/20">
                      <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                        d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                      <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                    </svg>
                    <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
                      <p>Le spectacle a été une révélation pour moi! J'ai réalisé que plusieurs actions que je
                        faisais instinctivement avaient en réalité une vraie valeur, mais je ne m'en rendais
                        pas compte auparavant. Grâce à cette prise de conscience, j'ai maintenant une meilleure
                        compréhension de leur importance et de leur impact. Cela m'a motivé à explorer de
                        nouvelles voies et à saisir les opportunités qui se présentent.</p>
                    </blockquote>
                  </figure>
                </div>
              </div>
            </div>

            <div class="splide__slide py-24">
              <div
                class="mx-auto bg-gradient-to-r from-[#000E44] to-[#00061C] flex max-w-7xl flex-col items-center gap-x-8 px-6 lg:px-8 xl:flex-row xl:items-stretch">
                <div>
                  <div class="">
                    <img src="images/5.webp" alt="Product screenshot"
                      class="w-full max-w-none rounded rounded-lg shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0"
                      width="80%" height="100%">
                  </div>
                </div>
                <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:px-16 xl:py-24">
                  <figure class="relative isolate pt-6 sm:pt-12">
                    <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                      class="absolute left-0 top-0 -z-10 h-32 stroke-white/20">
                      <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                        d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                      <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                    </svg>
                    <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
                      <p>J'ai assisté au spectacle sur l'orientation professionnelle et les études supérieures
                        organisé
                        par AbuJad, et j'ai été vraiment impressionné! En tant qu'étudiant, j'ai trouvé cet évènement
                        très instructif.
                        Je souhaite vraiment que ABUJAD continue à organiser d'autres spectacles sur ce sujet. Cela
                        nous
                        aidera à mieux comprendre nos options futures et à prendre des décisions éclairées pour notre
                        carrière.</p>
                    </blockquote>
                  </figure>
                </div>
              </div>
            </div>

            <div class="splide__slide py-24">
              <div
                class="mx-auto bg-gradient-to-r from-[#000E44] to-[#00061C] flex max-w-7xl flex-col items-center gap-x-8 px-6 lg:px-8 xl:flex-row xl:items-stretch">
                <div>
                  <div class="">
                    <img src="images/3.webp" alt="Product screenshot"
                      class="w-full max-w-none rounded rounded-lg shadow-xl ring-1 ring-gray-400/10 sm:w-full md:-ml-4 lg:-ml-0"
                      width="80%" height="100%">
                  </div>
                </div>
                <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:px-16 xl:py-24">
                  <figure class="relative isolate pt-6 sm:pt-12">
                    <svg viewBox="0 0 162 128" fill="none" aria-hidden="true"
                      class="absolute left-0 top-0 -z-10 h-32 stroke-white/20">
                      <path id="b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb"
                        d="M65.5697 118.507L65.8918 118.89C68.9503 116.314 71.367 113.253 73.1386 109.71C74.9162 106.155 75.8027 102.28 75.8027 98.0919C75.8027 94.237 75.16 90.6155 73.8708 87.2314C72.5851 83.8565 70.8137 80.9533 68.553 78.5292C66.4529 76.1079 63.9476 74.2482 61.0407 72.9536C58.2795 71.4949 55.276 70.767 52.0386 70.767C48.9935 70.767 46.4686 71.1668 44.4872 71.9924L44.4799 71.9955L44.4726 71.9988C42.7101 72.7999 41.1035 73.6831 39.6544 74.6492C38.2407 75.5916 36.8279 76.455 35.4159 77.2394L35.4047 77.2457L35.3938 77.2525C34.2318 77.9787 32.6713 78.3634 30.6736 78.3634C29.0405 78.3634 27.5131 77.2868 26.1274 74.8257C24.7483 72.2185 24.0519 69.2166 24.0519 65.8071C24.0519 60.0311 25.3782 54.4081 28.0373 48.9335C30.703 43.4454 34.3114 38.345 38.8667 33.6325C43.5812 28.761 49.0045 24.5159 55.1389 20.8979C60.1667 18.0071 65.4966 15.6179 71.1291 13.7305C73.8626 12.8145 75.8027 10.2968 75.8027 7.38572C75.8027 3.6497 72.6341 0.62247 68.8814 1.1527C61.1635 2.2432 53.7398 4.41426 46.6119 7.66522C37.5369 11.6459 29.5729 17.0612 22.7236 23.9105C16.0322 30.6019 10.618 38.4859 6.47981 47.558L6.47976 47.558L6.47682 47.5647C2.4901 56.6544 0.5 66.6148 0.5 77.4391C0.5 84.2996 1.61702 90.7679 3.85425 96.8404L3.8558 96.8445C6.08991 102.749 9.12394 108.02 12.959 112.654L12.959 112.654L12.9646 112.661C16.8027 117.138 21.2829 120.739 26.4034 123.459L26.4033 123.459L26.4144 123.465C31.5505 126.033 37.0873 127.316 43.0178 127.316C47.5035 127.316 51.6783 126.595 55.5376 125.148L55.5376 125.148L55.5477 125.144C59.5516 123.542 63.0052 121.456 65.9019 118.881L65.5697 118.507Z" />
                      <use href="#b56e9dab-6ccb-4d32-ad02-6b4bb5d9bbeb" x="86" />
                    </svg>
                    <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
                      <p>Le spectacle était parfait! Il nous a enseigné plusieurs choses importantes,
                        notamment les critères pour bien s'orienter dans un domaine précis. J'ai trouvé
                        ces conseils très pertinents et utiles pour prendre des décisions éclairées concernant
                        mon avenir professionnel</p>
                    </blockquote>
                  </figure>
                </div>
              </div>
            </div>

          </div>
        </div>
    </main>
    <footer class="bg-black mx-auto mt-32 w-full max-w-container px-4 sm:px-6 lg:px-8 flex justify-center">
      <div class="py-10 items-center justify-center">
        <div class="flex items-center justify-center">
          <img src="logoabujad.png" class="flex items-center justify-center" width="80" alt="">
        </div>
        <p class="mt-5 text-center text-sm leading-6 text-slate-300">© <!-- -->2024<!-- --> Abujad. All rights
          reserved.</p>
        <!-- <div class="mt-16 flex items-center justify-center space-x-4 text-sm font-semibold leading-6 text-slate-200"><a
            href="/privacy-policy" previewlistener="true">Privacy policy</a>
          <div class="h-4 w-px bg-slate-300/20"></div><a href="/changelog" previewlistener="true">Changelog</a>
        </div> -->
      </div>
      <script src="jquery.min.js"></script>
      <script src="owlcarousel/owl.carousel.min.js"></script>
    </footer>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.3.3/js/intlTelInput-jquery.js"
    integrity="sha512-nqIIufL6zArBNYY3DE+/7rHWQ5UaI3U/K/yG4C/hbP+euJyhO19/7NV8dcZlz6ZuCmlLjZLAm134xmPLtO6nuw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    const phoneInputField = document.querySelector("#numero_whatsapp");
    const phoneInput = window.intlTelInput(phoneInputField, {
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      nationalMode: false,
      preferredCountries: ["ma"]
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <script src="./splide-extension-auto-scroll.js"></script>
  <script>
    const splide = new Splide('.splide.slider1', {
      type: 'loop',
      focus: 1,
      perPage: 3,
      autoplay: true,
      interval: 2000,
      autoScroll: {
        speed: 2,
      },
    }).mount();


    const splide2 = new Splide('.splide.slider2', {
      type: 'loop',
      focus: 1,
      perPage: 1,
      autoplay: true,
      interval: 2000,
      autoScroll: {
        speed: 2,
      },
    }).mount();


    splide.mount();

    splide2.mount();
  </script>
</body>

</html>