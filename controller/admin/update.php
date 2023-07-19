<?php
$idPlat=isset($_POST['modPlat'])?key($_POST['modPlat']):null;
$idCat=isset($_POST['modCat'])?key($_POST['modCat']):null;
// Mise à jour d'un plat
if(!is_null($idPlat)){
    $platLib=$_POST['platLib'][$idPlat];
    $platPrice=floatval($_POST['platPrice'][$idPlat]);
    $platDescr=$_POST['platDescr'][$idPlat];
    $platCat=intval($_POST['platIDCat'][$idPlat]);
    $platActive=!is_null($_POST['platActive'][$idPlat])?'Yes':'no';
    $platImg=$_FILES['platFileImg']['name'][$idPlat]!=""?$_FILES['platFileImg']['name'][$idPlat]:$_POST['platImg'][$idPlat];
    $plat=new plat();
    //var_dump($idCat,$platLib,$platPrice,$platDescr,$platImg,$platCat,$platActive);

    $upPlat=$plat->updateOnePlat($idPlat,$platLib,$platPrice,$platDescr,$platImg,$platCat,$platActive);
    $nomTable='plat';
}
// Mise à jour d'une catégorie
if(!is_null($idCat)){
    $catLib=$_POST['catLib'][$idCat];
    $catActive=!is_null($_POST['catActive'][$idCat])?'Yes':'no';
    $catImg=$_FILES['catFileImg']['name'][$idCat]!=""?$_FILES['catFileImg']['name'][$idCat]:$_POST['catImg'][$idCat];
    $cat=new categorie();
    $upCat=$cat->updateOneCat($idCat,$catLib,$catImg,$catActive);
    $nomTable='categorie';
}
include "controller/admin/admin.php";