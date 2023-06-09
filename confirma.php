<?php 
include 'include/header.php';
include 'include/topNav.php';
include 'include/mainNav.php';
if($connecte == false){
    header('location: connexion.php');
}

if (isset($_GET['id'])) {
  require_once 'include/database.php';
  $productId = $_GET['id'];
  $query = "SELECT * FROM produit WHERE id_produit = " . $productId;
  $produit = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
}

$q = isset($_POST['quantite']) ? $_POST['quantite'] : 1;

$totalPrice = isset($q) ? ($produit[0]->produit_prix * $q) : 0;
?>

<pre>
  <?php 
  // var_dump($produit);
  ?>
</pre>

<body>
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 border mx-2 shadow p-3 mb-5 bg-white rounded">
                    <h3 class="p-3 border-bottom">Panier</h3>
                    <div class="d-flex">
                        <div class="col-sm-3">
                            <img src="upimg/<?php echo $produit[0]->produit_image?>" class="img-fluid  img-thumbnail"
                                alt="produitImg">
                        </div>
                        <div class="col-sm-3 mx-2 d-flex flex-column justify-content-center">
                            <span class="pb-3"><?php echo $produit[0]->produit_libelle?></span>
                            <span class="pb-3 "><b><?php echo $produit[0]->produit_prix?> Dh </b></span>
                            <span class="pb-3 text-danger">Produit sur Commande .</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-center justify-content-between">
                            <div class="col-6 d-flex justify-content-center align-items-start">
                                <form method="post">
                                    <input type="number" min="1" class="form-control" name="quantite"
                                        onchange="updateTotal(this.value)">
                                </form>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-start">
                                <span class="" id="totalPrice"><?php echo $totalPrice ?> dh</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 border shadow p-3 mb-5 bg-white rounded p-4 ml-auto">
                    <div class="row pb-4">
                        <div class="col-sm-6 py-2 d-flex justify-content-start"><span>Prix Unitaire :</span></div>
                        <div class="col-sm-6 py-2 d-flex justify-content-end">
                            <span><?php echo $produit[0]->produit_prix ?> dh</span>
                        </div>
                    </div>
                    <label for="promo">
                        <p class="font-weight-light my-2">Avez vous un code promo ?</p>
                    </label>
                    <input type="text" name="promo" class="form-control mb-3">
                    <div class="d-flex justify-content-between border-top pt-2">
                        <span>Total TTC:</span>
                        <span id="totalTTC"><?php echo $totalPrice ?></span>
                    </div> 
                    <a id="continueLink"
                        href="achat.php?id=<?php echo $productId ?>&q=<?php echo $q ?>&p=<?php echo $produit[0]->produit_prix ?>"
                        class="btn btn-primary btn-lg btn-block mt-3">Continue</a>

                </div>
            </div>
        </div>
    </section>

    <script>
    function updateTotal(quantity) {
        const unitPrice = <?php echo $produit[0]->produit_prix ?>;
        if (quantity.trim() === '') {
            quantity = 1;
        }
        const total = unitPrice * quantity;
        document.getElementById("totalPrice").textContent = total;
        document.getElementById("totalTTC").textContent = total;

        // Update the link with the new quantity value
        const link = document.getElementById("continueLink");
        const href = link.getAttribute("href");
        const updatedHref = href.replace(/q=[^&]+/, "q=" + quantity);
        link.setAttribute("href", updatedHref);
    }
    </script>
</body>