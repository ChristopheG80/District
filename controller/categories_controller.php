<?php

$conn = connect_bd();
$req="SELECT `id`, `libelle`, `image`, `active` FROM categorie WHERE active='Yes' LIMIT 6";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/categories.php";
}