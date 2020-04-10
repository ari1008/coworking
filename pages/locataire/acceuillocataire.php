<?php
$carte = '<script type="text/javascript" src="/coworking/public/js/carte.js"></script>';
?>
<h1>vous êtes chez le locataire</h1>
<button onclick="doAjax()">Ajax</button>

<body style="border: 0; margin: 0;">
<div id="map" style="width: 100%; height: 530px;"></div>

<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<?= $carte;?>
</body>