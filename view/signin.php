<?php


?>
<form action="index.php" method="post">
    <div class="container-fluid content">
        <div class="row">
            <div class="col-12"><label for="IdentiSignIn">Identifiant</label></div>
            <div class="col-12"><input type="text" name="IdentiSignIn" id="IdentiSignIn" placeholder="identifiant"></div>
            <div class="col-12"><label for="PwsSignIn">Mot de passe</label></div>
            <div class="col-12"><input type="password" name="PwsSignIn" id="PwsSignIn" placeholder="mot de passe"></div>
            <div class="col-12"><input type="submit" name="signing" id="signing" value="Connexion" class="btn btn-success"/></div>
        </div>
    </div>
</form>