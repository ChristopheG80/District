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
            foreach ($conn2->query($req2) as $row2) {
            ?>
                <div class="col-xl-4 col-md-6 col-12 text-center my-2">
                    <div class="col-12"><img src="images_the_district/food/<?= $row2['image']; ?>" class="rounded-3" width="200rem" /></div>
                    <div class="col-12 districtColor" height="350rem"><button class="text-center btn btn-outline-district btn-cat my-1" type="submit" name="platcom" value="<?= $row2['id']; ?>"><?= $row2['libelle']; ?></button></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</form>