<?php
$user = WHO($_SESSION['id']);
?>
<h1>Vous êtes chez l'admin</h1>
<p>Bonjour <?= $user['prenom']. ', '. $user['nom'] ;?> </p>
<p>Vous pouvez tous contrôler depuis notre interface</p>
