<?php
// Connexion à la base de données

define('USER',"christophe");
define('PASSWD',"Afpa318967");
define('SERVER',"amorce.org/phpmyadmin");
define('BASE',"christophe");

function connect_bd(){
	$dsn="mysql:dbname=".BASE.";host=".SERVER;
		try{
		$conn=new PDO($dsn,USER,PASSWD);
		}
		catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
		}
	return $conn;
}
?>