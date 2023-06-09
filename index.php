<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
      include 'include/header.php';
    ?>
</head>

<body id="body">
    <?php 
    include 'include/topNav.php'
  ?>
    <!-- 
    top nav here
   -->
    <header>
        <?php 
            include 'include/mainNav.php'
        ?>
        <!-- 
        main nav here
       -->
        <div class="contai index">
            <div id="Desc" class="container p-5 border hcontainer des">
                <img src="media/logo.png" id="logo" alt="logo"><br><br>
                <h4>
                    Offrer vous votre meilleur instrument a prix fou !
                </h4>
                <P>Avec une grande variété d'instruments, des guitares électriques aux pianos acoustiques, trouvez
                    l'outil parfait pour vous accompagner dans votre voyage musical.</P>
            </div>
        </div>

    </header>
    <section class="gcontainer">
        <div class="row">
            <center>
                <h2 class="titre colorC">Notre Guitar</h2>
            </center>
            <div class="col-sm-12 rightList">
                <?php
        include 'include/database.php';
        $querys = $pdo->query('SELECT * FROM produit WHERE id_categorie = 1 ORDER BY `produit_prix` ASC LIMIT 4')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querys as $query) {
            ?>
                <div class="col-sm-2 card">
                    <img class="imgcard" src="./upImg/<?php echo $query['produit_image']?>" alt="instrument">
                    <h1><?php echo $query['produit_libelle'] ?></h1>
                    <p class="price"><?php echo $query['produit_prix'] ?>dh</p>
                    <p><a href="product.php?id=<?php echo $query['id_produit'] ?>"><button>Achetez-le</button></a></p>
                </div>
                <?php
}
?>
            </div>
            <span class="titrel"><a href="./PageGuitars.php">Voir Plus <i class="fa fa-arrow-right"
                        aria-hidden="true"></i>
                </a></span>
            <div class="row">
                <!-- -->
                <center>
                    <h2 class="titre colorC" style="border: none;">Notre Pianos</h2>
                </center>
                <div class="col-sm-12 rightList">
                    <?php
        include 'include/database.php';
        $querys = $pdo->query('SELECT * FROM produit WHERE id_categorie = 3 ORDER BY `produit_prix` ASC LIMIT 4')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querys as $query) {
            ?>
                  
                  <div class="col-sm-2 card">
                        <img class="imgcard" src="./upImg/<?php echo $query['produit_image']?>" alt="instrument">
                        <h1><?php echo $query['produit_libelle'] ?></h1>
                        <p class="price"><?php echo $query['produit_prix'] ?>dh</p>
                        <p><a href="product.php?id=<?php echo $query['id_produit'] ?>"><button>Achetez-le</button></a>
                        </p>
                    </div>
                    <?php
}
?>
                </div>
            </div>
            <span class="titrel"><a href="./pagePianos.php">Voir Plus <i class="fa fa-arrow-right"
                        aria-hidden="true"></i>
                </a></span>
            <div class="row">
                <!-- -->
                <center>
                    <h2 class="titre colorC" style="border: none;">Notre Percussion</h2>
                </center>
                <div class="col-sm-12 rightList">
                    <?php
        include 'include/database.php';
        $querys = $pdo->query('SELECT * FROM produit WHERE id_categorie = 2 ORDER BY `produit_prix` ASC LIMIT 4')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querys as $query) {
            ?>
                    <div class="col-sm-2 card">
                        <img class="imgcard" src="./upImg/<?php echo $query['produit_image']?>" alt="instrument">
                        <h1><?php echo $query['produit_libelle'] ?></h1>
                        <p class="price"><?php echo $query['produit_prix'] ?>dh</p>
                        <p><a href="product.php?id=<?php echo $query['id_produit'] ?>"><button>Achetez-le</button></a>
                        </p>
                    </div>
                    <?php
}
?>
                </div>
            </div>
            <span class="titrel"><a href="./pagePercussion.php">Voir Plus <i class="fa fa-arrow-right"
                        aria-hidden="true"></i>
                </a></span>
            <div class="row">
                <!-- -->
                <center>
                    <h2 class="titre colorC" style="border: none;">Matériels de studio</h2>
                </center>
                <div class="col-sm-12 rightList">
                <?php
        include 'include/database.php';
        $querys = $pdo->query('SELECT * FROM produit WHERE id_categorie = 4 ORDER BY `produit_prix` ASC LIMIT 4')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($querys as $query) {
            ?>
                <div class="col-sm-2 card">
                    <img class="imgcard" src="./upImg/<?php echo $query['produit_image']?>" alt="instrument">
                    <h1><?php echo $query['produit_libelle'] ?></h1>
                    <p class="price"><?php echo $query['produit_prix'] ?>dh</p>
                    <p><a href="product.php?id=<?php echo $query['id_produit'] ?>"><button>Achetez-le</button></a></p>
                </div>
                <?php
}
?>
            </div>
            </div>
            <span class="titrel"><a href="./pageStudio.php">Voir Plus <i class="fa fa-arrow-right"
                        aria-hidden="true"></i>
                </a></span>
        </div>
    </section>
    <footer id="Footer-info">
        <div class="container">
            <div class="row borderC justify-content-center">
                <img src="media/visa-mastercard.png" alt="visamastercard">
                <img src="media/wafasalaf.png" alt="wafasalaf">
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