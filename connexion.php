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
    <div class="container my-5" style="width: 500px">
    <?php 
            if(isset($_POST['connexion'])){
                $username = $_POST['username'];
                $pwd = $_POST['password'];
                if(!empty($username) && !empty($pwd)){
                    require_once 'include/database.php' ;
                    $sqlState = $pdo->prepare('SELECT * FROM userlogin 
                                               WHERE username=? AND
                                                     password=?
                                            ');
                    $sqlState->execute([$username,$pwd]);
                    if($sqlState->rowCount()>=1){
                        $_SESSION['utilisateur'] = $sqlState->fetch();
                        header('location: index.php');
                        if($_SESSION['utilisateur']['username'] === "admin"){
                            header('location: admin.php');
                        }
                    }
                }else{
                    ?>
                        <div class="alert alert-danger my-2" role="alert">
                            Login ou Password incorrectes.
                        </div>
                    <?php
                    
                }
            }
        ?>
<?php   
    if($connecte){
        header('location: index.php');
    }
?>
        <form class="form-control" method="POST">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <input type="submit" name="connexion" id="SubmitButton"class="btn btn-lg my-2" value="Valider">
        </form>
    </div>
</body>
</html>