
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
      include 'include/header.php';
    ?>
</head>
<?php
include 'include/topNav.php';
include 'include/mainNav.php';

if (isset($_GET['id'])) {
  require_once 'include/database.php';
  $productId = $_GET['id'];
  $query = "SELECT * FROM produit WHERE id_produit = " . $productId;
  $produit = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
    ?> 
      <section class="container sectionItems">
        <div class="row contI">
        <div class="col-sm-6 LeftItem">
          <img src="./upImg/<?php echo $produit[0]->produit_image?>" id="imgItem" alt="" >
        </div>
        <div class="col-sm-6 rightItem">
          <h1><?php echo $produit[0]->produit_libelle ?></h1>
          <span><h3>Prix : <?php  echo $produit[0]->produit_prix?>DH</h3></span>
          <h3>Description :</h3>
          <p>
          <?php  echo $produit[0]->produit_description?>
          </p>
          <p><a href="confirma.php?id=<?php echo $produit[0]->id_produit ?>"><button>Add to Cart</button></a></p>          
        </div>
      </div>  
      <div class="row sectionDesc">
        <div class="col-sm-8 ">
          <h3>Détails de Produit</h3>
          <p>
            <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod.</h4><br>
            <b>Lorem ipsum dolor sit. :</b> Lorem ipsum dolor sit.<br>
            <b>Lorem ipsum dolor sit. :</b> Lorem  dolor sit.<br>
            <b> ipsum  sit. :</b> Lorem ipsum  sit.<br>
            <b>jpgefdt ipsum dolor sit. :</b> Lorem ipsum dolor sit.<br>
            <b> ipsum dolor sit. :</b> Lorem ipsum  sit.<br>
            <b>Lorem   . :</b> Lorem ipsum dolor sit.<br>
          </p>
        </div>
        <div class="col-sm-4 access">
          <h3>Accessoires</h3>
          <div class="row">
            <div class="col-sm-6">
              <div class="card accessCard">
                <img src="media/fender-squier-stratocaster-pack.jpg" class="card-img-top" alt="img">
                <div class="card-body">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                </div>
              </div>
              <div class="card accessCard">
                <img src="media/fender-squier-stratocaster-pack.jpg" class="card-img-top" alt="img">
                <div class="card-body">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
    <?php
    // Further processing based on the product ID
    // ...
} else {
    // No ID parameter provided, handle the error or redirect
    // ...
}
?>