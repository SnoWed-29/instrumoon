<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
      include 'include/header.php';
    ?>
</head>
<body>
  
  
    <header>
      <?php 
        include 'include/topNav.php';
      include 'include/mainNav.php';
      ?>
      
    </header>
    <section class="gcontainer" style="margin-bottom: 14px;">
        <div class="row">
          <div class="title-page">   
          <a><img src="media/logo.png" style="height: 85px;" alt="logo"></a>
            <h2 class="titre colorC">Pianos</h2> 
          </div>
    <div class="col-sm-3 leftList">
        <div class="col-sm-12 options">
            <ul>
                <li><a href="#"id="mainOption" ><h3>CATEGORIES</h3></a></li>
                <li><a href="#" >Accessoires classique</a></li>
                <li><a href="#" >Accessoires Clavier</a></li>
                <li><a href="#" >Accessoires LP</a></li>
                <li><a href="#" >Accessoires Rare</a></li>
                <li><a href="#" >Accessoires Strings</a></li>
            </ul>
        </div>
        <div class="col-sm-12 options">
            <form>
                <h3>Filtrer Par </h3>
                <h5>Disponibilité</h5>
                <label><p>En Stock</p></label>
                <input type="checkbox" class="form-check-input" name="stock" ><br>
                <label><p>Sur Commande</p></label>
                <input type="checkbox" class="form-check-input" name="stock" ><br>
                <div class="dropdown">
                    <button class="btn dropdown-toggle btnDrop" type="button" data-toggle="dropdown">Marque
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Jackson </a></li>
                        <li><a href="#">Fender</a></li>
                        <li><a href="#">LesPaul</a></li>
                        <li><a href="#">IBANEZ</a></li>
                        <li><a href="#">Epiphone</a></li>
                        <li><a href="#">J&D Brothers</a></li>
                    </ul>
                  </div><br>
                  
                <h5>Catégories</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Pianos classique 
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Pianos 34
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Pianos 64
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Pianos 22
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Pianos proffessional
                      </label>
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Clavier Midi 
                      </label>
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
    
                  </div>
            </form>
        </div>
    </div>
        <div class="col-sm-9 rightList">
            <?php 
                require_once 'include/database.php';
                $produits = $pdo->query('SELECT * FROM produit WHERE id_categorie=3')->fetchAll(PDO::FETCH_ASSOC);
                foreach($produits as $produit){
                  ?> 
                <div class="col-sm-2 card">
                  <img class="imgcard" src="./upImg/<?php echo $produit['produit_image']?>" alt="instrument" >
                  <h1><?php echo $produit['produit_libelle'] ?></h1>
                  <p class="price"><?php echo $produit['produit_prix'] ?>dh</p>
                  <p><a href="product.php?id=<?php echo $produit['id_produit'] ?>"><button>Achetez-le</button></a></p>
                </div>
                  <?php
                }
            ?>
        </div>
    </section>
    <footer>
      <div class="container">
        <div class="row borderC justify-content-center">
          <img src="media/visa-mastercard.png" alt="visamastercard" >
          <img src="media/wafasalaf.png" alt="wafasalaf" >
        </div>
        <div class="row wrapper">
          <div class="col-sm-3 footerInfo">
            <h2>Produit</h2>
            <ul>
              <li>Meilleur Produit</li>
              <li>Nouveaux Produit</li>
              <li>Instrumoon Pack</li>
            </ul>
          </div>
          <div class="col-sm-3 footerInfo" style="border-right: 2px solid black">
            <h2>Produit</h2>
            <ul>
              <li>Meilleur Produit</li>
              <li>Nouveaux Produit</li>
              <li>Instrumoon Pack</li>
            </ul>
          </div>
          <div class="col-sm-6 information">
            <h2>Information</h2>
            <p>
              Instrumoon<br>
              Casablanca : Abdlemomne<br>
              Morocco <br>
              Appelez-nous : 0522232425 - 0631382069<br>
              Écrivez-nous : contact@instrumoon.com
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <p class="text-sm-left" style="font-size: 10px;margin: 0;">
          © INSTRUMOON | WebSite By Haitham Dihaji
        </p>
      </div>
    </footer>

    
     <script src="index.js"></script>
  </body>
</html>