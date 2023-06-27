<?php

$conn = connect_bd();
// Requete pour les catégories les plus populaires limitée à 6
// $req="SELECT c.id, c.libelle, c.image, c.active, SUM(k.total) 
// FROM categorie AS c
// JOIN plat AS p ON c.id = p.id_categorie
// JOIN commande AS k ON p.id = k.id_plat
// WHERE c.active='Yes' AND k.etat <> 'Annulée'
// GROUP BY c.id
// ORDER BY k.total DESC 
// LIMIT 6;";
// if(!$conn->query($req)) echo "pas d'accès à la table";

// $conn2 = connect_bd(); 
// // Requete pour les plats les plus vendus 
// $req2="SELECT p.id, p.libelle, p.image img, p.description, p.prix, id_categorie, SUM(c.quantite)
// FROM plat AS p
// JOIN commande AS c ON p.id = c.id_plat
// WHERE p.active = 'Yes' AND etat <> 'Annulée' 
// GROUP BY p.id
// ORDER BY SUM(c.quantite) DESC
// LIMIT 3;";
// if(!$conn2->query($req2)) echo "pas d'accès à la table";




include "view/accueil.php";    


