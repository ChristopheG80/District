<script>
    let catnamejs = [];

    <?php

    $catnamejs = [];
    $conn = connect_bd();
    $req = "SELECT DISTINCT `libelle` FROM categorie WHERE active='Yes' ORDER BY `libelle`";
    if (!$conn->query($req)) echo "pas d'accès à la table";
    else {
        foreach ($conn->query($req) as $row) {
            $catname .= '"' . $row['libelle'] . '",';
        }
    }
    ?>
    catnamejs.push(<?= $catname; ?>);

    let platnamejs = [];
    <?php
    $platnamejs = [];
    $req = "SELECT DISTINCT `libelle` FROM plat ORDER BY `libelle`;";
    if (!$conn->query($req)) echo "pas d'accès à la table";
    else {
        foreach ($conn->query($req) as $row) {
            $platname .= '"' . $row['libelle'] . '",';
        }
    }
    ?>


    platnamejs.push(<?= $platname; ?>);
    let searchbarjs = platnamejs.concat(catnamejs);
    // $("#searchbar").autocomplete({
    //     source: searchbarjs
    // });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 justify-content-center align-items-center searchBar">
            <nav class="navbar justify-content-center align-items-center">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 districtColor" type="search" placeholder="Recherche" aria-label="Recherche" id="searchbar" autocomplete="no">
                    <button class="btn btn-outline-district" type="submit" id="searchbtn">Search</button>
                </form>
            </nav>
        </div>
    </div>
</div>
<script src="assets/js/script_search.js"></script>