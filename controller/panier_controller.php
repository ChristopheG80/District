<?php

var_dump($_SESSION);

if($_SESSION['Auth']=="ok"){
    echo 'vous êtes dans le panier';
}
else{
    echo 'Merci de se connecter';
}