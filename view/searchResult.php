<div class="container-fluid">
    <div class="row">
        <div class="col-12 justify-content-center align-items-center districtColor text-center">
        <h1>Résultat pour les catégories</h1>
        </div>
        
        <?php
        
        $zzz=true;
        foreach ($conn_cat->query($req_cat) as $row) {
            $zzz=false;
        ?>
            <div class="col-xl-4 col-md-6 col-12 text-center mx-auto my-2">
                <div class="col-12 animate__animated animate__zoomIn"><img src="images_the_district/category/<?= $row[2]; ?>" class="rounded-3 img_cat"></div>
                <div class="col-12"><button class="text-center btn btn-outline-district btn-cat btn-lg my-1" type="submit" name="catego" value="<?= $row['id']; ?>"><?= $row['libelle']; ?></button></div>
            </div>
        <?php
        }
        if($zzz){
            ?>
        <div class="col-12 justify-content-center align-items-center districtColor text-center">
        <h2>Pas de résultat</h2>
        </div>

            <?php
        }
        ?>
        <div class="col-12 justify-content-center align-items-center districtColor text-center">
        <h1>Résultat pour les plats</h1>
        </div>
        
        <?php
        $zzz=true;
        foreach ($conn_plat->query($req_plat) as $row) {
        $zzz=false;
        ?>
            <div class="col-xl-4 col-md-6 col-12 justify-content-center align-items-center text-center my-2 mx-auto d-flex">
                <div class="card justify-content-center align-items-center text-center bg-light" style="width: 24rem; height:32rem;">
                    <img src="images_the_district/food/<?= $row['img']; ?>" class="card-img-top rounded img-fluid img_card" alt="<?= $row['img']; ?>">
                    <input type="hidden" name="image[<?= $row['id']; ?>]" value="<?= $row['img']; ?>">
                    <div class="card-body overflow-hidden">
                        <h5 class="card-title"><?= $row['libelle']; ?></h5>
                        <input type="hidden" name="libelle[<?= $row['id']; ?>]" value="<?= $row['libelle']; ?>">
                        <p class="card-text"><?= $row['description']; ?></p>
                        <p><input type="hidden" name="price[<?= $row['id']; ?>]" value="<?= $row['prix']; ?>"><?= $row['prix']; ?><?= $devise; ?></p>
                        <p><input type="number" min="0" value="" max="50" id="qty[<?= $row['id']; ?>]" class="w-25" name="qty[<?= $row['id']; ?>]">
                            <input type="submit" name="Commande[<?= $row['id']; ?>]" class="btn btn-primary" value="Commander">
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        
        if($zzz){
            ?>
            <div class="col-12 justify-content-center align-items-center districtColor text-center">
        <h2>Pas de résultat</h2>
        </div>

            <?php
        }
        ?>
        
    </div>
    <script src="assets/js/script_search.js"></script>