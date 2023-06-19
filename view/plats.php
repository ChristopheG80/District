<form action="index.php" method="post" name="F_Plats">
<div class="container-fluid">
  <div class="row">
<?php
foreach($conn->query($req) as $row){
?>

    <div class="col-xl-4 col-md-6 col-12 text-center my-2 mx-auto">
      <div class="card justify-content-end" style="width: 24rem; height:32rem;">
        <img src="images_the_district/food/<?= $row['image']; ?>" class="card-img-top rounded" alt="<?= $row['image']; ?>" style="width: 12rem; height:12rem;">
        <div class="card-body overflow-hidden">
          <h5 class="card-title"><?= $row['libelle']; ?></h5>
          <p class="card-text"><?= $row['description']; ?></p>
          <p class="text-bold"><?= $row['prix']; ?><?= $devise; ?></p>
          <p><input type="number" min="1" value="1" length="1" id="qty" class="w-25" />
          <a href="index.php?choix=addpanier&plat=<?= $row['id']; ?>&qty=1" class="btn btn-primary">Commander</a>
          </p>
        </div>
      </div>
    </div>

<?php
}
?>

  </div>
</div>
</form>