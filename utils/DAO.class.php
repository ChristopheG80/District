<?php
// include_once "connexion.php";
$conn = connect_bd();

class utilisateur
{
    private $user_name;
    private $user_email;
    private $user_password;

    public function __construct($user_name, $user_email, $user_password)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
    }

    public function set_utilisateur($new_user_name = null, $new_user_email = null, $new_user_password = null)
    {
        if (!is_null($new_user_name) && !is_null($new_user_email) && !is_null($new_user_password)) {
            if (!empty($new_user_name) && !empty($new_user_email) && !empty($new_user_password)) {
                $this->user_name = $new_user_name;
                $this->user_email = $new_user_email;
                $this->user_password = $new_user_password;
            }
        }
    }
    public function get_utilisateur_name()
    {
        return $this->user_name;
    }
    public function get_utilisateur_email()
    {
        return $this->user_email;
    }
    public function get_utilisateur_password()
    {
        return $this->user_password;
    }
    public function deleteUser($id)
    {
        $conn = connect_bd();
        $req = $conn->prepare("DELETE FROM `utilisateur` WHERE `id`=:ide");
        $req->bindValue(':ide', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }
    public function updateUser($id, $nom_prenom, $email, $password)
    {
        $conn = connect_bd();
        $req = $conn->prepare("UPDATE `utilisateur` SET `nom_prenom`=:nom_prenom,`email`=:mail,`password`=:passwrd WHERE `id`=:ide");
        $req->bindValue(':ide', $id, PDO::PARAM_INT);
        $req->bindValue(':nom_prenom', $nom_prenom, PDO::PARAM_STR);
        $req->bindValue(':mail', $email, PDO::PARAM_STR);
        $req->bindValue(':passwrd', $password, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
    }
    public function newUser($nom_prenom, $email, $password)
    {
        $conn = connect_bd();
        $req = $conn->prepare("INSERT INTO `utilisateur`(`nom_prenom`, `email`, `password`) VALUES (:nom_prenom,:mail,:passwrd)");
        $no_pr = '\'%' . $nom_prenom . '%\'';
        $mail = '\'%' . $email . '%\'';
        $psswrd = '\'%' . $password . '%\'';
        $req->bindValue(':nom_prenom', $no_pr, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':passwrd', $psswrd, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
    }
    public function showAllUser()
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT `id`, `nom_prenom`, `email`, `password` FROM `utilisateur`;");
        $req->execute();
        return $req->fetchAll();
    }


    public function search_utilisateur($nom_prenom, $email, $password)
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT `nom_prenom`, `email`, `password`, `id` FROM `utilisateur` 
        WHERE `nom_prenom` LIKE :nom_prenom OR `email` LIKE :mail OR `password` LIKE :passwrd ;");
        $no_pr = '\'%' . $nom_prenom . '%\'';
        $mail = '\'%' . $email . '%\'';
        $psswrd = '\'%' . $password . '%\'';
        $req->bindValue(':nom_prenom', $no_pr, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':passwrd', $psswrd, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
    }
}

class commande
{
    public $id;
    public $id_plat;
    public $quantite;
    public $total;
    public $date_commande;
    public $etat;
    public $nom_client;
    public $telephone_client;
    public $email_client;
    public $adresse_client;

    public function set_commande($id = null, $id_plat = null, $quantite = null, $total = null, $date_commande = null, $etat = null, $nom_client = null, $telephone_client = null, $email_client = null, $adresse_client = null)
    {
        if (!is_null($id)) $this->id = $id;
        if (!is_null($id_plat)) $this->id_plat = $id_plat;
        if (!is_null($quantite)) $this->quantite = $quantite;
        if (!is_null($total)) $this->total = $total;
        if (!is_null($date_commande)) $this->date_commande = $date_commande;
        if (!is_null($etat)) $this->etat = $etat;
        if (!is_null($nom_client)) $this->nom_client = $nom_client;
        if (!is_null($telephone_client)) $this->telephone_client = $telephone_client;
        if (!is_null($email_client)) $this->email_client = $email_client;
        if (!is_null($adresse_client)) $this->adresse_client = $adresse_client;
    }
    public function get_commande_id()
    {
        return $this->id;
    }
    public function get_commande_id_plat()
    {
        return $this->id_plat;
    }
    public function get_commande_quantite()
    {
        return $this->quantite;
    }
    public function get_commande_total()
    {
        return $this->total;
    }
    public function get_commande_date_commande()
    {
        return $this->date_commande;
    }
    public function get_commande_etat()
    {
        return $this->etat;
    }
    public function get_commande_nom_client()
    {
        return $this->nom_client;
    }
    public function get_commande_telephone_client()
    {
        return $this->telephone_client;
    }
    public function get_commande_email_client()
    {
        return $this->email_client;
    }
    public function get_commande_adresse_client()
    {
        return $this->adresse_client;
    }

    public function showAllcommande()
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT `id`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client` FROM `commande`;");
        $req->execute();
        return $req;
    }

    public function enreg_commande($id, $qte, $total, $email, $phone, $flname, $addresse){
        $conn = connect_bd();
        $etat="En préparation";
        $req = $conn->prepare("INSERT INTO `commande`(`id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) 
        VALUES (:id_plat, :qte, :total, NOW(), :etat, :flname, :phone, :email, :addresse)");
        $req->bindValue(':id_plat', $id, PDO::PARAM_INT);
        $req->bindValue(':qte', $qte, PDO::PARAM_INT);
        $req->bindValue(':total', $total, PDO::PARAM_INT);
        $req->bindValue(':etat', $etat, PDO::PARAM_STR);
        $req->bindValue(':phone', $phone, PDO::PARAM_STR);
        $req->bindValue(':flname', $flname, PDO::PARAM_STR);
        $req->bindValue(':addresse', $addresse, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }

    private function delete_commande_livree()
    {
        $req = 'DELETE 
        FROM `commande` 
        WHERE etat="Livrée";';
        return $req;
    }
}

class categorie
{
    public $id;
    public $libelle;
    public $image;
    public $active;

    // public function __construct($id, $libelle, $image, $active)
    // {
    //     $this->id = $id;
    //     $this->libelle = $libelle;
    //     $this->image = $image;
    //     $this->active = $active;
    // }

    public function set_categorie($id = null, $libelle = null, $image = null, $active = null)
    {
        if (!is_null($id)) $this->id = $id;
        if (!is_null($libelle)) $this->libelle = $libelle;
        if (!is_null($image)) $this->image = $image;
        if (!is_null($active)) $this->active = $active;
    }
    public function get_categorie_id()
    {
        return $this->id;
    }

    public function get_categorie_libelle()
    {
        return $this->libelle;
    }

    public function get_categorie_image()
    {
        return $this->image;
    }

    public function get_categorie_active()
    {
        return $this->active;
    }

    public function add_categorie($libelle, $image, $active)
    {
        $conn = connect_bd();
        $req = $conn->prepare('INSERT INTO categorie (libelle, `image`, active ) VALUES (:libelle, :img, :activ);');
        $req->bindValue(':activ', $active, PDO::PARAM_STR);
        $req->bindValue(':img', $image, PDO::PARAM_STR);
        $req->bindValue(':activ', $libelle, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }

    public function delete_categorie($id)
    {
        $conn = connect_bd();
        $req = $conn->prepare('DELETE FROM `categorie` WHERE id=:id;');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }
    public function showCatAll($offset = 0, $limit = 6, $active = "Yes")
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT id, libelle, `image` img, active FROM categorie WHERE active=:activ LIMIT :limite OFFSET :ofset;");
        $req->bindValue(':activ', $active, PDO::PARAM_STR);
        $req->bindValue(':limite', $limit, PDO::PARAM_INT);
        $req->bindValue(':ofset', $offset, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }

    public function showAllCat()
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT id ide, libelle lib, `image` img, active FROM categorie;");
        $req->execute();
        return $req->fetchAll();
    }

    public function showCatPop($limit = 6, $active = "Yes", $etat = "Annulée")
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT c.id, c.libelle, c.image img, c.active, SUM(k.total) 
                                    FROM categorie c
                                    JOIN plat p ON c.id = p.id_categorie
                                    JOIN commande k ON p.id = k.id_plat
                                    WHERE c.active=:activ AND k.etat <> :etat
                                    GROUP BY c.id
                                    ORDER BY k.total DESC 
                                    LIMIT :limite;");
        $req->bindValue(':activ', $active, PDO::PARAM_STR);
        $req->bindValue(':etat', $etat, PDO::PARAM_STR);
        $req->bindValue(':limite', $limit, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }
    public function listCat(){
        $conn = connect_bd();
        $req = $conn->prepare("SELECT id, libelle lib FROM categorie WHERE active='Yes';");
        $req->execute();
        return $req->fetchAll();
    }
}

class plat
{

    public $id;
    public $libelle;
    public $description;
    public $prix;
    public $image;
    public $id_categorie;
    public $active;

    public function set_plat($id = null, $libelle = null, $description = null, $prix = null, $image = null, $id_categorie = null, $active = null)
    {
        if (!is_null($id)) $this->id = $id;
        if (!is_null($libelle)) $this->libelle = $libelle;
        if (!is_null($description)) $this->description = $description;
        if (!is_null($prix)) $this->prix = $prix;
        if (!is_null($image)) $this->image = $image;
        if (!is_null($id_categorie)) $this->id_categorie = $id_categorie;
        if (!is_null($active)) $this->active = $active;
    }
    public function get_plat_id()
    {
        return $this->id;
    }
    public function get_plat_libelle()
    {
        return $this->libelle;
    }
    public function get_plat_description()
    {
        return $this->description;
    }
    public function get_plat_prix()
    {
        return $this->prix;
    }
    public function get_plat_image()
    {
        return $this->image;
    }
    public function get_plat_id_categorie()
    {
        return $this->id_categorie;
    }
    public function get_plat_active()
    {
        return $this->active;
    }
    public function show_one_plat($idee){
        $conn = connect_bd();
        $req = $conn->prepare('SELECT `id`, `libelle`, `description`, `prix`, `image` FROM `plat` WHERE id=:idee;');
        $req->bindValue(':idee', $idee, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }
    public function delete_plat_inactif()
    {
        $conn = connect_bd();
        $req = $conn->prepare('DELETE FROM `plat` WHERE active=:inactif;');
        $actif = 'no';
        $req->bindValue(':inactif', $actif, PDO::PARAM_STR);
        $req->execute();
        $req->fetchAll();
        return $req;
    }
    public function deletePlat($id)
    {
        $conn = connect_bd();
        $req = $conn->prepare('DELETE FROM `plat` WHERE `id`=:ide;');
        $req->bindValue(':ide', $id, PDO::PARAM_INT);
        $req->execute();
        $req->fetchAll();
        return $req;
    }
    public function updatePlat($id, $libelle, $descr, $prix, $image, $id_cat, $actif)
    {
        $conn = connect_bd();
        $req = $conn->prepare("UPDATE `plat` SET `libelle`=:lib,`description`=:descr,`prix`=:prix,`image`=:img,
        `id_categorie`=id_cat,`active`=:actif WHERE `id`=:ide");
        $req->bindValue(':ide', $id, PDO::PARAM_INT);
        $req->bindValue(':lib', $libelle, PDO::PARAM_STR);
        $req->bindValue(':descr', $descr, PDO::PARAM_STR);
        $req->bindValue(':prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':img', $image, PDO::PARAM_STR);
        $req->bindValue(':actif', $actif, PDO::PARAM_STR);
        $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT);
        $req->execute();
        $req->fetchAll();
        return $req;
    }
    public function get_plat_lim($limite = 6, $offset = 0)
    {
        $conn = connect_bd();
        $req = $conn->prepare('SELECT `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active` 
        FROM plat LIMIT :limite OFFSET :ofset ;');
        $req->bindValue(':limite', $limite, PDO::PARAM_INT);
        $req->bindValue(':ofset', $offset, PDO::PARAM_INT);
        $req->execute();
        $req->fetchAll();
        return $req;
    }
    public function update_tarif($taux, $categorie)
    {
        $conn = connect_bd();
        $req = $conn->prepare('UPDATE `plat` SET `prix`=`prix` * :taux 
            WHERE id_categorie IN 
        (SELECT id FROM categorie WHERE libelle :categorie);');
        $req->bindValue(':taux', $taux, PDO::PARAM_STR);
        $req->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }
    public function get_plat_categorie($active = "Yes")
    {
        $conn = connect_bd();
        $req = $conn->prepare('SELECT c.libelle, COUNT(*)
        FROM plat p
        JOIN categorie c ON p.id_categorie = c.id
        GROUP BY c.libelle
        HAVING p.active = :actif;');
        $req->bindValue(':actif', $active, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
    }
    public function showPlatPopulo($active = 'Yes', $limite = 3, $etat = 'Annulée')
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT p.id ide, p.libelle lib, p.image img, p.description descr, p.prix prix, id_categorie idcat, SUM(c.quantite) 
        FROM plat p
        JOIN commande c ON p.id = c.id_plat
        WHERE p.active =:actif AND etat <>:etat 
        GROUP BY p.id
        ORDER BY SUM(c.quantite) DESC 
        LIMIT :limite;");
        $req->bindValue(':etat', $etat, PDO::PARAM_STR);
        $req->bindValue(':actif', $active, PDO::PARAM_STR);
        $req->bindValue(':limite', $limite, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }
    public function showAllPlat()
    {
        $conn = connect_bd();
        $req = $conn->prepare("SELECT id ide, libelle lib, `image` img, `description` descr, prix, id_categorie idcat FROM plat;");
        $req->execute();
        return $req->fetchAll();
    }
    public function platCatchange($id, $id_cat)
    {
        $conn = connect_bd();
        $req = $conn->prepare("UPDATE `plat` SET `id_categorie`=:id_cat WHERE `id`=:ide");
        $req->bindValue(':ide', $id, PDO::PARAM_INT);
        $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }
    public function adminShowPlatCat(){
        $conn = connect_bd();
        $req = $conn->prepare("SELECT id ide, libelle lib, `image` img, `description` descr, prix, id_categorie idcat, c.libelle catPlat FROM plat p JOIN categorie c ON c.id=p.id_cat;");
        $req->execute();
        return $req->fetchAll();
    }
    
}










// function show_commande_alivrer()
// {
//     $req = 'SELECT date_commande, nom_client, telephone_client, email_client, adresse_client, libelle, total, etat
//     FROM commande AS c
//     JOIN plat AS p ON c.id_plat = p.id
//     WHERE etat <> "Livrée";';
//     return $req;
// }

// function get_topvente_plat()
// {
//     $req = '';
//     return $req;
// }

// function get_topclient_ca()
// {
//     $req = '';
//     return $req;
// }



// function get_categorie($categorie)
// {
//     $req = 'SELECT `id`, `libelle`, `image`, `active` FROM categorie';
//     if (isset($categorie) && $categorie !== "") {
//         $req .= ' WHERE libelle LIKE \'%' . $categorie . '%\';';
//     }
//     return $req;
// }

// function get_plat($libelle)
// {
//     $req = 'SELECT `id`, `libelle`, `description`, `prix`, `image`, `id_categorie`, `active` 
//     FROM plat
//     WHERE `libelle` LIKE \'%' . $libelle . '%\';';
//     return $req;
// }

// function get_commande($search)
// {
//     $req = 'SELECT `id`, `id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client` 
//     FROM `commande`';
//     if (isset($search) && $search !== "") {
//         $req .= ' WHERE `total` LIKE \'%' . $search . '%\' OR `date_commande` LIKE \'%' . $search . '%\' OR `etat` LIKE \'%' . $search . '%\' OR `nom_client` LIKE \'%' . $search . '%\' OR `telephone_client` LIKE \'%' . $search . '%\' OR `email_client` LIKE \'%' . $search . '%\' OR `adresse_client`';
//     }
//     return $req;
// }

// function delete_categorie($id_cat)
// {
//     $req = 'DELETE
//     FROM `categorie`
//     WHERE `id` = ' . $id_cat;
//     return $req;
// }

// function delete_plat($id_plat)
// {
//     $req = 'DELETE
//     FROM `plat`
//     WHERE `id` = ' . $id_plat;
//     return $req;
// }

// function delete_commande($id_commande)
// {
//     $req = 'DELETE
//     FROM `commande`
//     WHERE `id` = ' . $id_commande;
//     return $req;
// }

// function delete_user($id_user)
// {
//     $req = 'DELETE
//     FROM `utilisateur`
//     WHERE `id` = ' . $id_user;
//     return $req;
// }

// function update_categorie($id, $libelle, $image, $active)
// {
//     // Vérifier que les champs sont remplis en javascript
//     $req = 'UPDATE `categorie` 
//     SET `libelle`=' . $libelle . ',`image`=' . $image . ',`active`=' . $active . ' WHERE `id`=' . $id . ';';
//     return $req;
// }

// function update_plat($id, $libelle, $description, $prix, $image, $id_categorie, $active)
// {
//     // Vérifier que les champs sont remplis en javascript
//     $req = 'UPDATE `plat` 
//     SET `libelle`=' . $libelle . ',`description`=' . $description . ',`prix`=' . $prix . ',`image`=' . $image .
//         ',`id_categorie`=' . $id_categorie . ',`active`=' . $active . ' WHERE `id`=' . $id . ';';
//     return $req;
// }

// function update_commande($id, $id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client)
// {
//     // Vérifier que les champs sont remplis en javascript
//     $req = 'UPDATE `commande` 
//     SET `id_plat`=' . $id_plat . ', 
//     `quantite`=' . $quantite . ', 
//     `total`=' . $total . ', 
//     `date_commande`=' . $date_commande . ', 
//     `etat`=' . $etat . ', 
//     `nom_client`=' . $nom_client . ', 
//     `telephone_client`=' . $telephone_client . ', 
//     `email_client`=' . $email_client . ', 
//     `adresse_client`=' . $adresse_client . '  
//     WHERE `id`=' . $id . ';';
//     return $req;
// }

// function update_user($id, $nom_prenom, $email, $password)
// {
//     // Vérifier que les champs sont remplis en javascript
//     $req = 'UPDATE `utilisateur` 
//     SET `nom_prenom`=' . $nom_prenom . ', `email`=' . $email . ', `password`=' . $password . ' WHERE `id`=' . $id . ';';
//     return $req;
// }


// function insert_commande($id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client)
// {
//     $req = 'INSERT INTO `commande`(`id_plat`, `quantite`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`) 
//     VALUES (' . $id_plat . ',' . $quantite . ',' . $total . ',' . $date_commande . ',' . $etat .
//         ',' . $nom_client . ',' . $telephone_client . ',' . $email_client . ',' . $adresse_client . ')';
//     return $req;
// }

// function insert_plat($libelle, $description, $prix, $image, $id_categorie, $active)
// {
//     $req = 'INSERT INTO `plat`(`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`) 
//     VALUES (' . $libelle . ',' . $description . ',' . $prix . ',' . $image . ',' . $id_categorie . ',' . $active . ')';
//     return $req;
// }


// function insert_categorie($libelle, $image, $active)
// {
//     $req = 'INSERT INTO `categorie`(`libelle`, `image`, `active`) VALUES (' . $libelle . ',' . $image . ',' . $active . ')';
//     return $req;
// }

// function insert_utilisateur($nom_prenom, $email, $password)
// {
//     $req = 'INSERT INTO `utilisateur`(`nom_prenom`, `email`, `password`) VALUES (' . $nom_prenom . ',' . $email . ',' . $password . ')';
//     return $req;
// }


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



// function get_utilisateur($nom_prenom, $email, $password)
// {
//     $req = 'SELECT `nom_prenom`, `email`, `password` FROM `utilisateur` 
//     WHERE `nom_prenom` LIKE \'%' . $nom_prenom . '%\' OR `email` LIKE \'%' . $email . '%\' OR `password` LIKE \'%' . $password . '%\';';
//     return $req;
// }


// function execute_update($req)
// {
//     //$res=prepare
// }
