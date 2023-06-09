
<?php 
  session_start();
  $connecte = false;
  if(isset($_SESSION['utilisateur'])){
    $connecte = true;
  }
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navtop" >
    <div class="container-fluid">
        <div class="hnavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-street-view" aria-hidden="true"></i> Store  
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> contact 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#Footer-info"><i class="fa fa-question-circle" aria-hidden="true"></i> info
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> localisation
          </a>
          <?php  
            if($connecte && $_SESSION['utilisateur']['name'] == "haitham"){
              ?>
                 <li class="nav-item">
                    <a class="nav-link active" href="add_product.php"><i class="fa-solid fa-circle-plus"></i> Ajouter Produit
                </a>
                
              <?php 
            }
          ?>
          <?php 
            if($connecte){
                ?>
               
                <li class="nav-item">
                    <a class="nav-link active" href="deconnexion.php"><i class="fa-solid fa-right-to-bracket"></i> Deconnexion
                </a>
                <?php
            }else{
                ?>          
                <li class="nav-item">
                    <a class="nav-link active" href="inscription.php"><i class="fa-solid fa-user"></i> Inscription
                </a>
                </li>       
                <li class="nav-item">
                    <a class="nav-link active" href="connexion.php"><i class="fa-solid fa-right-to-bracket"></i> Login
                </a>
                </li>
                <?php
            }
          ?>
      </ul>
    </div>
    </div>
  </nav>