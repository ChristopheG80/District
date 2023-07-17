<?php

$conn = connect_bd();
$req="SELECT `id`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client` 
FROM `commande` WHERE `etat` <> 'Livrée';";
if(!$conn->query($req)){
    echo "pas d'accès à la table";
}else{
    include_once "view/commandes.php";
}