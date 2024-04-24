<?php

session_start();


require_once '../include/mysql.php';
require_once '../include/fonctions.php';


if (!isset($_SESSION['logged'])){
  header('Location: 404');
}



$database = new Connection();
$db = $database->openConnection();
$sql = $db->prepare("SELECT * FROM demande ORDER BY dates DESC LIMIT 5");
$row = $sql->execute();

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
  <header class="flex justify-center items-center h-16 px-4 border-b bg-white shrink-0 md:px-6 sticky absolute top-0">
    <nav class="flex-row gap-12 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:gap-6">
      <a class="font-bold" href="/dashboard/home">
        Accueil
      </a>
      <a class="text-gray-500 dark:text-gray-400" href="demandes">
        Bourse
      </a>
      <a class="text-gray-500 dark:text-gray-400" href="event">
        Spectacle
      </a>
      <a class="text-gray-500 dark:text-gray-400" href="logout">
        Logout
      </a>
    </nav>
  </header>
  <main class="flex min-h-[calc(100vh-_theme(spacing.16))] flex-1 flex-col gap-4 p-4 md:gap-8 md:p-10">
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
      <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
        <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
          <h3 class="tracking-tight text-sm font-medium">Nombre de demandes totales</h3>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-4 h-4 text-gray-500 dark:text-gray-400"
          >
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="text-2xl font-bold">+<?php echo getAllTimeForms(); ?></div>
          <p class="text-xs text-gray-500 dark:text-gray-400">Demandes complétés</p>
        </div>
      </div>
      <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
        <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
          <h3 class="tracking-tight text-sm font-medium">Nombre de demandes cette semaine</h3>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-4 h-4 text-gray-500 dark:text-gray-400"
          >
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="text-2xl font-bold">+<?php echo getWeeklyForms(); ?></div>
          <p class="text-xs text-gray-500 dark:text-gray-400">Demandes complétés</p>
        </div>
      </div>
      <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white" data-v0-t="card">
        <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
          <h3 class="tracking-tight text-sm font-medium">Nombre de demandes ce jour</h3>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="w-4 h-4 text-gray-500 dark:text-gray-400"
          >
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="text-2xl font-bold">+<?php echo getDailyForms(); ?></div>
          <p class="text-xs text-gray-500 dark:text-gray-400">Demandes complétés</p>
        </div>
      </div>
    </div>
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm mt-4 bg-white" data-v0-t="card">
      <div class="flex flex-col space-y-1.5 p-6 pb-2">
        <h3 class="tracking-tight text-sm font-medium">Les 5 dernières demandes</h3>
      </div>
      <div class="p-6">
        <div class="relative w-full overflow-auto">
          <table class="w-full caption-bottom text-sm">
            <thead class="[&amp;_tr]:border-b">
              <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[100px]">
                  Nom complet
                </th>
                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                  Numéro de téléphone
                </th>
                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                  Email
                </th>
                <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                  Afficher la demande
                </th>
              </tr>
            </thead>
            <tbody class="[&amp;_tr:last-child]:border-0">
                <?php
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                ?>
              <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium"><?=$row['firstName']?> <?=$row['lastName']?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"><?=$row['phoneNumber']?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0"><?=$row['email']?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"><a href="./demandes.php?id=<?=$row['id']?>">Afficher</a></td>
              </tr>
              <?php
                    }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>
    </body>
</html>