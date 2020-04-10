<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">

        <h1><strong>Supprimer l'utilisateur </strong></h1><br>

        <?php
        require ROOT .'/config/config.php';

        if(!empty($_GET['user']))
        {
            $id = $_GET['user'];
        }


        if(!empty($_POST))
        {
            $id = $_POST['user'];
            $q = 'DELETE FROM user WHERE id_user = ?';
            $req = $bdd->prepare($q);
            $req->execute(array($id));
            header("Location: ?p=user");
            exit();
        }
        ?>


        <form class="form" role="form" action=?p=deleteUser method="POST">
            <input type="hidden" name="user" value="<?php echo $id;?>" />
            <p class="alert alert-warning">Etes vous sûr de vouloir supprimer ?</p>
            <div class="form-action">
                <button type="submit" class="btn btn-warning"> oui </button>
                <a href="?p=user" class="btn btn-default">non</a>
            </div>
        </form>


    </div>

</div>


