<?php

session_start();


require_once '../include/mysql.php';
require_once '../include/fonctions.php';


if (!isset($_SESSION['logged'])) {
    header('Location: 404');
}



$database = new Connection();
$db = $database->openConnection();
$sql = $db->prepare("SELECT * FROM spectacle_form ORDER BY id DESC");
$row = $sql->execute();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['tickets_payes'])) {
        $id = $_POST['id'];
        $tickets_payes = $_POST['tickets_payes'];

        // Update database with new value
        $database = new Connection();
        $db = $database->openConnection();
        $sql = $db->prepare("UPDATE spectacle_form SET Tickets_Payes = :tickets_payes WHERE id = :id");
        $sql->bindParam(':tickets_payes', $tickets_payes, PDO::PARAM_STR);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $sql->execute();

        if ($result) {
            echo "Tickets_Payes updated successfully";
        } else {
            echo "Failed to update Tickets_Payes";
        }

        $database->closeConnection();
    }
}

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
            class="flex justify-center items-center h-16 px-4 border-b bg-white shrink-0 md:px-6 sticky absolute z-10 top-0">
            <nav
                class="flex-row gap-12 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:gap-6">
                <a class="text-gray-500 dark:text-gray-400" href="./">
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
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="grid grid-cols-2 gap-4 rounded-lg border bg-card text-card-foreground shadow-sm bg-white"
                    data-v0-t="card">
                    <!-- Total Spectacle Forms -->
                    <div class="border-r">
                        <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                            <h3 class="tracking-tight text-sm font-medium">Nombre de demandes totales</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 text-gray-500 dark:text-gray-400">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div class="p-6">
                            <div class="text-2xl font-bold">+
                                <?php echo getAllSpectacleForms(); ?>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Demandes complétées</p>
                        </div>
                    </div>

                    <!-- Daily Spectacle Forms -->
                    <div>
                        <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                            <h3 class="tracking-tight text-sm font-medium">Nombre de demandes ce jour</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 text-gray-500 dark:text-gray-400">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div class="p-6">
                            <div class="text-2xl font-bold">+
                                <?php echo getDailySpectacleForms(); ?>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Demandes complétées</p>
                        </div>
                    </div>
                </div>


                <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
                    <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                        <h3 class="tracking-tight text-sm font-medium">Nombre de Bacheliers</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="text-2xl font-bold">+
                            <?php echo $bachelierCount; ?>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Bachelier(e)s</p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
                    <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                        <h3 class="tracking-tight text-sm font-medium">Nombre d'Etudiants</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="text-2xl font-bold">+
                            <?php echo $etudiantCount; ?>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Etudiant(e)s</p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
                    <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                        <h3 class="tracking-tight text-sm font-medium">Nombre de Diplomé(e)s</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="text-2xl font-bold">+
                            <?php echo $diplomeCount; ?>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Diplomé(e)s</p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
                    <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                        <h3 class="tracking-tight text-sm font-medium">Nombre de Salarié(e)s</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="text-2xl font-bold">+
                            <?php echo $salarieCount; ?>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Parents</p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
                    <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                        <h3 class="tracking-tight text-sm font-medium">Nombre de Parents</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-gray-500 dark:text-gray-400">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="text-2xl font-bold">+
                            <?php echo $parentCount; ?>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Parents</p>
                    </div>
                </div>
            </div>
            <div class="flex min-h-[calc(100vh-_theme(spacing.16))] flex-1 flex-col gap-4 md:gap-8">
                <?php
                if (isset($_GET['id'])) {
                    $rows = getSpectacleInfos($_GET['id']);
                    ?>
                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-6 sm:px-6">
                            <h3 class="text-base font-semibold leading-7 text-gray-900">Informations</h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Détails de la demande.</p>
                        </div>
                        <div class="border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <?php
                                foreach ($rows as $row) {
                                    ?>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Date de soumission</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['dates']) ?>
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Nom complet</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Nom']) ?>
                                            <?= htmlspecialchars($row['Prenom']) ?>
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Tickets Demandés</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Nbr_Tickets']) ?>
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Tickets Payés</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Tickets_Payes']) ?>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Age</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Age']) ?> ans
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Adresse e-mail</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Email']) ?>
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Téléphone</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <a href="https://wa.me/<?= htmlspecialchars($numero_whatsapp) ?>" target="_blank" rel="noopener noreferrer">
                                                rel="noopener noreferrer">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                                                    viewBox="0 0 48 48">
                                                    <path fill="#fff"
                                                        d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                                                    </path>
                                                    <path fill="#fff"
                                                        d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                                                    </path>
                                                    <path fill="#cfd8dc"
                                                        d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                                                    </path>
                                                    <path fill="#40c351"
                                                        d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                                                    </path>
                                                    <path fill="#fff" fill-rule="evenodd"
                                                        d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                            <?=trim( htmlspecialchars($row['Numero_Whatsapp'])) ?>
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Ville du Spectacle</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?= htmlspecialchars($row['Ville_Spectacle']) ?>
                                        </dd>
                                    </div>


                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Etudiant(e)</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?php
                                            if ($row['Etudiant'] === 0 || empty($row['Etudiant'])) {
                                                echo 'Non';
                                            } else {
                                                echo 'Oui';
                                            }
                                            ?>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Bachelier(e)</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?php
                                            if ($row['Bachelier'] === 0 || empty($row['Bachelier'])) {
                                                echo 'Non';
                                            } else {
                                                echo 'Oui';
                                            }
                                            ?>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Parent</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?php
                                            if ($row['Parent'] === 0 || empty($row['Parent'])) {
                                                echo 'Non';
                                            } else {
                                                echo 'Oui';
                                            }
                                            ?>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Salarié</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?php
                                            if ($row['Salarie'] === 0 || empty($row['Salarie'])) {
                                                echo 'Non';
                                            } else {
                                                echo 'Oui';
                                            }
                                            ?>
                                        </dd>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-900">Diplomée</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            <?php
                                            if ($row['Diplome'] === 0 || empty($row['Diplome'])) {
                                                echo 'Non';
                                            } else {
                                                echo 'Oui';
                                            }
                                            ?>
                                        </dd>
                                    </div>
                                    <?php
                                }
                                ?>
                            </dl>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm mt-4 bg-white" data-v0-t="card">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <h3 class="tracking-tight text-sm font-medium">Liste des demandes</h3>
                            </div>
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <a class="p-2 bg-indigo-600 tracking-tight text-sm font-medium text-white rounded round-lg"
                                    href="eventprospect">Ajouter un formulaire</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="relative w-full overflow-auto">
                                <table class="w-full caption-bottom text-sm">
                                    <thead class="[&amp;_tr]:border-b">
                                        <tr
                                            class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                            <th
                                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[100px]">
                                                Nom complet
                                            </th>
                                            <th
                                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                                Numéro de téléphone
                                            </th>
                                            <th
                                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                                Email
                                            </th>
                                            <th
                                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                                Tickets Demandés
                                            </th>
                                            <th
                                                class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                                Tickets Payés
                                            </th>
                                            <th
                                                class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                                                Afficher la demande
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="[&amp;_tr:last-child]:border-0">
                                        <?php
                                        $rows = getSpectacleForm();
                                        foreach ($rows as $row) {
                                            ?>
                                            <tr
                                                class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">
                                                    <?= $row['Nom'] ?>
                                                    <?= $row['Prenom'] ?>
                                                </td>
                                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                                    <a href="https://wa.me/<?= trim($row['Numero_Whatsapp'], '+') ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25"
                                                            height="25" viewBox="0 0 48 48">
                                                            <path fill="#fff"
                                                                d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                                                            </path>
                                                            <path fill="#fff"
                                                                d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                                                            </path>
                                                            <path fill="#cfd8dc"
                                                                d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                                                            </path>
                                                            <path fill="#40c351"
                                                                d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                                                            </path>
                                                            <path fill="#fff" fill-rule="evenodd"
                                                                d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                    <?= $row['Numero_Whatsapp'] ?>
                                                </td>
                                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                                    <?= $row['Email'] ?>
                                                </td>
                                                <td class="p-4 align-middle relative">
                                                    <input type="number"
                                                        class="border rounded-md px-3 py-1 w-20 mr-2 text-sm focus:outline-none focus:border-blue-500"
                                                        value="<?= $row['Nbr_Tickets'] ?>" data-id="<?= $row['id'] ?>"
                                                        data-field="nbr_tickets">
                                                    <button
                                                        class="save-btn hidden bg-green-500 text-white px-3 py-1 rounded-md text-sm absolute right-0 top-1/2 transform -translate-y-1/2"
                                                        data-id="<?= $row['id'] ?>" data-field="nbr_tickets">Save</button>
                                                </td>
                                                <td class="p-4 align-middle relative">
                                                    <input type="number"
                                                        class="border rounded-md px-3 py-1 w-20 mr-2 text-sm focus:outline-none focus:border-blue-500"
                                                        value="<?= $row['Tickets_Payes'] ?>" data-id="<?= $row['id'] ?>"
                                                        data-field="tickets_payes">
                                                    <button
                                                        class="save-btn hidden bg-green-500 text-white px-3 py-1 rounded-md text-sm absolute right-0 top-1/2 transform -translate-y-1/2"
                                                        data-id="<?= $row['id'] ?>" data-field="tickets_payes">Save</button>
                                                </td>


                                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"><a
                                                        href="./event.php?id=<?= $row['id'] ?>">Afficher</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>
    <script>
        document.querySelectorAll('input[data-field]').forEach(item => {
            item.addEventListener('input', function () {
                const id = this.dataset.id;
                const field = this.dataset.field;
                const newValue = this.value.trim();
                toggleSaveButton(id, field, newValue);
            });
        });

        function toggleSaveButton(id, field, newValue) {
            const saveBtn = document.querySelector(`.save-btn[data-id="${id}"][data-field="${field}"]`);
            if (newValue !== '') {
                saveBtn.classList.remove('hidden');
            } else {
                saveBtn.classList.add('hidden');
            }
        }

        document.querySelectorAll('.save-btn').forEach(item => {
            item.addEventListener('click', function () {
                const id = this.dataset.id;
                const field = this.dataset.field;
                const newValue = document.querySelector(`input[data-id="${id}"][data-field="${field}"]`).value.trim();
                updateField(id, field, newValue);
            });
        });

        function updateField(id, field, newValue) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_tickets_payes.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Hide save button after saving
                    const saveBtn = document.querySelector(`.save-btn[data-id="${id}"][data-field="${field}"]`);
                    saveBtn.classList.add('hidden');
                }
            };
            xhr.send('id=' + encodeURIComponent(id) + '&field=' + encodeURIComponent(field) + '&value=' + encodeURIComponent(newValue));
        }

    </script>

</body>

</html>