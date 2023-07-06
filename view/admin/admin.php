<form action="index.php" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Administration de la base de données</h1>
                <?= (isset($nomTable)) ? '<h2>pour la table <strong>' . $nomTable . '</strong></h2>' : ''; ?>

            </div>
            <?php
            $r = 1;
            foreach ($conn->query($req) as $row) {
            ?>
                <div class="col-3 text-center my-2">
                    <input type="submit" class="btn btn-outline-district btn-lg" value="<?= $row[0]; ?>" name="tableN[<?= $r; ?>]" id="tableN<?= $r; ?>" />
                </div>
            <?php
                $r++;
            }
            ?>


            <?php

            if (isset($nomTable)) {
                if ($nomTable == 'categorie') {
            ?>
                    <div class="col-1 text-center"><strong>id</strong></div>
                    <div class="col-3 text-center"><strong>libelle</strong></div>
                    <div class="col-4 text-center"><strong>image</strong></div>
                    <div class="col-2 text-center"><strong>active</strong></div>
                    <div class="col-2 text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg></div>
                    <!-- Boucle pour les enregistrements -->
                    <?php
                    foreach($reqTable as $rowCat) {
                    ?>
                        <div class="col-1 text-center my-1"><input type="number" readonly value="<?= $rowCat['ide']; ?>" /></div>
                        <div class="col-3 text-center my-1"><input type="text" value="<?= $rowCat['lib']; ?>" /></div>
                        <div class="col-4 text-center my-1"><input type="text" value="<?= $rowCat['img']; ?>" /><input type="file" value="" /></strong></div>
                        <div class="col-2 justify-content-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" <?= $rowCat['active']=='Yes'?'checked':''; ?> class="form-check-input" role="switch" />
                        </div>
                        <div class="col-2 text-center my-1 mx-auto">
                            <input type="submit" value="&nbsp;" class="btn btn-warning" /><input type="submit" value="&nbsp;" class="btn btn-danger" />
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-1 text-center my-1"><input type="number" readonly value="" /></div>
                        <div class="col-3 text-center my-1"><input type="text" value="" placeholder="libelle" /></div>
                        <div class="col-4 text-center my-1"><input type="text" value="" placeholder="image" /><input type="file" value="" /></strong></div>
                        <div class="col-2 justify-content-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" checked class="form-check-input" role="switch" />
                        </div>
                        <div class="col-2 text-center my-1 mx-auto">
                            <input type="submit" value="&nbsp;" class="btn btn-success" />
                        </div>

                <?php
                } elseif ($nomTable == 'plat') {
                ?>
                    <div class="col-1 text-center"><strong>id</strong></div>
                    <div class="col-1 text-center"><strong>libelle</strong></div>
                    <div class="col-4 text-center"><strong>description</strong></div>
                    <div class="col-1 text-center"><strong>prix</strong></div>
                    <div class="col-2 text-center"><strong>image</strong></div>
                    <div class="col-1 text-center"><strong>catégorie</strong></div>
                    <div class="col-1 text-center"><strong>active</strong></div>
                    <div class="col-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg></div>

                    <?php
                    for ($i = 1; $i < 6; $i++) {
                    ?>
                        <div class="col-1 text-center my-1"><input type="number" readonly value="<?= rand(5, 20); ?>" /></div>
                        <div class="col-1 text-center my-1"><input type="text" value="libelle" /></div>
                        <div class="col-4 text-center my-1"><input type="text" value="description" /></div>
                        <div class="col-1 text-center my-1"><input type="number" readonly value="<?= rand(5, 20); ?>" /></div>

                        <div class="col-2 text-center my-1"><input type="text" value="image" /><input type="file" value="" /></strong></div>

                        <div class="col-1 text-center my-1">
                            <select name="" id="">
                                <?php
                                for ($zz = 1; $zz < 6; $zz++) {
                                ?>
                                <option value="<?= $zz; ?>"><?= $zz; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-1 justify-content-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" checked class="form-check-input" role="switch" />
                        </div>
                        <div class="col-1 text-center my-1 mx-auto">
                            <input type="submit" value="&nbsp;" class="btn btn-warning" /><input type="submit" value="&nbsp;" class="btn btn-danger" />
                        </div>
                <?php
                    }?>
                    <div class="col-1 text-center my-1"><input type="number" readonly value="" /></div>
                        <div class="col-1 text-center my-1"><input type="text" value="" placeholder="libelle" /></div>
                        <div class="col-4 text-center my-1"><input type="text" value="" placeholder="description" /></div>
                        <div class="col-1 text-center my-1"><input type="number" readonly value="" placeholder="prix ex: 15.00" /><?= $devise; ?></div>

                        <div class="col-2 text-center my-1"><input type="text" value="image" /><input type="file" value="" /></strong></div>

                        <div class="col-1 text-center my-1">
                            <select name="" id="">
                                <?php
                                for ($zz = 1; $zz < 6; $zz++) {
                                ?>
                                <option value="<?= $zz; ?>" <?= $zz==3?'selected':'';?>><?= $zz; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-1 justify-content-center my-1 form-check form-switch">
                            <input type="checkbox" value="Yes/No" checked class="form-check-input" role="switch" />
                        </div>
                        <div class="col-1 text-center my-1 mx-auto">
                            <input type="submit" value="&nbsp;" class="btn btn-warning" /><input type="submit" value="&nbsp;" class="btn btn-danger" />
                        </div>
                <?php
                    }
            }

            foreach ($reqTable as $rows) {
                ?>
                <div class="col-12 text-center my-2">
                    <?php
                    for ($i = 0; $i < count($rows); $i++) {
                        // foreach($rows as $row){
                    ?>
                        <?= $rows[$i] . ' --- '; ?>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>

            <div class="col-12 text-center my-2"><label for="">Label</label><input type="text" value="" id="" name="" /></div>
            <div class="col-12 text-center my-2"><label for="">Label</label><input type="text" value="" id="" name="" /></div>
            <div class="col-12 text-center my-2"><label for="">Label</label><input type="file" value="" id="" name="" /></div>
            <div class="col-12 text-center my-2"><label for="">Label</label><input type="text" value="" id="" name="" /></div>
            <div class="col-12 text-center my-2"><label for="">Label</label><input type="text" value="" id="" name="" /></div>
            <div class="col-12 text-center my-2"><label for="description">Description</label><textarea cols="20" rows="5" id="description" name="description"></textarea></div>

        </div>
    </div>
    </div>
</form>