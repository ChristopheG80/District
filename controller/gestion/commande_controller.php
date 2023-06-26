<?php

$conn_enPrep = connect_bd();
$req_enPrep="SELECT c.id id_com, c.quantite qty, p.id, p.image img, c.nom_client nom, c.date_commande cmd, p.libelle lib, c.nom_client nom, c.adresse_client adress 
FROM commande AS c
JOIN plat AS p ON c.id_plat = p.id
WHERE c.etat='En préparation'
ORDER BY c.date_commande DESC;";
if(!$conn_enPrep->query($req_enPrep)) echo "pas d'accès à la table";


$conn_enLivr = connect_bd();
$req_enLivr="SELECT c.id id_com, c.quantite qty, p.id, p.image img, c.nom_client nom, c.date_commande cmd, p.libelle lib
FROM commande AS c
JOIN plat AS p ON c.id_plat = p.id
WHERE c.etat='En cours de livraison'
ORDER BY c.date_commande DESC;";
if(!$conn_enLivr->query($req_enLivr)) echo "pas d'accès à la table";

$conn_delivered = connect_bd();
$req_delivered="SELECT c.id id_com, c.quantite qty, p.id, p.image img, c.nom_client nom, c.date_commande cmd, p.libelle lib
FROM commande AS c
JOIN plat AS p ON c.id_plat = p.id
WHERE c.etat='Livrée'
ORDER BY c.date_commande DESC;";
if(!$conn_delivered->query($req_delivered)) echo "pas d'accès à la table";


include_once "view/gestion/commande.php";