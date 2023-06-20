<?php
// Modification etat commande

// Afficher toutes les commandes En préparation, En cours de livraison, Livrée


?>
<div class="container-fluid" id="hautpage">
<div class="row">
<div class="col-4 text-center bg_com my-1"><a href="#prepa" class="btn btn-outline-district">Préparation</a></div>
<div class="col-4 text-center bg_com my-1"><a href="#livraison" class="btn btn-outline-district">Livraison</a></div>
<div class="col-4 text-center bg_com my-1"><a href="#terminee" class="btn btn-outline-district">Livrée</a></div>

<div class="col-12 text-center bg_com" id="prepa"><h1 class="list_com">Commandes en préparation</h1></div>
<?php
foreach($conn_enPrep->query($req_enPrep) as $row_enPrep){
?>
<div class="col-3 my-2 ended_line"><h1><?= substr($row_enPrep['cmd'],0,10); ?></h1></div>
<div class="col-1 my-2 ended_line"><h2><?= $row_enPrep['qty']; ?></h2></div>
<div class="col-2 my-2 ended_line"><h2><?= substr($row_enPrep['cmd'],10); ?></h2></div>
<div class="col-3 my-2 ended_line"><h2><?= $row_enPrep['lib']; ?></h2></div>
<div class="col-1 my-2 ended_line"><img src="images_the_district/food/<?= $row_enPrep['img']; ?>" width="50" height="50" class="border border-danger border-4" /></div>
<div class="col-2 my-2 ended_line"><input type="submit" name="enPrep<?= $row_enPrep['id_com']; ?>" value="Préparée" class="btn btn-danger btn-lg"/></div>

<?php
}
?>
<div class="col-12 text-center bg_com" id="livraison"><h1 class="list_com">Commandes en cours de livraison</h1></div>
<?php
foreach($conn_enLivr->query($req_enLivr) as $row_enLivr){
?>
<div class="col-3 my-2 ended_line"><h1><?= substr($row_enLivr['cmd'],0,10); ?></h1></div>
<div class="col-1 my-2 ended_line"><h2><?= $row_enLivr['qty']; ?></h2></div>
<div class="col-2 my-2 ended_line"><h2><?= substr($row_enLivr['cmd'],10); ?></h2></div>
<div class="col-3 my-2 ended_line"><h2><?= $row_enLivr['lib']; ?></h2></div>
<div class="col-1 my-2 ended_line"><img src="images_the_district/food/<?= $row_enLivr['img']; ?>" width="50" height="50" class="border border-warning border-4" /></div>
<div class="col-2 my-2 ended_line"><input type="submit" name="enLivr<?= $row_enLivr['id_com']; ?>" value="Livrée" class="btn btn-warning btn-lg"/></div>
<?php
}
?>

<div class="col-12 text-center bg_com" id="terminee"><h1 class="list_com">Commandes livrées</h1></div>

<?php
foreach($conn_delivered->query($req_delivered) as $row_delivered){
?>
<div class="col-3 my-2 ended_line"><h1><?= substr($row_delivered['cmd'],0,10); ?></h1></div>
<div class="col-1 my-2 ended_line"><h2><?= $row_delivered['qty']; ?></h2></div>
<div class="col-2 my-2 ended_line"><h2><?= substr($row_delivered['cmd'],10); ?></h2></div>
<div class="col-3 my-2 ended_line"><h2><?= $row_delivered['lib']; ?></h2></div>
<div class="col-3 my-2 ended_line"><img src="images_the_district/food/<?= $row_delivered['img']; ?>" width="50" height="50" class="border border-success border-4" /></div>
<?php
}
?>
</div>
</div>