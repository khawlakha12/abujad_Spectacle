<?php
function formDecoder($etablissements){
    $database = new Connection();
    $db = $database->openConnection();
    foreach($etablissements as $etablissement){
        $sql = $db->prepare("UPDATE ranking SET ranking=ranking+1 WHERE name=$name");
        $sql->execute();
    }
    $database->closeConnection();
}
function getDemandes(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT * FROM demande ORDER BY dates DESC");
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    $database->closeConnection();
    return $rows;
}
function getDemandesInfos($id){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT * FROM demande WHERE id=?");
    $sql->bindParam(1, $id, PDO::PARAM_STR);
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function getAllTimeForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM demande");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}
function getWeeklyForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM demande WHERE WEEK(dates) = WEEK(CURRENT_DATE)");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}
function getDailyForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM demande WHERE DATE(dates) = CURDATE()");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}

function getSpectacleForm(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT * FROM spectacle_form ORDER BY id DESC");
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    $database->closeConnection();
    return $rows;
}

function getSpectacleInfos($id){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT * FROM spectacle_form WHERE id=?");
    $sql->bindParam(1, $id, PDO::PARAM_STR);
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllSpectacleForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM spectacle_form");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}

function getWeeklySpectacleForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM spectacle_form WHERE WEEK(dates) = WEEK(CURRENT_DATE)");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}
function getDailySpectacleForms(){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM spectacle_form WHERE DATE(dates) = CURDATE()");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}

function getCountByAttribute($attribute){
    $database = new Connection();
    $db = $database->openConnection();
    $sql = $db->prepare("SELECT COUNT(*) as count FROM spectacle_form WHERE $attribute = 1");
    $sql->execute();
    $count = $sql->fetchColumn();
    $database->closeConnection();
    return $count;
}

$etudiantCount = getCountByAttribute('Etudiant');
$bachelierCount = getCountByAttribute('Bachelier');
$parentCount = getCountByAttribute('Parent');
$salarieCount = getCountByAttribute('Salarie');
$diplomeCount = getCountByAttribute('Diplome');


?>