<?php
$conn = connect_bd();
$conn2 = connect_bd();

$where = "WHERE";
if(isset($catego)){
    $where .= " id_categorie = " . $catego . " AND ";
}

$page_plat = isset($page_plat) ? $page_plat : 1;
$limit = 6;
$offset = ($page_plat - 1) * $limit;

$where.=" active='Yes'";
$fin = isset($offset)?' OFFSET ' . $offset . ';':';';
$reqMax="SELECT COUNT(`id`) max FROM plat ". $where . ";";
$req="SELECT `id`, `libelle`, `description`, `prix`, `image` img, `id_categorie`, `active` FROM plat ". $where . " LIMIT 6" . $fin;
// var_dump($req);
if(!$conn2->query($reqMax)) echo "pas d'accès à la table";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/plats.php";
}