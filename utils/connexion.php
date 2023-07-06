<?php
// Connexion à la base de données

if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
	define('USER', "admin");
	define('PASSWD', "Afpa1234");
	define('SERVER', "localhost");
	define('BASE', "District");
} else {
	define('USER', "christophe");
	define('PASSWD', "Afpa318967");
	define('SERVER', "localhost");
	define('BASE', "christophe");
}
function connect_bd()
{
	$dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
	try {
		$conn = new PDO($dsn, USER, PASSWD);
	} catch (PDOException $e) {
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
	}
	return $conn;
}
