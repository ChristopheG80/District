<?php
?>
<form action="index.php" method="post">
    <div class="container-fluid content">
        <div class="row">
            <div class="col-12 text-center my-2 districtColor">
                <h1>Catégories les plus populaires</h1>
            </div>
            <?php
            foreach ($catPop as $row) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center mx-auto my-2">
                    <div class="col-12 animate__animated animate__zoomIn">
                        <img src="images_the_district/category/<?= $row['img']; ?>" class="rounded-3 img_cat" alt="<?= $row['libelle']; ?>">
                    </div>
                    <div class="col-12"><button class="text-center btn btn-outline-district btn-cat btn-lg my-1" type="submit" name="catego" value="<?= $row['id']; ?>"><?= $row['libelle']; ?></button></div>
                </div>
            <?php
            }
            ?>
            <div class="col-12 text-center my-2 mx-auto districtColor">
                <h1>Les Plats les plus populaires</h1>
            </div>
            <?php
            foreach ($platpopulair as $row2) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center my-2 mx-auto d-flex">
          <div class="card justify-content-end card_fw">
            <img src="images_the_district/food/<?= $row2['img']; ?>" class="card-img-top rounded img-fluid" alt="<?= $row2['img']; ?>" style="width: 12rem; height:12rem;">
            <input type="hidden" name="image[<?= $row2['ide']; ?>]" value="<?= $row2['img']; ?>">
            <div class="card-body overflow-hidden">
              <h5 class="card-title"><?= $row2['lib']; ?></h5>
              <input type="hidden" name="libelle[<?= $row2['ide']; ?>]" value="<?= $row2['lib']; ?>">
              <p class="card-text"><?= $row2['descr']; ?></p>
              <p><input type="hidden" name="price[<?= $row2['ide']; ?>]" value="<?= $row2['prix']; ?>"><?= $row2['prix']; ?><?= $devise; ?></p>
              <p><input type="number" min="0" value="" max="50" id="qty[<?= $row2['ide']; ?>]" class="w-25" name="qty[<?= $row2['ide']; ?>]">
                <input type="submit" name="Commande[<?= $row2['ide']; ?>]" class="btn btn-primary" value="Commander">
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