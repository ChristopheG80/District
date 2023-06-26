<?php
include "../../utils/connexion.php";
echo 'Administration de la base de données';

$conn = connect_bd();

$req="SHOW TABLES";

if (!$conn->query($req)) echo "pas d'accès à la table";

// var_dump($conn);

?>

<div class="col-12">Sauvegarder la base</div>
<div class="col-12"><input type="submit" name="sauvegarderBase" value="Sauvegarder" /></div>


<div class="col-12">Restaurer la base</div>
<div class="col-12"><input type="submit" name="restaurerBase" value="Restaurer" /></div>




<?php


foreach ($conn->query($req) as $row) {
    var_dump($row[0]);
    foreach($row[0] as $key2 => $row2){
        echo $row . '<br />';
    }
}



include "view/admin/admin.php";

