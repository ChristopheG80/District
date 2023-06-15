<?php


class utilisateur{
    public function set_utilisateur(){

    }
    public function get_utilisateur(){
        $req = 'SELECT `nom_prenom`, `email`, `password` FROM `utilisateur`;';
        return $req;        
    }
    public function search_utilisateur($nom_prenom, $email, $password){
        $req = 'SELECT `nom_prenom`, `email`, `password`, `id` FROM `utilisateur` 
        WHERE `nom_prenom` LIKE \'%' . $nom_prenom . '%\' OR `email` LIKE \'%' . $email . '%\' OR `password` LIKE \'%' . $password . '%\';';
        return $req;        
    }
}


class commande{
    public function set_commande(){

    }
    public function get_commande(){
        
    }
    private function delete_commande_livree(){
        $req = 'DELETE 
        FROM `commande` 
        WHERE etat="Livrée";';
        return $req;
    }
}

class categorie{
    public function set_categorie(){

    }
    public function get_categorie(){
        
    }
    public function update_tarif($taux, $categorie){
        $req = 'UPDATE `plat` SET `prix`=`prix` * ' . $taux . 
        'WHERE id_categorie IN 
        (SELECT id FROM categorie WHERE libelle="' . $categorie . '");';
        return $req;
    }
}

class plat{
    public function set_plat(){

    }
    public function get_plat(){
        
    }

    private function delete_plat_inactif(){
        $req='DELETE 
        FROM `plat` 
        WHERE active="No";';
        return $req;
    }
     public function get_plat_lim($limite){
        $req = 'SELECT `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active` 
        FROM plat LIMIT ' .$limite . ';';
     }    
}








function get_plat_categorie(){
    $req = 'SELECT c.libelle, COUNT(*)
    FROM plat AS p
    JOIN categorie AS c ON p.id_categorie = c.id
    GROUP BY c.libelle
    HAVING p.active = "Yes";';
    return $req;
}

function show_commande_alivrer(){
    $req='SELECT date_commande, nom_client, telephone_client, email_client, adresse_client, libelle, total, etat
    FROM commande AS c
    JOIN plat AS p ON c.id_plat = p.id
    WHERE etat <> "Livrée";';
    return $req;
}

function get_topvente_plat(){
    $req='';
    return $req;
}

function get_topclient_ca(){
    $req='';
    return $req;
}



function get_categorie($categorie){
    $req = 'SELECT `id`, `libelle`, `image`, `active` FROM categorie';
    if(isset($categorie) && $categorie!==""){
        $req.=' WHERE libelle LIKE \'%'. $categorie . '%\';';
    }
    return $req;
}

function get_plat($libelle){
    $req = 'SELECT `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active` 
    FROM plat
    WHERE `libelle` LIKE \'%' . $libelle . '%\';';
    return $req;
}

function get_commande($search){
    $req = 'SELECT `id`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client` 
    FROM `commande`';
    if(isset($search) && $search!==""){
        $req .=' WHERE `total` LIKE \'%' . $search . '%\' OR `date_commande` LIKE \'%' . $search . '%\' OR `etat` LIKE \'%' . $search . '%\' OR `nom_client` LIKE \'%' . $search . '%\' OR `telephone_client` LIKE \'%' . $search . '%\' OR `email_client` LIKE \'%' . $search . '%\' OR `adresse_client`';
    }
    return $req;
}

function delete_categorie($id_cat){
    $req = 'DELETE
    FROM `categorie`
    WHERE `id` = ' . $id_cat;
    return $req;
}

function delete_plat($id_plat){
    $req = 'DELETE
    FROM `plat`
    WHERE `id` = ' . $id_plat;
    return $req;
}

function delete_commande($id_commande){
    $req = 'DELETE
    FROM `commande`
    WHERE `id` = ' . $id_commande;
    return $req;
}

function delete_user($id_user){
    $req = 'DELETE
    FROM `utilisateur`
    WHERE `id` = ' . $id_user;
    return $req;
}

function update_categorie($id, $libelle, $image, $active){
    // Vérifier que les champs sont remplis en javascript
    $req = 'UPDATE `categorie` 
    SET `libelle`=' . $libelle . ',`image`=' . $image . ',`active`=' . $active . ' WHERE `id`=' . $id . ';';
    return $req;
}

function update_plat($id, $libelle, $description, $prix, $image, $id_categorie, $active){
    // Vérifier que les champs sont remplis en javascript
    $req = 'UPDATE `plat` 
    SET `libelle`=' . $libelle . ',`description`=' . $description . ',`prix`=' . $prix . ',`image`=' . $image . 
    ',`id_categorie`=' . $id_categorie . ',`active`=' . $active . ' WHERE `id`=' . $id .';';
    return $req;
}

function update_commande($id, $id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client){
    // Vérifier que les champs sont remplis en javascript
    $req = 'UPDATE `commande` 
    SET `id_plat`=' . $id_plat . ', 
    `quantite`=' . $quantite . ', 
    `total`=' . $total . ', 
    `date_commande`=' . $date_commande . ', 
    `etat`=' . $etat . ', 
    `nom_client`=' . $nom_client . ', 
    `telephone_client`=' . $telephone_client . ', 
    `email_client`=' . $email_client . ', 
    `adresse_client`=' . $adresse_client . '  
    WHERE `id`=' . $id .';';
    return $req;
}

function update_user($id, $nom_prenom, $email, $password){
    // Vérifier que les champs sont remplis en javascript
    $req = 'UPDATE `utilisateur` 
    SET `nom_prenom`=' . $nom_prenom . ', `email`=' . $email . ', `password`=' . $password . ' WHERE `id`=' . $id . ';';
    return $req;
}


function insert_commande($id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client){
    $req = 'INSERT INTO `commande`(`id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) 
    VALUES (' . $id_plat . ',' . $quantite . ',' . $total . ',' . $date_commande . ',' . $etat . 
    ',' . $nom_client . ',' . $telephone_client . ',' . $email_client . ',' . $adresse_client . ')';
    return $req;
}

function insert_plat($libelle, $description, $prix, $image, $id_categorie, $active){
    $req = 'INSERT INTO `plat`(`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) 
    VALUES (' . $libelle . ',' . $description . ',' . $prix . ',' . $image . ',' . $id_categorie . ',' . $active . ')';
    return $req;
}


function insert_categorie($libelle, $image, $active){
    $req = 'INSERT INTO `categorie`(`libelle`, `image`, `active`) VALUES (' . $libelle . ',' . $image . ',' . $active . ')';
    return $req;
}

function insert_utilisateur($nom_prenom, $email, $password){
    $req = 'INSERT INTO `utilisateur`(`nom_prenom`, `email`, `password`) VALUES (' . $nom_prenom . ',' . $email . ',' . $password . ')';
    return $req;
}


// function get_commande($id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client){
//     $req = 'INSERT INTO `commande`(`id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) 
//     VALUES (' . $id_plat . ',' . $quantite . ',' . $total . ',' . $date_commande . ',' . $etat . 
//     ',' . $nom_client . ',' . $telephone_client . ',' . $email_client . ',' . $adresse_client . ')';
//     return $req;
// }

// function get_plat($libelle, $description, $prix, $image, $id_categorie, $active){
//     $req = 'INSERT INTO `plat`(`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) 
//     VALUES (' . $libelle . ',' . $description . ',' . $prix . ',' . $image . ',' . $id_categorie . ',' . $active . ')';
//     return $req;
// }



// function get_categorie($libelle, $image, $active){
//     $req = 'INSERT INTO `categorie`(`libelle`, `image`, `active`) VALUES (' . $libelle . ',' . $image . ',' . $active . ')';
//     return $req;
// }



function get_utilisateur($nom_prenom, $email, $password){
    $req = 'SELECT `nom_prenom`, `email`, `password` FROM `utilisateur` 
    WHERE `nom_prenom` LIKE \'%' . $nom_prenom . '%\' OR `email` LIKE \'%' . $email . '%\' OR `password` LIKE \'%' . $password . '%\';';
    return $req;
}


function execute_update($req){
    //$res=prepare
}