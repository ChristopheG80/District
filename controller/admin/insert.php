<?php

// Suppression d'un plat
if (isset($_POST['newPlat'])) {
    $platLib=$_POST['newPlatLib'];
    $platPrice=floatval($_POST['newPlatPrice']);
    $platDescr=$_POST['newPlatDescr'];
    $platCat=intval($_POST['newPlatCatList']);
    $platImg=$_FILES['newPlatFileImg']['name'];
    $platActive=is_null($_POST['newPlatActive'])?'Yes':'no';
    var_dump($platLib,'<br>',$platPrice,'<br>',$platDescr,'<br>',$platImg,'<br>',$platCat,'<br>',$platActive,'<br>');
    $plat = new plat();
    $addPlat= $plat->addOnePlat($platLib,$platPrice,$platDescr,$platImg,$platCat,$platActive);
}

// Suppression d'une catégorie
if (isset($_POST['newCat'])) {
    $lib = $_POST['newCatLib'];
    $img = $_FILES['newCatFileImg']['name'];
    $active = !is_null($_POST['newCatActive'])?'Yes':'no';
    $cat = new categorie();
    var_dump($lib, $img, $active);
    $addCat = $cat->addOneCat($lib, $img, $active);
}






include "controller/admin/admin.php";