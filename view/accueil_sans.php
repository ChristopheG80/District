<form action="index.php" method="post">
    <div class="container-fluid content">
        <div class="row">
            <div class="col-12 text-center my-2 districtColor">
                <h1>Catégories les plus populaires</h1>
            </div>
            <?php
            foreach ($conn->query($req) as $row) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center mx-auto my-2">
                    <div class="col-12 animate__animated animate__zoomIn"><img src="images_the_district/category/<?= $row[2]; ?>" class="rounded-3" width="300rem" /></div>
                    <div class="col-12"><button class="text-center btn btn-outline-district btn-cat btn-lg my-1" type="submit" name="catego" value="<?= $row['id']; ?>"><?= $row['libelle']; ?></button></div>
                </div>
            <?php
            }
            ?>
            <div class="col-12 text-center my-2 mx-auto districtColor">
                <h1>Les Plats les plus populaires</h1>
            </div>
            <?php
            foreach ($conn2->query($req2) as $row) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center my-2 mx-auto">
          <div class="card justify-content-end" style="width: 24rem; height:32rem;">
            <img src="images_the_district/food/<?= $row['img']; ?>" class="card-img-top rounded img-fluid" alt="<?= $row['img']; ?>" style="width: 12rem; height:12rem;">
            <input type="hidden" name="image[<?= $row['id']; ?>]" value="<?= $row['img']; ?>" />
            <div class="card-body overflow-hidden">
              <h5 class="card-title"><?= $row['libelle']; ?></h5>
              <input type="hidden" name="libelle[<?= $row['id']; ?>]" value="<?= $row['libelle']; ?>" />
              <p class="card-text"><?= $row['description']; ?></p>
              <p><input type="hidden" name="price[<?= $row['id']; ?>]" value="<?= $row['prix']; ?>" /><?= $row['prix']; ?><?= $devise; ?></p>
              <p><input type="number" min="0" value="" max="50" id="qty[<?= $row['id']; ?>]" class="w-25" name="qty[<?= $row['id']; ?>]" />
                <input type="submit" name="Commande[<?= $row['id']; ?>]" class="btn btn-primary" value="Commander" />
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