<?php
$conn = connect_bd();

$where = "WHERE";
if(isset($catego)){
    $where .= " id_categorie = " . $catego . " AND ";
}


$where.=" active='Yes'";

$req="SELECT `id`, `libelle`, `description`, `prix`, `image` img, `id_categorie`, `active` FROM plat ". $where . " LIMIT 6;";
// var_dump($req);
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/plats.php";
}