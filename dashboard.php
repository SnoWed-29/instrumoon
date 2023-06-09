<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboardCss.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php 
        include 'include/topNav.php';
        if(!isset($_SESSION['utilisateur']) or $_SESSION['utilisateur']['username'] != 'admin'){
                
            header('location: index.php');
        }
   ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard">
                    <div class="sidebar">
                        <div class="list-group">
                            <a href="#products" class="list-group-item list-group-item-action">Produits</a>
                            <a href="#bills" class="list-group-item list-group-item-action">facture</a>
                            <a href="#users" class="list-group-item list-group-item-action">Utilisatuer</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard">
                    <div class="content">
                        <div id="products" class="category active">
                            <h2>Products</h2>
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
                                            <a href="modifier-produit.php?id=<?php echo $produit['id_produit']; ?>"
                                                class="btn btn-primary">Modifier</a>
                                            <a href="supprimerproduit.php?id_produit=<?php echo $produit['id_produit'];?>"
                                                onClick=" return confirm('Voulez vous supprimer la categories <?php echo $produit['produit_libelle'] ?>')"
                                                class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                    <?php
            }
        ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="bills" class="category">
                            <h2>Bills</h2>
                            <table class="table table-striped table-hover">
                                <thead>
                      
                                    <tr>
                                        <th>#ID</th>
                                        <th>date d'achat</th>
                                        <th>Quantite</th>
                                        <th>Prix total</th>
                                        <th>Produit</th>
                                        <th>Utilisatuer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                require_once 'include/database.php';
                                $factures = $pdo->query('SELECT * FROM facture')->fetchAll(PDO::FETCH_ASSOC);
                                foreach($factures as $facture){
                                  ?>
                                    <tr>
                                        <td><?php echo $facture['id'] ?></td>
                                        <td><?php echo $facture['date_creation'] ?></td>
                                        <td><?php echo $facture['quantite'] ?></td>
                                        <td><?php echo $facture['prix_total'] ?></td>
                                        <td><?php echo $facture['id_produit'] ?></td>
                                        <td><?php echo $facture['id_user'] ?></td>
                                    </tr>
                                    <?php  
                                }
                            ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="users" class="category">
                            <h2>Users</h2>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Username</th>
                                        <th>Name </th>
                                        <th>email</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    require_once 'include/database.php';
                                    $users = $pdo->query('SELECT * FROM userlogin')->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($users as $user){
                                        ?>
                                    <tr>
                                        <td><?php echo $user['id_user'] ?></td>
                                        <td><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['name'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><?php echo $user['password'] ?></td>
                                        <td>
                                            <a href="supprimeruser.php?id=<?php echo $user['id_user'];?>"
                                                onClick=" return confirm('Voulez vous supprimer la categories <?php echo $user['name'] ?>')"
                                                class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                    <?php
    }
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    // JavaScript to handle sidebar navigation
    $(document).ready(function() {
        $('.sidebar .list-group-item').click(function() {
            var target = $(this).attr('href');
            $('.category').removeClass('active');
            $(target).addClass('active');
        });
    });
    </script>
</body>

</html>