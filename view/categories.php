<?php
var_dump(isset($_SESSION['panier']['quantite']));
?>
<form action="index.php" method="post">
    <div class="container-fluid content">
        <div class="row">
            <?php
            foreach ($conn->query($req) as $row) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center my-3 mx-auto">
                    <div class="row">
                        <div class="col-12"><img src="images_the_district/category/<?= $row['image']; ?>" class="rounded-3 my-1" width="240em" /></div>
                        <div class="col-12">
                            <button class="text-center btn btn-outline-district btn-cat btn-lg my-1" type="submit" name="catego" value="<?= $row['id']; ?>"><?= $row['libelle']; ?></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            $row2 = $conn2->query($reqMax);
            while ($donnees = $row2->fetch()) {
                $catMax = $donnees['max'];
            }
            $pages_cat = ceil($catMax / 6);
            

            ?>
            <div class="col-12 justify-content-center text-center">
                <input type="hidden" value="<?= isset($page_cat) ? $page_cat : 8; ?>" name="curr_cat_p" id="curr_cat_p" />
                <input type="submit" value="<-" name="last_cat_p" id="last_cat_p" class="btn btn-outline-district districtColor mx-3 <?= $page_cat == 1 ? 'invisible' : ''; ?>" />
                <input type="submit" value="->" name="next_cat_p" id="next_cat_p" class="btn btn-outline-district districtColor mx-3 <?= $page_cat == $pages_cat ? 'invisible' : ''; ?>" />
                <p><?= $page_cat; ?>/<?= $pages_cat; ?></p>

            </div>
        </div>
    </div>
</form>