<?php
// Récupérer les infos les stocker dans la base et envoyer un mail

$id = isset($_POST['quantyty']) ? $_POST['quantyty'] : null;
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : null;
$total = isset($_POST['prixQte']) ? $_POST['prixQte'] : null;
$custEmail = isset($_POST['emailCust']) ? $_POST['emailCust'] : null;
$custPhone = isset($_POST['phoneCust']) ? $_POST['phoneCust'] : null;
$custName = isset($_POST['nameCust']) ? $_POST['nameCust'] : null;
$custAddress = isset($_POST['addressCust']) ? $_POST['addressCust'] : null;

$cdePlat=new commande();
$cde=$cde_plat->enre