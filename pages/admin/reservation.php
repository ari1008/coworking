<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Reservations</strong></h1>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id_Reservation</th>
            <th>Date de début</th>
            <th>Heure de début</th>
            <th>Date de fin</th>
            <th>Heure de fin</th>
            <th>Acompte</th>
            <th>Solde</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        <?php
        require ROOT . '/config/config.php';
        $q = 'SELECT reservation.id_reservation, DATE_FORMAT(reservation.date_debut, \'%m/%c/%Y\') AS date_debut, 
            DATE_FORMAT(reservation.date_fin, \'%m/%c/%Y\') AS date_fin, reservation.heure_debut, reservation.heure_fin,
             reservation.acompte, reservation.solde, user.prenom, user.nom FROM reservation 
             INNER JOIN user ON reservation.user=user.id_user';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id_reservation']; ?> </td>
                <td> <?php echo $value['date_debut'];?> </td>
                <td> <?php echo $value['heure_debut'] . 'h'; ?> </td>
                <td> <?php echo $value['date_fin']; ?> </td>
                <td> <?php echo $value['heure_fin']. 'h' ?> </td>
                <td> <?php echo $value['acompte']  . ' €';?> </td>
                <td> <?php echo $value['solde'] . ' €';?> </td>
                <td> <?php echo $value['nom'] .', '.$value['prenom'] ;?> </td>


                <td width=200>
                    <?php	echo '<a href="?p=viewReservation&reserve=' . $id = $value['id_reservation'] .
                            ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>

                    <?php	echo '<a href="?p=deleteReservation&reserve=' . $value['id_reservation'] .
                        ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                    ?>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>
