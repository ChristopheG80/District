<?php
include "utils/connexion.php";
// echo 'Administration de la base de données';
include "utils/DAO.class.php";


$conn = connect_bd();

if (isset($_POST['tableN'])) {
    $nomTable = key($_POST['tableN']);
}
if (isset($nomTable)) {
    $plat = new plat();
    $cat = new categorie();
    if ($nomTable == 'categorie') {
        $listCat = $cat->showAllCat();
        
    }

    if ($nomTable == 'plat') {
        $listCat = $cat->listCat();
        $listPlat = $plat->showAllPlat();
    }
}





include "view/admin/admin.php";
