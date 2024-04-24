<?php

session_start();


require_once '../include/mysql.php';
require_once '../include/fonctions.php';


if (!isset($_SESSION['logged'])) {
    header('Location: 404');
}



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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col w-full min-h-screen bg-gray-100">
        <header
            class="flex justify-center items-center h-16 px-4 border-b bg-white shrink-0 md:px-6 sticky absolute top-0">
            <nav
                class="flex-row gap-12 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:gap-6">
                <a class="text-gray-500 dark:text-gray-400" href="dashboard/home">
                    Accueil
                </a>
                <a class="text-gray-500 dark:text-gray-400" href="demandes">
                    Bourse
                </a>
                <a class="font-bold" href="event">
                    Spectacle
                </a>
                <a class="text-gray-500 dark:text-gray-400" href="logout">
                    Logout
                </a>
            </nav>
        </header>
        <main class="flex min-h-[calc(100vh-_theme(spacing.16))] flex-1 flex-col gap-4 p-4 md:gap-8 md:p-10">
            <div class="flex bg-white rounded rounded-xl min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Formulaire de
                        Spectacle</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div>
                            <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <input id="nom" name="nom" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                            <div class="mt-2">
                                <input id="prenom" name="prenom" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="numero_whatsapp"
                                class="block text-sm font-medium leading-6 text-gray-900">Numéro WhatsApp</label>
                            <div class="mt-2">
                                <input id="numero_whatsapp" name="numero_whatsapp" type="tel" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="ville_spectacle" class="block text-sm font-medium leading-6 text-gray-900">Ville
                                du Spectacle</label>
                            <div class="mt-2">
                                <input id="ville_spectacle" name="ville_spectacle" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="nbr_tickets" class="block text-sm font-medium leading-6 text-gray-900">Tickets
                                Demandés</label>
                            <div class="mt-2">
                                <input id="nbr_tickets" name="nbr_tickets" type="number" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="tickets_payes" class="block text-sm font-medium leading-6 text-gray-900">Tickets
                                Payés</label>
                            <div class="mt-2">
                                <input id="tickets_payes" name="tickets_payes" type="number" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="age" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                            <div class="mt-2">
                                <input id="age" name="age" type="number" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900">Occupation</label>
                            <div class="my-2">
                                <div class="flex items-center">
                                    <input id="Etudiant" name="Etudiant" type="checkbox" value="1"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="Etudiant" class="ml-2 block text-sm text-gray-900">Étudiant</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input id="Bachelier" name="Bachelier" type="checkbox" value="1"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="Bachelier" class="ml-2 block text-sm text-gray-900">Bachelier</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input id="Parent" name="Parent" type="checkbox" value="1"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="Parent" class="ml-2 block text-sm text-gray-900">Parent</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input id="Salarie" name="Salarie" type="checkbox" value="1"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="Salarie" class="ml-2 block text-sm text-gray-900">Salarié</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input id="Diplome" name="Diplome" type="checkbox" value="1"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="Diplome" class="ml-2 block text-sm text-gray-900">Diplômé</label>
                                </div>
                            </div>
                        </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                </div>
                <?php if (!empty($submission_message)): ?>
                    <div class="text-sm text-center text-gray-700 mb-4"><?php echo $submission_message; ?></div>
                <?php endif; ?>
                </form>
            </div>
    </div>
    </main>
    </div>
</body>

</html>