<?php
include "../../utils/connexion.php";
// echo 'Administration de la base de données';
include "../../utils/DAO.class.php";


$conn = connect_bd();


if (isset($_POST['tableN'])) {
    $nomTable = key($_POST['tableN']);

    if ($nomTable == 'categorie') {
        $cat = new categorie();
        $listCat = $cat->showAllCat();
    }

    if ($nomTable == 'plat') {
        $cat = new categorie();
        $listCat = $cat->listCat();
        $plat = new plat();
        $listPlat = $plat->showAllPlat();
    }
}






// $req = "SHOW TABLES";

// if (!$conn->query($req)) echo "pas d'accès à la table";

// foreach ($conn->query($req) as $rowTable) {
//     $choixTables = empty($choixTables) ? $rowTable : $choixTables;
// }
// var_dump($choixTables);


// $choixTables = !is_null($_POST['tableN']) ? $_POST['tableN'] : $choixTables;

// foreach ($choixTables as $cTable) {
//     $reqTable = "SELECT * FROM " . $cTable . ";";
//     $nomTable = $cTable;
// }

// if ($nomTable == 'categorie'){
//     $catAll = new categorie();
//     $reqTable = $catAll->showAllCat();
// }
// if ($nomTable == 'plat'){
//     $platCook = new plat();
//     $reqTable = $platCook-> adminShowPlatCat();
//     $platCat = new categorie();
//     $reqCat = $platCat->showAllCat();
// }



// $tablo_cat = array("id", "libelle", "image", "active");
// //$tablo_com = array("id", "id_plat", "quantite", "total", "date_commande", "etat", "nom_client", "telephone_client", "email_client", "adresse_client");
// $tablo_pla = array("id", "libelle", "description", "prix", "image", "id_categorie", "active");
// //$tablo_uti = array("id", "nom_prenom", "email", "password");



// var_dump('bbb',$nomTable);
// if (!$conn->query($reqTable)) echo "pas d'accès à la table";


//     $reqField = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'" . $nomTable . "';";

//     var_dump('cccccccc');
// if (!$conn->query($reqField)) echo "pas d'accès à la table";
// $cpt = 0;
// foreach ($conn->query($reqField) as $rowFields) {
//     var_dump($rowFields['COLUMN_NAME']);
//     $cpt++;
// }
// echo '<br>';
// var_dump('ererererer',$cpt);

include "view/admin/admin.php";
