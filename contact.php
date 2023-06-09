<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
      include 'include/header.php';
    ?>
</head>
<body id="body">
  
    <header><?php
        include 'include/topNav.php';
        include 'include/mainNav.php'; 
    ?>
    </header>
    <section>
      <div class="contact-container container">
        <form>
          <label>Nom Et Prenom  :</label><br>
          <input type="text" placeholder="Votre Nom..." ><br>
          <label>Email  :</label><br>
          <input type="email" placeholder="Votre Email..." ><br>
          <label>Phone  :</label><br>
          <input type="text" placeholder="Votre Telephone..." ><br>
          <label>Votre Message  :</label><br>
          <textarea></textarea><br>
          <button id="btn-submit"> Valider </button>
        </form>
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

    
     <script src="main.js"></script>
  </body>
</html>