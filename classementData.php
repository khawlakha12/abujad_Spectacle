<?php
include './include/mysql.php';

try {
    $database = new Connection();
    $db = $database->openConnection();
    $db->exec("set names utf8");


    $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

    $sql = $db->prepare("SELECT ranking, label from ranking ORDER BY ranking DESC LIMIT $limit");
    $sql->execute();

    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

    $database->closeConnection();

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
