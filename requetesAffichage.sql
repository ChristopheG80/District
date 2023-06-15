

--    Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )

SELECT date_commande, nom_client, telephone_client, email_client, adresse_client, libelle, total
FROM commande AS c
JOIN plat AS p ON c.id_plat = p.id;



--    Afficher la liste des plats en spécifiant la catégorie

SELECT p.libelle, c.libelle
FROM plat AS p
JOIN categorie AS c ON p.id_categorie = c.id;





--    Afficher les catégories et le nombre de plats actifs dans chaque catégorie

SELECT c.libelle, COUNT(*)
FROM plat AS p
JOIN categorie AS c ON p.id_categorie = c.id
GROUP BY c.libelle
HAVING p.active = "Yes";


--    Liste des plats les plus vendus par ordre décroissant

SELECT p.libelle, COUNT(*)
FROM plat AS p
JOIN commande AS c ON p.id = c.id_plat
GROUP BY p.libelle
ORDER BY COUNT(p.libelle) DESC;

--    Le plat le plus rémunérateur

SELECT p.libelle, SUM(c.total)
FROM plat AS p
JOIN commande AS c ON c.id_plat = p.id
GROUP BY p.libelle
ORDER BY SUM(c.total) DESC;


--    Liste des clients et le chiffre d'affaire généré par client (par ordre décroissant)
SELECT c.email_client, c.quantite * p.prix AS `CA`
FROM commande AS c
JOIN plat AS p
WHERE c.etat <> 'Annulée'
GROUP BY c.email_client
ORDER BY SUM(c.quantite * p.prix) DESC;

