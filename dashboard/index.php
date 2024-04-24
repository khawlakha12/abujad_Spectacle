<?php
session_start();
if (isset($_SESSION['logged'])){
	header ('location: home');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration</title>
    <link rel="stylesheet" type="text/css" href="./forms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
<div id="parent">
    <div class="child">
        <h1>Connexion</h1>
        <form action="login.php" method="POST">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="input" name="user">
            <label for="password">Mot de passe:</label>
            <input type="password" id="input" name="pass">
            <input type="submit" id="btn" value="Se connecter">
        </form>
    </div>
</div>


</body>
</html>
