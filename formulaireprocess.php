<?php

session_start();

require_once './include/mysql.php';


function formDecoder($etablissements){
  $database = new Connection();
  $db = $database->openConnection();
  foreach($etablissements as $etablissement){
      $sql = $db->prepare("UPDATE ranking SET ranking = ranking + 1 WHERE name = ?");
      $sql->bindParam(1, $etablissement, PDO::PARAM_STR);
      $sql->execute();
  }
  $database->closeConnection();
}



$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$dateNaissance = $_POST["dateNaissance"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$country = $_POST["country"];
$domaineSouhaite = implode(', ', $_POST["domaineSouhaite"]);
$etablissementPrefere = implode(', ', $_POST['etablissementPrefere']);
$anneeEtude = $_POST["anneeEtude"];
$dernierDiplome = $_POST["dernierDiplome"];


$uniqueIdentifier = uniqid();
$_SESSION['id'] = $uniqueIdentifier;

$database = new Connection();
$db = $database->openConnection();
$sql = $db->prepare("INSERT INTO demande(firstName, lastName, dateNaissance, gender, email, phoneNumber, country, domaineSouhaite, etablissementPrefere, dernierDiplome, anneeEtude, id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$sql->bindParam(1, $firstName, PDO::PARAM_STR);
$sql->bindParam(2, $lastName, PDO::PARAM_STR);
$sql->bindParam(3, $dateNaissance, PDO::PARAM_STR);
$sql->bindParam(4, $gender, PDO::PARAM_STR);
$sql->bindParam(5, $email, PDO::PARAM_STR);
$sql->bindParam(6, $phoneNumber, PDO::PARAM_STR);
$sql->bindParam(7, $country, PDO::PARAM_STR);
$sql->bindParam(8, $domaineSouhaite, PDO::PARAM_STR);
$sql->bindParam(9, $etablissementPrefere, PDO::PARAM_STR);
$sql->bindParam(10, $dernierDiplome, PDO::PARAM_STR);
$sql->bindParam(11, $anneeEtude, PDO::PARAM_STR);
$sql->bindParam(12, $uniqueIdentifier, PDO::PARAM_STR);
$sql->execute();



formDecoder($_POST['etablissementPrefere']);



?>