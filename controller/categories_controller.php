<?php
$conn = connect_bd();
//$offset = 6;
$fin = isset($offset)?' OFFSET ' . $offset . ';':';';
$reqMax="SELECT `id`, `libelle`, `image`, `active` FROM categorie WHERE active='Yes';";
$req = "SELECT `id`, `libelle`, `image`, `active` FROM categorie WHERE active='Yes' LIMIT 6 " . $fin;
if(!$conn->query($reqMax)) echo "pas d'accès à la table";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    include_once "view/categories.php";
}