<form action="index.php" method="post" name="F_Plats">
<div class="container-fluid">
    <div class="row">
<?php
foreach($conn->query($req) as $row){
?>

<div class="col-xl-4 col-md-6 col-12 text-center my-2">

<div class="card" style="width: 18rem;">
  <img src="images_the_district/food/<?= $row['image']; ?>" class="card-img-top rounded" alt="<?= $row['image']; ?>" style="width: 5rem; height:5rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $row['libelle']; ?></h5>
    <p class="card-text"><?= $row['description']; ?></p>
    <a href="#" class="btn btn-primary">Commander</a>
  </div>
</div>






</div>

<?php
}
?>

    </div>
</div>
</form>