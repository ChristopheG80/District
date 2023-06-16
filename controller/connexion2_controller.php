<?php

if($_SESSION['Auth'] != "ok"){
    include "view/signin.php";
    echo $_SESSION['Auth'];
}

echo $_SESSION['Auth'];