<?php
include "../../utils/connexion.php";
// echo 'Administration de la base de données';

$conn = connect_bd();

$req="SHOW TABLES";

if (!$conn->query($req)) echo "pas d'accès à la table";

// var_dump($conn);



//var_dump('Coucouvvvvvvv',$_POST['tableN']);
// $reqTable="SELECT * FROM sys.columns WHERE object_id = OBJECT_ID('dbo.maTable')";
// $nomTablee = isset($_POST['tableN']) && !is_null($_POST['tableN'])?$_POST['tableN']:'';
// $nomTablee = isset($_POST['tableN']) && !is_null($_POST['tableN'])?$_POST['tableN']:'categorie';
// $reqTable = "SELECT * FROM " . $nomTablee;
// var_dump($reqTable);

//if (!$conn->query($reqTable)) echo "pas d'accès à la table";


include "view/admin/admin.php";

