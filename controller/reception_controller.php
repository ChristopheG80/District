<?php
var_dump('Coucou');
echo '<br />';echo '<br />';
// Réception de la commande pour insertion dans la base et envoi par email une confirmation
var_dump($_SESSION['panier']);
echo '<br />';echo '<br />';
$qty2=      $_SESSION['panier']['quantite'];
$price2=    $_SESSION['panier']['price'];
$libelle2=  $_SESSION['panier']['libelle'];
$img2=      $_SESSION['panier']['img'];
$key2=      $_SESSION['panier']['id'];
$zzz=       $_SESSION;

$datedu = date_create('now');
$datedujour = date_format($datedu,'Y-m-d H:i:s');
//  = date_create('2023-12-25');
//var_dump('Date du jour', strval($datedu));
// $datedujour = substr(strval($datedu),0,10);
$etat = "A préparer";
$nameCust = $_POST['nameCust'];
$phoneCust = $_POST['phoneCust'];
$emailCust = $_POST['emailCust'];
$addressCust = $_POST['addressCust'];
var_dump($datedujour);echo '<br />';echo '<br />';
var_dump('etat',$etat);echo '<br />';echo '<br />';
var_dump('$nameCust',$nameCust);echo '<br />';echo '<br />';
var_dump('$phoneCust',$phoneCust);echo '<br />';echo '<br />';
var_dump('$emailCust',$emailCust);echo '<br />';echo '<br />';
var_dump('$addressCust',$addressCust);echo '<br />';echo '<br />';
echo '<br />';echo '<br />';
// var_dump('$zzz[img]',$zzz['img']);
echo '<br />';echo '<br />';echo '<br />';echo '<br />';
var_dump('$key_______2',$key2);echo '<br />';echo '<br />';
foreach($zzz['panier']['id'] as $key => $value){
$req="INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) ";
$req .="VALUES(";
// $req .=$value;
$req .=", '";
// $req .= $zzz['quantite'][$key] . ", ";
// $req .= $zzz['quantite'][$key] * $zzz['price'][$key] . ", ";
$req .= $datedujour . "', '";
$req .= $etat . "', '";
$req .= $nameCust . "', '" . $phoneCust . "', '" . $emailCust . "', '" . $addressCust . "');";
var_dump('Requête',$req);echo '<br />';echo '<br />';
 }

echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';
echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';
echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';
echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';
echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';
echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';echo '<br />';


