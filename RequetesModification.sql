-- Ecrire des requêtes de modification de la base de données

-- Ecrivez une requête permettant de supprimer les plats non actif de la base de données
DELETE 
FROM `plat` 
WHERE active="No";


-- Ecrivez une requête permettant de supprimer les commandes avec le statut livré

DELETE 
FROM `commande` 
WHERE etat="Livrée";

-- Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie.

INSERT INTO `categorie`(`libelle`, `image`, `active`) 
VALUES ('new_cat','cat.jpg','No');

INSERT INTO `plat`(`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) 
VALUES ('new plat','description','9.95','new_plat.jpg', LAST_INSERT_ID() ,'Yes');

-- Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza'

UPDATE `plat` 
SET `prix`=`prix` * 1.1
WHERE id_categorie IN 
(SELECT id FROM categorie WHERE libelle="Pizza");




INSERT INTO `employe`(`noemp`,`nom`, `prenom`, `dateemb`, `nosup`, `titre`, `nodep`, `salaire`, `tauxcom`) 
VALUES (33,'TitGoutte','Justine','2020-12-14','','secrétaire','41','27000',0.05),
(32,'TitGoutte','Corine','2020-12-14','','secrétaire','41','27000','0.05'),
(31,'Beurrequejepréfère', 'Michel', '1991-10-21','','ingénieur',10,'54000','0.1');


INSERT INTO `dept`(`nodept`, `nom`, `noregion`) VALUES ('75','export','7');


UPDATE `employe` SET `salaire`=`salaire` * 1.1 WHERE `noemp`=17;

UPDATE `dept` SET `nom`='Logistique' WHERE `nodept`='45';


DELETE FROM `employe` WHERE `noemp` = LAST_INSERT_ID();
-- Ne fonctionne pas car il n'y a pas d'auto_incrément sur le noemp

DELETE FROM `employe` WHERE `noemp` IN SELECT MAX(`noemp`) FROM `employe`;
