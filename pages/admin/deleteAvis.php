
<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">

        <h1><strong>Supprimer l'avis</strong></h1><br>

        <?php
        require ROOT .'/config/config.php';

        if(!empty($_GET['avis']))
        {
            $id = $_GET['avis'];
        }


        if(!empty($_POST))
        {
            $id = $_POST['avis'];

            $q = 'DELETE FROM avis WHERE id_avis = ?';
            $req = $bdd->prepare($q);
            $req->execute(array($id));
            header("Location: avis.php");
        }
        ?>


        <form class="form" role="form" action=?p=deleteAvis method="POST">
            <input type="hidden" name="avis" value="<?php echo $id;?>" />
            <p class="alert alert-warning">Etes vous sûr de vouloir supprimer ?</p>
            <div class="form-action">
                <button type="submit" class="btn btn-warning"> oui </button>
                <a href="?p=avis" class="btn btn-default">non</a>
            </div>
        </form>


    </div>

</div>


