<?php
// var_dump('vous êtes bien arrivé dans contrôleur');
if(isset($_POST['signing'])){
    $firstnameIden = $_POST['firstnameSignIn']!=""?$_POST['firstnameSignIn']:null;
    $lastnameIden = $_POST['lastnameSignIn']!=""?$_POST['lastnameSignIn']:null;
    $identif = $_POST['IdentiSignIn']!=""?$_POST['IdentiSignIn']:null;
    $pwsIden = $_POST['PwsSignIn']!=""?$_POST['PwsSignIn']:null;
    if(!is_null($identif) && !is_null($pwsIden) && !is_null($firstnameIden) && !is_null($lastnameIden)){
        $_SESSION['Auth'] = "ok";
        $_SESSION['firstname'] = $firstnameIden;
        $_SESSION['lastname'] = $lastnameIden;
    }
    echo $identif;
    echo $pwsIden;
}
