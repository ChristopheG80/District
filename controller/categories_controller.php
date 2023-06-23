<?php
$conn = connect_bd();
$conn2 = connect_bd();

$page_cat = isset($page_cat) ? $page_cat : 1;
$limit = 6;
$offset = ($page_cat - 1) * $limit;
$fin = isset($limit) ? ' LIMIT ' . $limit : '';
$fin .= (isset($limit) && isset($offset)) ? ' OFFSET ' . $offset . ';' : ';';

$reqMax = "SELECT COUNT(id) max FROM categorie WHERE active = 'Yes';";
$req = "SELECT id, libelle, `image`, active FROM categorie WHERE active='Yes'" . $fin;
if (!$conn2->query($reqMax)) echo "pas d'accès à la table";
if (!$conn->query($req)) echo "pas d'accès à la table";
else {
    include_once "view/categories.php";
}
