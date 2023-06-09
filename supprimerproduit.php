<?php
require_once 'include/database.php';
$id = $_GET['id_produit'];
try {
    // Update or delete associated rows in the facture table
    $updateQuery = $pdo->prepare('UPDATE facture SET id_produit = NULL WHERE id_produit = ?');
    $updateQuery->execute([$id]);

    // Delete the row from the produit table
    $deleteQuery = $pdo->prepare('DELETE FROM produit WHERE id_produit = ?');
    $deleteQuery->execute([$id]);

    header('Location: product_page.php');
} catch (PDOException $e) {
    // Handle any potential database errors
    echo "Error deleting product: " . $e->getMessage();
}
?>
