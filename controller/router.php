<?php
include_once "utils/connexion.php";
include_once "utils/DAO.class.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // var_dump('$GET', $_GET);
    if (isset($_REQUEST['choix'])) {
        $choice = $_REQUEST['choix'];
        // var_dump($choice);
        switch ($choice) {
            case "cat":
                include "view/search.php";
                include "controller/categories_controller.php";
                break;
            case "lesplats":
                include "view/search.php";
                include "controller/plat_controller.php";
                break;
            case "contact":
                //include "view/search.php";
                include "controller/contact_controller.php";
                break;
            case "commande":
                include "view/search.php";
                include "controller/commande_controller.php";
                break;
            case "deconnexion":
                include "view/search.php";
                include "controller/deconnexion_controller.php";
                break;
            case "connexion":
                include "view/search.php";
                include "controller/connexion2_controller.php";
                break;
            case "signup":
                include "view/search.php";
                include "controller/signup_controller.php";
                break;
            case "mentions":
                include "view/mentions.php";
                break;
            case "pol":
                include "view/pol.php";
                break;
            case "show_panier":
                include "controller/panier_controller.php";
                include "view/panier.php";
                break;
            case "Gestion":
                include "view/search.php";
                include "controller/gestion/commande_controller.php";
                break;
            case "admin":
                //include "view/search.php";
                include "controller/admin/admin.php";
                break;
            case "catego":
                $catego = $choice;
                // var_dump($catego);
                break;
            case "addpanier":
                $panier = $_REQUEST['panier'];
                include("controller/panier_controller.php");
                break;
            default:
                include "view/search.php";
                include_once "controller/accueil_controller.php";
        }
    } else {
        include "view/search.php";
        include_once "controller/accueil_controller.php";
        // include "view/accueil.php";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump('$_POST', $_POST);
    
    if ( isset($_POST['Commande'])) {
        include "controller/commandePlat_controller.php";
    }
        
    // Identifiant
    if (isset($_POST['signing']) && $_POST['signing'] == "Connexion") {
        include "controller/connexion_controller.php";
    }
    
    if (isset($_POST['signupg']) && $_POST['signupg'] == "Connexion") {
        include "controller/signup_controller.php";
    }
    
    if (isset($_POST['catego'])) {
        $catego = intval($_POST['catego']);
        // var_dump($catego);
        include "controller/plat_controller.php";
    }
    // if (isset($_POST['Commande'])) {
    //     include "controller/panier_controller.php";
    // }
    if (isset($_POST['messageDistrict']) && $_POST['messageDistrict'] == "Envoyer le message") {
        include "controller/sendmail_controller.php";
    }
    

    if(isset($_POST['quantiteCom'])) {
        include "controller/cdePlat_controller.php";

    }

    if (isset($_POST['last_cat_p']) && $_POST['last_cat_p'] == "<-") {
        $page_cat--;
        include "controller/categories_controller.php";
    }
    if (isset($_POST['next_cat_p']) && $_POST['next_cat_p'] == "->") {
        $page_cat = isset($page_cat) ? $page_cat : 1;
        $page_cat++;
        include "controller/categories_controller.php";
    }
    if (isset($_POST['last_plat_p']) && $_POST['last_plat_p'] == "<-") {
        $page_plat--;
        include "controller/plat_controller.php";
    }
    if (isset($_POST['next_plat_p']) && $_POST['next_plat_p'] == "->") {
        $page_plat = isset($page_plat) ? $page_plat : 1;
        $page_plat++;
        include "controller/plat_controller.php";
    }
    if (isset($_POST['searchbtn']) && $_POST['searchbtn'] == "Rechercher") {
        include "view/search.php";
        include "controller/searchResult_controller.php";
    }
    if (isset($_POST['tableN'])) {
        include "controller/admin/admin.php";
    }

    if (isset($_POST['modCat']) || isset($_POST['modPlat'])) {
        include "controller/admin/update.php";
    }

    if (isset($_POST['delCat']) || isset($_POST['delPlat'])) {
        include "controller/admin/delete.php";
    }
    if (isset($_POST['newCat']) || isset($_POST['newPlat'])) {
        include "controller/admin/insert.php";
    }

}
