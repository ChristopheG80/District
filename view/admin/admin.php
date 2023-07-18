<form action="index.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Administration de la base de données</h1>
                <?= (isset($nomTable)) ? '<h2>pour la table <strong>' . $nomTable . '</strong></h2>' : ''; ?>

            </div>
            <?php
            $tablo = ['categorie', 'plat'];
            foreach ($tablo as $row) {
            ?>
                <div class="col-6 text-center my-2">
                    <input type="submit" class="btn btn-outline-district btn-lg" value="<?= $row; ?>" name="tableN[<?= $row; ?>]" id="tableN<?= $row; ?>">
                </div>
            <?php
            }
            ?>


            <?php

            if (isset($nomTable)) {
                if ($nomTable == 'categorie') {
            ?>
                    <div class="col-1 text-center"><strong>id</strong></div>
                    <div class="col-3 text-center"><strong>libelle</strong></div>
                    <div class="col-4 text-center"><strong>image</strong></div>
                    <div class="col-4 text-center"><strong>active&nbsp;</strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                        </svg>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z">
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z">
                        </svg></div>
                    <!-- Boucle pour les enregistrements -->
                    <?php
                    foreach ($listCat as $rowCat) {
                    ?>





                        <div class="col-1 text-center my-1"><input type="number" readonly value="<?= $rowCat['ide']; ?>" class="text-center w-100"></div>
                        <div class="col-2 text-center my-1"><input type="text" value="<?= $rowCat['lib']; ?>" name="catLib[<?= $rowCat['ide']; ?>]" id="catLib[<?= $rowCat['ide']; ?>]" class="text-center w-100"></div>
                        <div class="col-5 my-1">
                            <img src="images_the_district/category/<?= $rowCat['img']; ?>" alt="<?= $rowCat['lib']; ?>" class="img_small text-left">
                            <?= $rowCat['img']; ?>
                            <input type="file" value="" name="catImg[<?= $rowCat['ide']; ?>]" id="catImg[<?= $rowCat['ide']; ?>]" class="text-right">
                            </div>
                        <div class="col-4 justify-content-center align-content-center text-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" <?= $rowCat['active'] == 'Yes' ? 'checked' : ''; ?> name="catActive[<?= $rowCat['ide']; ?>]" id="catActive[<?= $rowCat['ide']; ?>]" class="form-check-input text-center w-25" role="switch">
                            <input type="submit" value="Modifier" name="modCat[<?= $rowCat['ide']; ?>]" id="modCat[<?= $rowCat['ide']; ?>]" class="btn btn-warning">
                            <input type="submit" value="Effacer"  name="delCat[<?= $rowCat['ide']; ?>]" id="delCat[<?= $rowCat['ide']; ?>]"class="btn btn-danger">
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-1 text-center my-1"><input type="number" readonly value=""></div>
                    <div class="col-3 text-center my-1"><input type="text" value="" placeholder="libelle" id="newCatLib" name="newCatLib" ></div>
                    <div class="col-4 text-center my-1">
                        <input type="text" value="" placeholder="image" id="newCatImg" name="newCatImg" >
                        <input type="file" value="" id="newCatFileImg" name="newCatFileImg" >
                    </div>
                    <div class="col-2 justify-content-center my-1 form-check form-switch">
                        <input type="checkbox" value="Yes/No" checked class="form-check-input w-50" role="switch">
                    </div>
                    <div class="col-2 text-center my-1 mx-auto">
                        <input type="submit" value="Ajouter" name="newCat" id="newCat" class="btn btn-success">
                    </div>

                <?php
                } elseif ($nomTable == 'plat') {
                ?>
              
              
              
              
              
              <div class="col-1 text-center"><strong>libelle/prix</strong></div>
                    <div class="col-1 text-center"><strong>description</strong></div>
            
                    <div class="col-6 text-center"><strong>image</strong></div>
                    <div class="col-1 text-center"><strong>catégorie</strong></div>
                    <div class="col-3 text-center"><strong>active</strong>&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                        </svg>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z">
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z">
                        </svg>
                    </div>




                <?php
                    foreach ($listPlat as $rowPlat) {
                    ?>
                        <div class="col-2 text-center my-1">
                            <input type="text" value="<?= $rowPlat['lib']; ?>" name="platLib[<?= $rowPlat['ide']; ?>]" id="platLib[<?= $rowPlat['ide']; ?>]" class="text-center">
                            <input type="text" value="<?= $rowPlat['prix']; ?>" name="platPrice[<?= $rowPlat['ide']; ?>]" id="platPrice[<?= $rowPlat['ide']; ?>]" class="text-center">
                        </div>
                        <div class="col-2 text-center my-1">
                            <textarea cols="20" rows="5" name="platDescr[<?= $rowPlat['ide']; ?>]" id="platDescr[<?= $rowPlat['ide']; ?>]"><?= $rowPlat['descr']; ?></textarea>
                        </div>
                        
                        <div class="col-5 text-center my-1 mx-auto">
                            <img src="images_the_district/food/<?= $rowPlat['img']; ?>" alt="<?= $rowPlat['lib']; ?>" class="img_small">
                            <input type="text" value="<?= $rowPlat['img']; ?>" name="platImg[<?= $rowPlat['ide']; ?>]" id="platImg[<?= $rowPlat['ide']; ?>]">
                            <input type="file" value="" name="platFileImg[<?= $rowPlat['ide']; ?>]" id="platFileImg[<?= $rowPlat['ide']; ?>]">
                        </div>

                        <div class="col-1 text-center my-1">
                            <select name="platIDCat[<?= $rowPlat['ide']; ?>]" id="platIDCat[<?= $rowPlat['ide']; ?>]">
                                <?php

                                foreach ($listCat as $rowListCat) {
                                ?>
                                    <option value="<?= $rowListCat['id']; ?>" <?= $rowListCat['id']==$rowPlat['idcat']?'selected':''; ?>><?= $rowListCat['lib']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-2 justify-content-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" checked class="form-check-input w-25 mx-auto" role="switch" name="platActive[<?= $rowPlat['ide']; ?>]" id="platActive[<?= $rowPlat['ide']; ?>]">
                            <input type="submit" value="Modifier" name="modCat[<?= $rowPlat['ide']; ?>]" id="modCat[<?= $rowPlat['ide']; ?>]" class="btn btn-warning">
                            <input type="submit" value="Effacer" name="delCat[<?= $rowPlat['ide']; ?>]" id="delCat[<?= $rowPlat['ide']; ?>]" class="btn btn-danger">
                        </div>
                    <?php
                    } 
                    ?>
                    <div class="col-1 text-center my-1"><input type="number" readonly value="19"></div>
                    <div class="col-1 text-center my-1"><input type="text" value="" placeholder="libelle" name="newPlatLib[<?= $rowPlat['ide']; ?>]" id="newPlatLib[<?= $rowPlat['ide']; ?>]"></div>
                    <div class="col-4 text-center my-1"><input type="text" value="" placeholder="description"  name="newPlatDescr[<?= $rowPlat['ide']; ?>]" id="newPlatDescr[<?= $rowPlat['ide']; ?>]"></div>
                    <div class="col-1 text-center my-1"><input type="text" value="" placeholder="prix ex: 15.00"  name="newPlatPrice[<?= $rowPlat['ide']; ?>]" id="newPlatPrice[<?= $rowPlat['ide']; ?>]"></div>
                    <div class="col-1 text-center my-1">
                        <input type="text" value="image" name="newPlatImg[<?= $rowPlat['ide']; ?>]" id="newPlatImg[<?= $rowPlat['ide']; ?>]">
                    <input type="file" value="" name="newPlatFileImg[<?= $rowPlat['ide']; ?>]" id="newPlatFileImg[<?= $rowPlat['ide']; ?>]">
                </div>

                    <div class="col-1 text-center my-1">
                        <select name="" id="">
                            <?php
                            foreach ($listCat as $rowListCat) {
                                ?>
                                    <option value="<?= $rowListCat['id']; ?>"><?= $rowListCat['lib']; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-2 justify-content-center my-1 form-check form-switch">
                        <input type="checkbox" value="Yes/No" checked class="form-check-input w-50" role="switch">
                    </div>
                    <div class="col-2 text-center my-1 mx-auto">
                        <input type="submit" value="Ajouter" name="newPlat" id="newPlat" class="btn btn-success">
                    </div>
                <?php
                }
            }
            ?>
            <!-- <div class="col-12 text-center my-2"><label for="description">Description</label><textarea cols="20" rows="5" id="description" name="description"></textarea></div> -->
        </div>
    </div>
    </div>
</form>