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
   ?>
    <div class="container my-5">
    <?php
        if(isset($_POST['ajouter'])){
            $username = $_POST['username'];
            $pwd = $_POST['password'];
            $email = $_POST['email'];
            $conEmail = $_POST['conEmail'];
            $name = $_POST['name'];
            if(!empty($username) && !empty($pwd) && !empty($email) && !empty($conEmail) &&!empty($name)){
                if($email === $conEmail){
                    require_once 'include/database.php' ;
                    $sqlState = $pdo->prepare('INSERT INTO userlogin VALUES(null,?,?,?,?)');
                    $sqlState->execute([$username,$name,$email,$pwd]);
                    header('location: connexion.php');
                }else{
                    ?>
                    <div class="alert alert-danger my-2" role="alert">
                        entre le meme Email !
                    </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-danger my-2" role="alert">
                       tous les champs sont obligatoire
                    </div>
                <?php
            }
        }

    ?>
        <form class="form-control" method="POST">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
            <label class="form-label">Nom et prenom</label>
            <input type="text" class="form-control" name="name">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <label class="form-label">Confirmation d'Email</label>
            <input type="email" class="form-control" name="conEmail">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <input type="submit" name="ajouter" class="btn btn-primary btn-lg my-2" value="Valider">
        </form>
    </div>
</body>
</html>