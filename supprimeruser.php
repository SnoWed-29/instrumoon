<?php 
require_once 'include/database.php';
$id = $_GET['id'];
try {
    // Update the associated rows in the facture table
    $updateQuery = $pdo->prepare('UPDATE facture SET id_user = NULL WHERE id_user = ?');
    $updateQuery->execute([$id]);

    // Delete the user from the userlogin table
    $deleteQuery = $pdo->prepare('DELETE FROM userlogin WHERE id_user = ?');
    $deleteQuery->execute([$id]);

    header('Location: manageuser.php');
} catch (PDOException $e) {
    // Handle any potential database errors
    echo "Error deleting user: " . $e->getMessage();
}


?>