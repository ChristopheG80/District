<?php
$conn = connect_bd();

$where = "WHERE";
if(isset($catego)){
    $where .= " id_categorie = " . $catego . " AND ";
}


$where.=" active='Yes'";
$fin = isset($offset)?' OFFSET ' . $offset . ';':';';
$reqMax="SELECT `id`, `libelle`, `description`, `prix`, `image` img, `id_categorie`, `active` FROM plat;";
$req="SELECT `id`, `libelle`, `description`, `prix`, `image` img, `id_categorie`, `active` FROM plat ". $where . " LIMIT 6" . $fin;
// var_dump($req);
if(!$conn->query($reqMax)) echo "pas d'accès à la table";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/plats.php";
}