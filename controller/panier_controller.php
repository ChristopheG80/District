<?php

// var_dump($_SESSION);
// if($_SESSION['Auth']=="ok"){
//     echo 'vous êtes dans le panier';
// }
// else{
//     echo 'Merci de se connecter';
// }
// Faire un INSERT INTO avec les Id des plats clé de qty
$qty=$_REQUEST['qty'];
$price=$_REQUEST['price'];
$libelle=$_REQUEST['libelle'];
$totaux=0;
// var_dump($qty);

// echo '<br />';

foreach($qty as $key => $value){
    if($value==""){
        unset($qty[$key]);
        unset($libelle[$key]);
        unset($price[$key]);
    }
}
// var_dump('Après traitement',$qty);

foreach($qty as $key => $value){
    $total=$price[$key] * $value;
    $totaux +=$total;
    echo '<br />quantité= ' . $value . '<br />';
    echo 'prix unitaire= ' . $price[$key] . '  total= ' . $total;

}
echo '<br />Total commande = ' . $totaux;
$_SESSION['panier']['quantite']=$qty;
$_SESSION['panier']['price']=$price;
$_SESSION['panier']['libelle']=$libelle;
$_SESSION['panier']['id']=$key;

echo '<br />';
var_dump($_SESSION['panier']);