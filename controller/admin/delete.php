<?php
echo 'on arrive dans DELETE';
$idPlat = isset($_POST['delPlat']) ? key($_POST['delPlat']) : null;
$idCat = isset($_POST['delCat']) ? key($_POST['delCat']) : null;
var_dump($idPlat);
var_dump($idCat);
// Suppression d'un plat
if (!is_null($idPlat)) {
    
    $plat = new plat();
    $platDel = $plat->delOnePlat($idplat);
    var_dump($platDel);
    
    if($catDel){
        $message="Ce plat a été supprimé.";
    }
    else{
        $message="Il y a des commandes qui contiennent ce plat.";
    }
}

// Suppression d'une catégorie
if (!is_null($idCat)) {
    $message="On entre Cette catégorie a été supprimée.";
    var_dump($message);

    $cat = new categorie();
        $message="Cette catégorie va être supprimée.";
        $catDel = $cat->delOneCat($idcat);
        var_dump($catDel);
    if($catDel[0]){
        $message="Cette catégorie a été suppriméeeeee vraiment.";
    }else{
        $message="La catégorie n'est pas vide. <br>Supprimer les plats qu'elle contient d'abord.";
    }
}




include "controller/admin/admin.php";
