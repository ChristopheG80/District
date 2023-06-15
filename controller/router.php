<?php 
include "utils/connexion.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
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
    var_dump($_POST);
}