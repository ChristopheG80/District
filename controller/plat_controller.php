<?php
$conn = connect_bd();
$req="SELECT `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active` FROM plat WHERE active='Yes'";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/plats.php";
}