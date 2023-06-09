<?php 
include 'include/header.php';
include 'include/topNav.php';
include 'include/mainNav.php';
?>

<?php 
require_once 'include/database.php';
$buyerName = $_SESSION['utilisateur']['name'];

    $query1 = "SELECT * FROM userlogin WHERE name = ?";
    $stmt1 = $pdo->prepare($query1);
    $stmt1->execute([$buyerName]);
    $userData = $stmt1->fetch(PDO::FETCH_OBJ);
    $buyerId = $userData->id_user;	

$itemId = $_GET['id'];
$itemQ = $_GET['q'];
$itemPrice = $_GET['p'];

// Sanitize inputs
$itemId = filter_var($itemId, FILTER_SANITIZE_NUMBER_INT);
$itemQ = filter_var($itemQ, FILTER_SANITIZE_NUMBER_INT);
$itemPrice = filter_var($itemPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Prepare and execute the query
$query = "SELECT * FROM produit WHERE id_produit = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$itemId]);
$produit = $stmt->fetch(PDO::FETCH_OBJ);

$totalePrice = $itemPrice * $itemQ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'include/database.php';

    // Assuming $itemId contains the valid id_produit value
    $itemId = filter_var($itemId, FILTER_SANITIZE_NUMBER_INT);

    $insertQuery = "INSERT INTO facture (quantite , prix_total,id_produit,id_user) VALUES (?,? , ?, ?)";
    $userId = $buyerId ; // Assuming 1 is a valid id_user value
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$itemQ,$totalePrice,$itemId, $userId]);
    header("Location: facture.php?q=$itemQ&total=$totalePrice&item=$itemId&user=$userId&itemName=$produit->produit_libelle");
   
} else {
    // Form has not been submitted yet
}
?>
<pre>
<?php ?>
</pre>

<section>
    <div class="container">
        <h1 class="mt-5">Detail de facture</h1>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $produit->produit_libelle; ?></td>
                    <td><?php echo $itemQ; ?></td>
                    <td><?php echo $itemPrice; ?></td>
                    <td><?php echo $totalePrice; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <h5>Total Amount: <?php echo $totalePrice; ?>Dh</h5>
        </div>
        <form method="post">
            <input name="valider" type="submit" class="btn btn-primary btn-lg btn-block mt-3" value="Valider L'achat">
        </form>
    </div>
</section>
