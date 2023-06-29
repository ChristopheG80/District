<form action="index.php" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Administration de la base de données</h1>
                <?= (isset($nomTable))?'<h2>pour la table <strong>' . $nomTable . '</strong></h2>':'';?>
                
            </div>
            <div class="col-1">
                <?php
                $r = 1;
                foreach ($conn->query($req) as $row) {
                ?>
                    <div class="col-12 text-center my-2">
                        <input type="submit" class="btn btn-outline-district btn-lg" value="<?= $row[0]; ?>" name="tableN[<?= $r; ?>]" id="tableN<?= $r; ?>" />
                    </div>
                <?php
                    $r++;
                }
                ?>
            </div>
            <div class="col-1">
                <div class="col-12 text-center my-2"><input type="submit" value="AFFICHER" class="btn btn-primary" id="AFFICHER" name="AFFICHER" /></div>
                <div class="col-12 text-center my-2"><input type="submit" value="INSERER" class="btn btn-success" id="INSERER" name="INSERER" /></div>
                <div class="col-12 text-center my-2"><input type="submit" value="MODIFIER" class="btn btn-warning" id="MODIFIER" name="MODIFIER" /></div>
                <div class="col-12 text-center my-2"><input type="submit" value="SUPPRIMER" class="btn btn-danger" id="SUPPRIMER" name="SUPPRIMER" /></div>
            </div>
            <div class="col-10">
                <?php
                
                
                
                foreach ($conn->query($reqTable) as $rows) {
                    ?>
                    <div class="col-12 text-center my-2">
                    <?php
                    for($i=0; $i < count($rows); $i++){
                    // foreach($rows as $row){
                ?>
                   <?= $rows[$i] . '---'; ?>  
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