<?php
// var_dump(isset($_SESSION['panier']['quantite']));
?>
<form action="index.php" method="post" name="F_Plats">
  <div class="container-fluid justify-content-center content">
    <div class="row">
      <?php
      foreach ($conn->query($req) as $row) {
      ?>

        <div class="col-xl-4 col-md-6 col-12 text-center my-2 mx-auto">
          <div class="card justify-content-end card_fw">
            <img src="images_the_district/food/<?= $row['img']; ?>" class="card-img-top rounded img-fluid" alt="<?= $row['img']; ?>" style="width: 12rem; height:12rem;">
            <input type="hidden" name="image[<?= $row['id']; ?>]" value="<?= $row['img']; ?>">
            <div class="card-body overflow-hidden">
              <h5 class="card-title"><?= $row['libelle']; ?></h5>
              <input type="hidden" name="libelle[<?= $row['id']; ?>]" value="<?= $row['libelle']; ?>">
              <p class="card-text"><?= $row['description']; ?></p>
              <p><input type="hidden" name="cle[<?= $row['id']; ?>]" value="<?= $row['id']; ?>"><input type="hidden" name="price[<?= $row['id']; ?>]" value="<?= $row['prix']; ?>"><?= $row['prix']; ?><?= $devise; ?></p>
              <p><input type="number" min="0" value="" max="50" id="qty[<?= $row['id']; ?>]" class="w-25" name="qty[<?= $row['id']; ?>]">
                <input type="submit" name="Commande[<?= $row['id']; ?>]" class="btn btn-primary" value="Commander">
              </p>
            </div>
          </div>
        </div>

      <?php
      }
      $row2 = $conn2->query($reqMax);
            while ($donnees = $row2->fetch()) {
                $platMax = $donnees['max'];
            }
            $pages_plat = ceil($platMax/6);
            

            ?>
            <div class="col-12 justify-content-center text-center">
                <input type="hidden" value="<?= isset($page_plat) ? $page_plat : 1; ?>" name="curr_plat_p" id="curr_plat_p">
                <input type="submit" value="<-" name="last_plat_p" id="last_plat_p" class="btn btn-outline-district districtColor mx-3 <?= $page_plat == 1 ? 'invisible' : ''; ?>">
                <input type="submit" value="->" name="next_plat_p" id="next_plat_p" class="btn btn-outline-district districtColor mx-3 <?= $page_plat == $pages_plat ? 'invisible' : ''; ?>">
                <p><?= $page_plat; ?>/<?= $pages_plat; ?></p>

            </div>

    </div>
  </div>
</form>