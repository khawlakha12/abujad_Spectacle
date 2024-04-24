<?php
require_once '../include/mysql.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])) {
        $id = $_POST['id'];
        $field = $_POST['field'];
        $value = $_POST['value'];

        // Update database with new value
        $database = new Connection();
        $db = $database->openConnection();
        
        switch ($field) {
            case 'tickets_payes':
                $sql = $db->prepare("UPDATE spectacle_form SET Tickets_Payes = :value WHERE id = :id");
                break;
            case 'nbr_tickets':
                $sql = $db->prepare("UPDATE spectacle_form SET Nbr_Tickets = :value WHERE id = :id");
                break;
            default:
                echo "Invalid field";
                exit;
        }

        $sql->bindParam(':value', $value, PDO::PARAM_STR);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $sql->execute();

        if ($result) {
            echo ucfirst($field) . " updated successfully";
        } else {
            echo "Failed to update " . ucfirst($field);
        }

        $database->closeConnection();
    } else {
        echo "Missing parameters";
    }
} else {
    echo "Invalid request method";
}
?>
