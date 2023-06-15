<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center my-2 districtColor"><h1>Catégories les plus populaires</h1></div>
        <?php
            foreach($conn->query($req) as $row){
            ?>
            <div class="col-xl-4 col-md-6 col-12 text-center mx-auto my-2">
                <div class="col-12"><img src="images_the_district/category/<?= $row[2]; ?>" class="rounded-3" width="400" height="500" /></div>
                <div class="col-12 districtColor"><?= $row[1]; ?></div>
            </div>
    
<?php
 } 
?>

     
    <div class="col-12 text-center my-2 mx-auto districtColor"><h1>Les Plats les plus populaires</h1></div>
        <?php
        foreach($conn2->query($req2) as $row2){
            ?>
    <div class="col-xl-4 col-md-6 col-12 text-center my-2">
        <div class="col-12"><img src="images_the_district/food/<?= $row2['image']; ?>" class="rounded-3" width="400" height="500" /></div>
        <div class="col-12 districtColor"><?= $row2['libelle']; ?></div>
    </div>        
    <?php 
}
 ?>  
    </div>
</div>