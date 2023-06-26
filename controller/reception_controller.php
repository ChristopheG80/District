<?php
$conn=connect_bd();
// Réception de la commande pour insertion dans la base et envoi par email une confirmation
$qty2 =      $_SESSION['panier']['quantite'];
$price2 =    $_SESSION['panier']['price'];
$libelle2 =  $_SESSION['panier']['libelle'];
$img2 =      $_SESSION['panier']['img'];
$key2 =      $_SESSION['panier']['id'];
$zzz =       $_SESSION;

$datedu = date_create('now');
$datedujour = date_format($datedu, 'Y-m-d H:i:s');
$etat = "En préparation";
$nameCust = $_POST['nameCust'];
$phoneCust = $_POST['phoneCust'];
$emailCust = $_POST['emailCust'];
$addressCust = $_POST['addressCust'];
$messBody='<div class="col-12 my-2 bg_com districtColor">' . $nameCust . ' votre commande</div>';
foreach ($zzz['panier']['img'] as $key => $value) {
    $req = "INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) ";
    $req .= "VALUES(";
    $req .=$key;
    $req .= ", ";
    $req .= $zzz['panier']['quantite'][$key] . ", ";
    $req .= $zzz['panier']['quantite'][$key] * $zzz['panier']['price'][$key] . ", '";
    $req .= $datedujour . "', '";
    $req .= $etat . "', '";
    $req .= $nameCust . "', '" . $phoneCust . "', '" . $emailCust . "', '" . $addressCust . "');";
    
    $messBody.='
    <div class="col-3 my-1 bg_com districtColor">' . $libelle2[$key] . '</div>
    <div class="col-3 my-1 bg_com districtColor">' . $price2[$key] . $devise . '</div>
    <div class="col-3 my-1 bg_com districtColor"><img src="images_the_district/food/' . $img2[$key] . '" width="50" height="40" class="border border-2" /></div>
    <div class="col-3 my-1 bg_com districtColor">' . $zzz['panier']['quantite'][$key] . '</div>';



    
    $conn->prepare($req);
    if(!$conn->exec($req)){
        echo "pas d'accès à la table";
    }else{
        // Envoyer un mail de confirmation

    }
}

$messBody.='<div class="col-3 my-1 bg_com districtColor">' . $addressCust . '</div>';

var_dump('messBody',$messBody);
include "sendmail_controller.php";
// On a chargé tout ce qu'il faut pour le mail maintenant on peut l'envoyer
