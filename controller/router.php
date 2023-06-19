<?php 
include "utils/connexion.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    var_dump($_GET);
    if(isset($_REQUEST['choix'])){
        $choice = $_REQUEST['choix'];
        // var_dump($choice);
        switch($choice){
            case "cat":
                include "view/search.php";
                include "controller/categories_controller.php";
                break;
            case "lesplats":
                include "view/search.php";
                include "controller/plat_controller.php";
                break;
            case "contact":
                include "view/search.php";
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
            case "catego":
                $catego = $choice;
                var_dump($catego);
                break;
            case "addpanier":
                $panier = $_REQUEST['panier'];
                include("controller/panier_controller.php");
                break;
            default:
                include "view/search.php";
                include_once "controller/accueil_controller.php";
        }
    }
    else{
        include "view/search.php";
        include_once "controller/accueil_controller.php";
        // include "view/accueil.php";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_POST);
    
    // Identifiant
    if(isset($_POST['signing']) && $_POST['signing'] == "Connexion"){
        include "controller/connexion_controller.php";
    }
    if(isset($_POST['signupg']) && $_POST['signupg'] == "Connexion"){
        include "controller/signup_controller.php";
    }
    if(isset($_POST['catego'])){
        $catego = intval($_POST['catego']);
        // var_dump($catego);
        include "controller/plat_controller.php";
    }
    
}