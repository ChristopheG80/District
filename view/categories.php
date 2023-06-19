<form action="index.php" method="post">
<div class="container-fluid">
    <div class="row">
<?php
foreach($conn->query($req) as $row){
?>

        <div class="col-xl-4 col-md-6 col-12 text-center my-3">
        <div class="row">
        <div class="col-12"><img src="images_the_district/category/<?= $row['image']; ?>" class="rounded-3 my-1" width="240em" /></div>
        <div class="col-12">
            <button class="text-center btn btn-outline-district btn-cat btn-lg my-1" type="submit" name="catego" value="<?= $row['id']; ?>"><?= $row['libelle']; ?></button>
        </div>
        </div>
        </div>    
<?php
}
?>

    </div>
</div>
</form>