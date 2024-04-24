<?php
include_once 'include/mysql.php';

// Create a new Connection object
$connection = new Connection();

// Open the database connection
$pdo = $connection->openConnection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add this block for debugging
    echo "POST data received: <pre>";
    print_r($_POST);
    echo "</pre>";
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero_whatsapp = $_POST['numero_whatsapp'];
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
    echo "Etudiant: $etudiant, Bachelier: $bachelier, Parent: $parent, Salarie: $salarie, Diplome: $diplome";
    // Retrieve other fields similarly

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
            echo "Data inserted successfully.";
        } else {
            echo "Failed to insert data.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$connection->closeConnection();
?>
