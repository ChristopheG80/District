<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_REQUEST['choix'])){
        $choice = $_REQUEST['choix'];
        // var_dump($choice);
        switch($choice){
            case "deconnexion":
                include "controller/deconnexion_controller.php";
                break;
            case "connexion":
                include "controller/connexion_controller.php";
                break;
        }
    }
}