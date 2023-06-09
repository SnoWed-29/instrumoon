<!DOCTYPE html>
<html lang="en">
    <head>
    <?php 
      include 'include/header.php';
    ?>
</head>
<body>
   <?php 
        include 'include/topNav.php';
        include 'include/mainNav.php';
        if(!isset($_SESSION['utilisateur']) or $_SESSION['utilisateur']['username'] != 'admin'){
                
            header('location: index.php');
        }
   ?>
<div class="container my-5">
  <h2>Hello <b style="text-transform: UPPERCASE;"><?php echo $_SESSION['utilisateur']['name']?></b>!</h2>
  <div class="container" style="display: flex;justify-content: space-evenly;">
    <div class="row">
  <div class="card" style="margin-right: 8px;">
    <div class="card-header">
        Liste des Produit
    </div>
    <div class="card-body">
        <h5 class="card-title">Modifier et supprimer les produit</h5>
        <p class="card-text">Page admin qui permette de modifier et supprimer les produits de Site Web.</p>
        <a href="product_page.php" class="btn btn-primary">Modifier les Produits</a>
    </div>
    </div>
    <div class="card" style="margin-left: 4px;">
    <div class="card-header">
        Liste des Utilisateur
    </div>
    <div class="card-body">
        <h5 class="card-title">Gerer les utilisateur(Clients)</h5>
        <p class="card-text">Page admin qui permette de gere (modifier et supprimer) les utilisateur dans le site Web.</p>
        <a href="product_page.php" class="btn btn-primary">Gerer les utilisateur</a>
    </div>
    </div>
  </div>
</body>
</html>