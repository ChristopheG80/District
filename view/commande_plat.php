<form action="index.php" method="post">
    <div class="container-fluid">
        <div class="row">
            <?php
            while ($row = $platCom->fetch(PDO::FETCH_OBJ)) {
            ?>
                <div class="col-12">
                    <h1><?= $row->libelle; ?></h1>
                    <input type="hidden" value="<?= $row->libelle; ?>" name="libName">
                </div>
                <div class="col-3">
                    <img src="images_the_district/food/<?= $row->image; ?>" alt="<?= $row->libelle; ?>" class="img_card rounded">
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-12 my-2"><?= $row->description; ?></div>
                        <div class="col-12"><hr class="text-center districtColor"></div>
                        <div class="col-2"><span id="prix"><?= $row->prix; ?></span><?= $devise; ?></div>

                        <div class="col-2">Quantité
                            <input type="number" min="1" max="50" id="quantite" name="quantite" class="text-center" value="1">
                            <input type="hidden" id="quantyty" name="quantyty" value="<?= $row->id; ?>">
                        </div>
                        <div class="col-2"><input type="text" readonly id="prixQte" name="prixQte" value="<?= $row->prix; ?>"><?= $devise; ?></div>
                        <div class="col-4"><input type="submit" value="Commander" id="quantiteCom" name="quantiteCom" class="btn btn-lg btn-outline-district"></div>

                    </div>
                <?php
            }
                ?>
                </div>
                
                <div class="col-6 my-2 text-center">
                    <label for="emailCust">Votre email</label><br><input type="email" name="emailCust" id="emailCust" class="districtColor text-center">
                </div>
                <div class="col-6 my-2 text-center">
                    <label for="phoneCust">Votre téléphone</label><br><input type="tel" name="phoneCust" id="phoneCust" class="districtColor text-center">
                </div>
                <div class="col-6 my-2 text-center">
                    <label for="nameCust">Vos nom prénom </label><br><input type="text" name="nameCust" id="nameCust" class="districtColor text-center">
                </div>
                <div class="col-6 my-2 text-center">
                    <label for="adressCust">Votre adresse</label><br><textarea cols="20" rows="5" name="addressCust" id="addressCust" class="districtColor w-75"></textarea>
                </div>
                <div class="col-12" id="bas_page">&nbsp;</div>
        </div>
    </div>
</form>
<script src="assets/js/script_commande.js"></script>