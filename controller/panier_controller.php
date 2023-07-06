<?php

var_dump('début de panier Panier Ctrl',isset($_SESSION['panier']['quantite']));

$qty = intval($_REQUEST['qty']);
$price = floatval($_REQUEST['price']);
$libelle = $_REQUEST['libelle'];
$img = $_REQUEST['image'];
$totaux = 0;
$article = 0;


// var_dump($qty);

// echo '<br />';

// Pour enlever les éléments vides qui arrêtent le foreach
foreach ($libelle as $key => $value) {
    if ($value == "" || $value == 0) {
        unset($qty[$key]);
        unset($libelle[$key]);
        unset($price[$key]);
        unset($img[$key]);
    }
}
// var_dump('Après traitement',$qty);
// var_dump($_SESSION);


foreach ($libelle as $key => $value) {
    $total = floatval($price[$key]) * intval($value);
    $totaux += $total;
    $article += $value;
    // echo '<br />quantité= ' . $value . '<br />';
    // echo 'prix unitaire= ' . $price[$key] . '  total= ' . $total;

}
echo '<br />';


$panierQty = [];
    $panierPrice = [];
    $panierLibelle = [];
    $panierImg = [];

    


var_dump('[panier]',isset($_SESSION['panier']['quantite']),'[quantite]');
if (isset($_SESSION['panier']['quantite'])) {

    // On sauve ce qui est dans le panier

    array_push($panierQty, $_SESSION['panier']['quantite']);
    
    array_push($panierPrice,$_SESSION['panier']['price']);
    var_dump('DANS LE if');
    array_push($panierLibelle,$_SESSION['panier']['libelle']);
    var_dump('DANS LE if');
    array_push($panierImg,$_SESSION['panier']['img']);
    var_dump('DANS LE if');
    echo '<br>';echo '<br>';echo '<br>';
    // $toto=array_search($libelle,$_SESSION['panier']['libelle'],true);
    $toto= array_search($libelle, $panierLibelle);
    var_dump('toto',$toto);
    var_dump('Panier Qty',$panierQty);

    echo '<br>';echo '<br>';echo '<br>';
    var_dump('in_Array');
    echo '<br>';echo '<br>';echo '<br>';
    var_dump($libelle);
    echo '<br>';echo '<br>';echo '<br>';
    var_dump($toto);
    echo '<br>';echo '<br>';echo '<br>';
    var_dump($_SESSION['panier']['libelle']);
    echo '<br>';echo '<br>';echo '<br>';
    var_dump('fin');

    echo '<br>';echo '<br>';echo '<br>';

var_dump(isset($_SESSION['panier']['id']));


    
    $panierKey = $_SESSION['panier']['id'];

    // On efface le contenu de la session
    unset($_SESSION['panier']['quantite']);
    unset($_SESSION['panier']['price']);
    unset($_SESSION['panier']['libelle']);
    unset($_SESSION['panier']['img']);
    unset($_SESSION['panier']['id']);


    // On ajoute au tablo temporaire les plats choisis
    array_push($panierQty, $qty);
    array_push($panierPrice, $price);
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
    var_dump('avant ajout',$panierLibelle, $libelle);
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    array_push($panierLibelle, $libelle);
    var_dump($panierLibelle, $libelle);

    array_push($panierImg, $img);
    array_push($panierKey, $key);


    var_dump('Après ArrayPush', $panierQty, $panierPrice, $panierLibelle, $panierImg, $panierKey);

    // On sauve le nouveau tablo dans les variables session
    $_SESSION['panier']['quantite'] = $PanierQty;
    $_SESSION['panier']['price'] = $panierPrice;
    $_SESSION['panier']['libelle'] = $panierLibelle;
    $_SESSION['panier']['img'] = $panierImg;
    $_SESSION['panier']['id'] = $panierKey;
    var_dump($_SESSION['panier']['libelle']);

    $totaux = 0;
    $article = 0;

    foreach ($PanierQty as $key => $value) {
        $total = $panierPrice[$key] * $value;
        $totaux += $total;
        $article += $value;
    }
    $qty = $panierQty;
    $price = $panierPrice;
    $libelle = $panierLibelle;
    $img = $panierImg;
} else {
    $_SESSION['panier']['quantite'] = $qty;
    $_SESSION['panier']['price'] = $price;
    $_SESSION['panier']['libelle'] = $libelle;
    $_SESSION['panier']['img'] = $img;
    $_SESSION['panier']['id'] = $key;

    var_dump('quand panier était vide', $qty, $price, $libelle, $img, $key);
}

echo '<br />';

include "view/panier.php";
