<?php



// var_dump($_SESSION);
$qty2=      $_SESSION['panier']['quantite'];
$price2=    $_SESSION['panier']['price'];
$libelle2=  $_SESSION['panier']['libelle'];
$img2=      $_SESSION['panier']['img'];
$key2=      $_SESSION['panier']['id'];

?>
<form action="index.php" method="post">
<div class="container-fluid content">
    <div class="row">
        <?php
         foreach($qty2 as $key => $value){
 ?>
        <div class="col-3 my-1 bg_com districtColor"><?= $libelle2[$key]; ?></div>
        <div class="col-3 my-1 bg_com districtColor"><?= $price2[$key]; ?><?= $devise; ?></div>
        <div class="col-3 my-1 bg_com districtColor"><img src="images_the_district/food/<?= $img2[$key]; ?>" width="50" height="40" class="border border-2" /></div>
        <div class="col-3 my-1 bg_com districtColor">
            <input type="hidden" value="<?= $libelle2[$key]; ?>" name="lib[<?= $key2; ?>]" id="lib[<?= $key2; ?>]"/>
            <input type="hidden" value="<?= $price2[$key]; ?>" name="price[<?= $key2; ?>]" id="price[<?= $key2; ?>]"/>
            <input type="hidden" value="<?= $img2[$key]; ?>" name="img[<?= $key2; ?>]" id="img[<?= $key2; ?>]"/>
            <input type="submit" value="-" name="subQty" class="btn btn-outline-district" />
            &nbsp;&nbsp;&nbsp;<?= $qty2[$key]; ?>&nbsp;&nbsp;&nbsp;
            <input type="submit" value="+" name="addQty" class="btn btn-outline-district" />&nbsp;&nbsp;&nbsp;
            <input type="submit" value="X" name="delQty" class="btn btn-outline-district" />
        </div>
        <?php
        }
        ?>
        <div class="col-12 text-end bg_com"><?= $article; ?>&nbsp;articles --- Total de la commande <?= $totaux; ?><?= $devise; ?>&nbsp;&nbsp;&nbsp;</div>
        <label for="emailCust">Votre email</label><input type="email" name="emailCust" id="emailCust" class="districtColor">
        <label for="phoneCust">Votre téléphone</label><input type="tel" name="phoneCust" id="phoneCust" class="districtColor">
        <label for="adressCust">Votre adresse</label><input type="text" name="addressCust" id="addressCust" class="districtColor">
        <label for="nameCust">Vos nom prénom </label><input type="text" name="nameCust" id="nameCust" class="districtColor">

        <div class="col-12"><input type="submit" class="btn btn-outline-district" value="Commander" name="passerCommande"/></div>
    </div>
</div>
</form>