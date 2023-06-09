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
        if(!isset($_SESSION['utilisateur'])){
                
            header('location: connexion.php');
        }
   ?>
    <div class="container my-5">
  <!-- <h2>Hello <?php //echo $_SESSION['utilisateur']['name']?></h2> -->
  <div class="container my-2">
   <h2>Liste des Produits</h2>
   <a href="add_product.php" class="btn my-2 btn-primary">Ajouter un Produit</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Date</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            require_once 'include/database.php';
            $produits = $pdo->query('SELECT * FROM produit')->fetchAll(PDO::FETCH_ASSOC);
            foreach($produits as $produit){
                ?>
                <tr>
                    <td><?php echo $produit['id_produit'] ?></td>
                    <td><?php echo $produit['produit_libelle'] ?></td>
                    <td><?php echo $produit['produit_prix'] ?></td>
                    <td><?php echo $produit['produit_description'] ?></td>
                    <td><?php echo $produit['date_creation'] ?></td>
                    <td>
                        <a href="modifier-produit.php?id=<?php echo $produit['id_produit']; ?>" class="btn btn-primary">Modifier</a>
                        <a href="supprimerproduit.php?id_produit=<?php echo $produit['id_produit'];?>" onClick=" return confirm('Voulez vous supprimer la categories <?php echo $produit['produit_libelle'] ?>')" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>