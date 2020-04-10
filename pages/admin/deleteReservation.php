<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">

        <h1><strong>Supprimer la reservation</strong></h1><br>

        <?php
        require ROOT . 'config/config.php';

        if(!empty($_GET['reserve']))
        {
            $id = $_GET['reserve'];
        }


        if(!empty($_POST))
        {
            $id = $_POST['reserve'];

            $q = 'DELETE FROM reservation WHERE id_reservation = ?';
            $req = $bdd->prepare($q);
            $req->execute(array($id));
            header("Location: reservation.php");
        }
        ?>


        <form class="form" role="form" action=?p=deleteReservation method="POST">
            <input type="hidden" name="reserve" value="<?php echo $id;?>" />
            <p class="alert alert-warning">Etes vous sûr de vouloir supprimer ?</p>
            <div class="form-action">
                <button type="submit" class="btn btn-warning"> oui </button>
                <a href="?p=reservation" class="btn btn-default">non</a>
            </div>
        </form>


    </div>

</div>
