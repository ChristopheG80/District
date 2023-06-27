<?php
$conn_cat=connect_bd();
$conn_plat=connect_bd();
// Faire une requete pour chercher dans les catégories
$req_cat = "SELECT id, libelle, `image` FROM categorie WHERE active='Yes' AND `libelle` LIKE '%" . $_REQUEST['searchbar'] . "%' ORDER BY `libelle`";
if(!$conn_cat->query($req_cat)) echo "pas d'accès à la table";
// Faire une requete pour chercher dans les plats
$req_plat = "SELECT `id`, `libelle`, `description`, `prix`, `image` img FROM plat WHERE active='Yes' AND `libelle` LIKE '%" . $_REQUEST['searchbar'] . "%' ORDER BY `libelle`";
if(!$conn_plat->query($req_plat)) echo "pas d'accès à la table";
include "view/searchResult.php";
