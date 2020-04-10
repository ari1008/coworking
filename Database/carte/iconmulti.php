<?php
    require '../../config/config.php';
    $sql = "SELECT * FROM local";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $length = count($results);
    $tabpoint='[';
    for ($x=0;$x<$length-1;$x++){
        $tabpoint.= '\''. $results[$x]['adresse'] . ' ' .$results[$x]['ville'] .  ' ' . $results[$x]['pays'] . '\',';
    }
    $tabpoint.= '\''.$results[$x]['adresse'] . ' ' .$results[$x]['ville'] .  ' ' . $results[$x]['pays'] . '\']';
    echo $tabpoint;


?>
