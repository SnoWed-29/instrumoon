<?php 
    include 'include/header.php';
    include 'include/topNav.php';
    include 'include/mainNav.php';
?>
 <div class="container">
        <h4>Modifier Categorie</h4>
        <?php
            require_once 'include/database.php';
            $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id_produit=?');
            $id = $_GET['id'];
            $sqlState->execute([$id]);
            $product = $sqlState->fetch(PDO::FETCH_ASSOC);
            if(isset($_POST['modifier'])){
                
                $libelle = $_POST['libelle'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];

                if(!empty($libelle) && !empty($description) && !empty($prix)){
                    $sqlState = $pdo->prepare('UPDATE produit SET produit_libelle = ? , produit_description = ?,produit_prix = ? WHERE id_produit = ?');
                    $sqlState->execute([$libelle,$description,$prix,$id]);
                   header('location: admin.php');
                }else{
                    ?>
                    <div class="alert alert-danger my-2" role="alert">
                        libelle , description sont obligatoire !
                    </div>
                    <?php
                }
            }
        ?>
        <form method="post">
            <input type="hidden" class="form-control" value="<?php echo $product['id_produit'] ?>" name="id" >
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" value="<?php echo $product['produit_libelle'] ?>" name="libelle" >
            <label class="form-label">Libelle</label>
            <input type="number" class="form-control" value="<?php echo $product['produit_prix'] ?>" name="prix" >
            <label class="form-label">description</label>
            <textarea class="form-control" name="description"><?php echo $product['produit_description'] ?></textarea>
            <input type="submit" value="Modifier" name="modifier" class="btn btn-primary btn-lg my-2">
        </form>
    </div>