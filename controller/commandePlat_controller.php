<?php

$conn = connect_bd();
$valkey = key($_POST['Commande']);
$platCommande = new plat();
$platCom = $platCommande->show_one_plat($valkey);
// var_dump($platCom);
include "view/commande_plat.php";