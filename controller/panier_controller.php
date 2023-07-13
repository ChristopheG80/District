<?php

//var_dump('début de panier Panier Ctrl',isset($_SESSION['panier']['quantite']));
// echo '<br>';
// var_dump('Début de page', $_REQUEST['qty'], 'qty');
// echo '<br>';

$qty = $_REQUEST['qty'];
$price = $_REQUEST['price'];
$libelle = $_REQUEST['libelle'];
$img = $_REQUEST['image'];
$idPlat = $_REQUEST['cle'];
$totaux = 0;
$article = 0;

// Pour enlever les éléments vides qui arrêtent le foreach
if (!is_null($qty)) {
foreach ($libelle as $key => $value) {
    if (intval($qty[$key]) == 0 || $value == "" || $value == 0) {
        unset($qty[$key]);
        unset($libelle[$key]);
        unset($price[$key]);
        unset($img[$key]);
        unset($idPlat[$key]);
    }
}
// var_dump('26quantité', $qty, count($qty));

    if (count($qty) == 0) {
        // echo '<br>Pas de quantité sélectionnée';
    } else {
        // var_dump('Après traitement___', $qty);
        // var_dump($_SESSION);


        foreach ($libelle as $key => $value) {
            echo '<br><strong>';
            $total = floatval($price[$key]) * intval($qty[$key]);
            $totaux += $total;
            // var_dump($total, $totaux, $value);
            $article += intval($qty[$key]);
            echo '</strong><br>';
        }


        $panierIdPlat = [];
        $panierQty = [];
        $panierPrice = [];
        $panierLibelle = [];
        $panierImg = [];




        // var_dump('SESSION[panier]Quantité', $_SESSION['panier']['quantite']);
        // echo '<br>';
        // var_dump($_SESSION['panier'], '[quantite]');
        // echo '<br>';
        if (!isset($_SESSION['panier'])) {
            // echo 'le panier est vide';
            if (!isset($_SESSION['panier']['quantite'])) {

                // var_dump($_SESSION['panier']);
                $_SESSION['panier']['quantite'] = $qty;
                $_SESSION['panier']['price'] = $price;
                $_SESSION['panier']['libelle'] = $libelle;
                $_SESSION['panier']['img'] = $img;
                $_SESSION['panier']['id'] = $key;
                // echo '<br>';
                // var_dump('quand panier était vide qty', $qty);
                // echo '<br>';
                // var_dump('quand panier était vide prix', $price);
                // echo '<br>';
                // var_dump('quand panier était vide libelle', $libelle);
                // echo '<br>';
                // var_dump('quand panier était vide img', $img);
                // echo '<br>';
                // var_dump('quand panier était vide clé', $key);
            } else {
                // On sauve ce qui est dans le panier
                array_push($panierQty, $_SESSION['panier']['quantite']);
                array_push($panierPrice, $_SESSION['panier']['price']);
                array_push($panierLibelle, $_SESSION['panier']['libelle']);
                array_push($panierImg, $_SESSION['panier']['img']);
                array_push($panierIdPlat, $_SESSION['panier']['id']);
                echo '<br>';
                // $toto=array_search($libelle,$_SESSION['panier']['libelle'],true);
                $toto = array_search($libelle, $panierLibelle);
                var_dump('toto', $toto);
                var_dump('Panier Qty', $panierQty);

                echo '<br>';
                var_dump('in_Array');
                echo '<br>';
                var_dump($libelle);
                echo '<br>';
                // var_dump($toto);
                echo '<br>';
                var_dump($_SESSION['panier']['libelle']);
                echo '<br>';
                var_dump('fin');

                echo '<br>';

                var_dump('Session', isset($_SESSION['panier']['id']));



                $panierKey = $_SESSION['panier']['id'];

                // On efface le contenu de la session
                unset($_SESSION['panier']['quantite']);
                unset($_SESSION['panier']['price']);
                unset($_SESSION['panier']['libelle']);
                unset($_SESSION['panier']['img']);
                unset($_SESSION['panier']['id']);


                // On ajoute au tablo temporaire les plats choisis
                array_push($panierQty, $qty);
                echo '<br>';
                array_push($panierPrice, $price);
                echo '<br>';

                var_dump('avant ajout', $panierLibelle, $libelle);
                echo '<br>';
                echo '<br>';
                echo '<br>';
                array_push($panierLibelle, $libelle);
                var_dump('Panier Libellé', $panierLibelle, $libelle);
                echo '<br>';
                echo '<br>';
                echo '<br>';
                array_push($panierImg, $img);
                array_push($panierKey, $key);

                echo '<br><u>';
                var_dump('Après ArrayPush', $panierQty, $panierPrice, $panierLibelle, $panierImg, $panierKey);
                echo '</u><br>';
                // On sauve le nouveau tablo dans les variables session
                $_SESSION['panier']['quantite'] = $PanierQty;
                $_SESSION['panier']['price'] = $panierPrice;
                $_SESSION['panier']['libelle'] = $panierLibelle;
                $_SESSION['panier']['img'] = $panierImg;
                $_SESSION['panier']['id'] = $panierKey;
                var_dump('Session', $_SESSION['panier']['libelle']);
                var_dump('Session ID', $_SESSION['panier']['id']);
                echo '<br>';
                $totaux = 0;
                $article = 0;

                foreach ($PanierQty as $key => $value) {
                    $total = $panierPrice[$key] * $value;
                    echo '<br>';
                    echo '<br>';
                    // var_dump('total', $total);
                    echo '<br>';
                    echo '<br>';
                    $totaux += $total;
                    $article += $value;
                }
                $qty = $panierQty;
                $price = $panierPrice;
                $libelle = $panierLibelle;
                $img = $panierImg;
            }
        } 
    }
}


include "view/panier.php";
