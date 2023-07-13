<?php
 if(isset($_POST['signing'])){
    $identif = $_POST['IdentiSignIn']!=""?$_POST['IdentiSignIn']:null;
    $pwsIden = $_POST['PwsSignIn']!=""?$_POST['PwsSignIn']:null;
    if(!is_null($pwsIden) && !is_null($identif)){
        $_SESSION['Auth'] = "ok";
        $_SESSION['firstname'] = $identif;
    }
}
