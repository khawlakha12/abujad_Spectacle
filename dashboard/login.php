<?php
    include_once '../include/mysql.php';
    session_start();
    
    if (isset($_SESSION['logged'])){
        header('Location: home.php');
    }

    if (isset($_POST['user'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $database = new Connection();
        $db = $database->openConnection();
        $sql = $db->prepare("SELECT * FROM admin WHERE user=?");
        $sql->bindParam(1, $username, PDO::PARAM_STR);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if (sha1($password) == $row['pass']) {
                $_SESSION['logged'] = $username;
                header('Location: ./home.php');
            } else {
                echo "Nom d'utilisateur ou mot de passe erroné.";
            }
        }
    }
?>