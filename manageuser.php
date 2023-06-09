<?php 
    include 'include/header.php';
    include 'include/topNav.php';
    include 'include/mainNav.php';
?>
<div class="container">

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