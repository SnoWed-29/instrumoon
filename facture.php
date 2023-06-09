<?php
    // header("Location: facture.php?q=$itemQ&total=$totalePrice&item=$itemId&user=$userId");
	$factureQuantite = $_GET['q'];
	$facturetotal = $_GET['total'];
	$factureItem = $_GET['item'];
	$factureUser = $_GET['user'];
	$factureItemName = $_GET['itemName'];
	
    include 'include/header.php';
    include 'include/topNav.php';
    include 'include/mainNav.php';

    include 'include/database.php';    
    $facQuery = "SELECT * FROM facture WHERE id_user = ? and prix_total = ? and quantite = ? and id_produit = ?";
    $qPrepare = $pdo->prepare($facQuery);
    $qPrepare->execute([$factureUser,$facturetotal,$factureQuantite,$factureItem]);
    $facData = $qPrepare->fetch(PDO::FETCH_OBJ);
    $buyerName = $_SESSION['utilisateur']['name'];

    $query = "SELECT * FROM userlogin WHERE name = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$buyerName]);
    $userData = $stmt->fetch(PDO::FETCH_OBJ);
    $buyerId = $userData->id_user;	

    $userCarte = "SELECT * FROM facture WHERE id_user = ?";
	$cartePrepare = $pdo->prepare($userCarte);
    $cartePrepare->execute([$factureUser]);
    $facCarte = $cartePrepare->fetch(PDO::FETCH_OBJ);

    // permission 
    if($connecte == false){
        header('location: connexion.php');
    }
    // end permission

?>
<pre>
	<?php //var_dump($facCarte);?>
</pre>
<div class="card" style="width: 80%">
    <div class="card-body mx-4">
        <div class="container">
            <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
            <div class="row">

                <ul class="list-unstyled">
                    <li class="text-black" style="text-transform: uppercase;"><?php echo $userData->name;?></li>
                    <li class="text-muted mt-1"><span class="text-black">Facture N° </span> #<?php echo $facData->id?>
                    </li>
                    <li class="text-black mt-1"><?php echo $facData->date_creation?></li>
                </ul>
                <div class="col-xl-8">
                    <p class="font-weight-bold">Produit</p>
                </div>
                <div class="col-xl-2">
                    <p class="font-weight-bold">Quantite</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end font-weight-bold">
                        Prix Total
                    </p>
                </div>
                <hr>
                <div class="col-xl-8">
                    <p><?php echo $factureItemName?></p>
                </div>
                <div class="col-xl-2">
                    <p><?php echo $factureQuantite?></p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">
                        <?php echo ($facturetotal/$factureQuantite);?>
                    </p>
                </div>
                <hr>
            </div>
            <div class="row text-black">

                <div class="col-xl-12">
                    <p class="float-end fw-bold">Total: <?php echo $facturetotal ?>
                    </p>
                </div>
                <hr style="border: 2px solid black;">
            </div>
        </div>
    </div>
</div>
<!--
<?php 
			//foreach($facCarte as $facCartes){
				?>
					<hr>
        <div class="col-xl-10">
          <p><?php //echo $factureItemName?></p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">
			<?php //echo ($facturetotal/$factureQuantite);?>
          </p>
        </div>
        <hr>
				<?php
			//}
		?>
-->