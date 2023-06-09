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

        if(isset($_POST['ajouterProduit'])){
            $prName = $_POST['libelleProduit'];
            $prPrice = $_POST['prixProduit'];
            $prDescription = $_POST['produitDescription'];
            $test  = 23 ;
            $test2 = "DD";
            if(!empty($prDescription) && !empty($prPrice) && !empty($prDescription)){
            
                $img = "";
                $filename = '';
                if(isset($_FILES['imageProduit']['name'])){
                    $img = $_FILES['imageProduit']['name'];
                    $filename = uniqid().$img;
                    move_uploaded_file($_FILES['imageProduit']['tmp_name'],'upImg/'.$filename);
                    
                }
                require_once "include/database.php";
                $sqlState = $pdo->prepare('INSERT INTO produit VALUES(null,?,?,?,?,?,?)');
                $sqlState->execute([$prName,$prPrice,$prDescription,$test,$test2,$filename]);
                 ?>
                <div class="alert alert-success my-2" role="alert">
                        Produit ajouter
                </div>
            <?php
            header('location: product_page.php');
            }else{
                ?>
                    <div class="alert alert-danger my-2" role="alert">
                            tous les champs sont obligatoire
                    </div>
                <?php
            }
        }
    ?>
            
        
    <div class="container">
        <form class="form-control" method="POST" enctype="multipart/form-data">
            <label class="form-label">Produit libelle</label>
            <input type="text" class="form-control" name="libelleProduit">
            <label class="form-label">Prix de Produit</label>
            <input type="number" min="1" class="form-control" name="prixProduit">
            <label class="form-label">Image de Produit</label>
            <input type="file" class="form-control" name="imageProduit">
            <label class="form-label">Produit Description</label>
            <textarea class="form-control" name="produitDescription">Description de</textarea>
            <input type="submit" name="ajouterProduit" class="btn btn-primary btn-lg my-2" value="Ajouter Produit">
        </form>
    </div>
</body>
</html>