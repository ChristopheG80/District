<?php
include "../../utils/connexion.php";
echo 'Administration de la base de données';

$conn = connect_bd();

$req="SHOW TABLES";

if (!$conn->query($req)) echo "pas d'accès à la table";

// var_dump($conn);

?>





<?php





include "view/admin/admin.php";

