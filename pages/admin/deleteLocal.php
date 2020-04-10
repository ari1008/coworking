<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">

        <h1><strong>Supprimer local</strong></h1><br>

        <?php
        require ROOT . '/config/config.php';

        if(!empty($_GET['local']))
        {
            $id = $_GET['local'];
        }


        if(!empty($_POST))
        {
            $id = $_POST['local'];

            $q = 'DELETE FROM local WHERE id_local = ?';
            $req = $bdd->prepare($q);
            $req->execute(array($id));
            header("Location: local.php");
        }
        ?>


        <form class="form" role="form" action=?p=deleteLocal method="POST">
            <input type="hidden" name="local" value="<?php echo $id;?>" />
            <p class="alert alert-warning">Etes vous sûr de vouloir supprimer ?</p>
            <div class="form-action">
                <button type="submit" class="btn btn-warning"> oui </button>
                <a href="?p=local" class="btn btn-default"> non </a>
            </div>
        </form>


    </div>

</div>