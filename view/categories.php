<form action="index.php" method="post">
<div class="container-fluid">
    <div class="row">
<?php
foreach($conn->query($req) as $row){
?>

<div class="col-xl-4 col-md-6 col-12 text-center my-2">
    <img src="images_the_district/category/<?= $row['image']; ?>" class="rounded-3" width="400" />
    <span class="text-center"><?= $row['libelle']; ?></span>
</div>

<?php
}
?>

    </div>
</div>
</form>