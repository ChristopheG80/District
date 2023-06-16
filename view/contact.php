    <form action="index.php" method="post">
        <div class="container-fluid">
            <div class="row">
            <div class="col-6">
            <div class="col-12 my-2">
                    <label for="firstnameDistrict">Votre pr&eacute;nom</label>
                    <input type="text" id="firstnameDistrict" class="btn-outline-district district-color text-center" value="<?= $_SESSION['Auth']=='ok'?$_SESSION['firstname']:''; ?>" />
                </div>    
            <div class="col-12 my-2">
                    <label for="emailDistrict">Votre email</label>
                    <input type="email" id="emailDistrict" class="district-color btn-outline-district text-center" />
                </div>
                </div>
                <div class="col-6">
                    <div class="col-12"><textarea cols="20" rows="10"></textarea></div>
                </div>
                <div class="col-12 my-2 ">
                    <input type="submit" value="Envoyer le message" name="messageDistrict" id="messageDistrict" class="btn btn-outline-district district-color" />
                </div>
            </div>
        </div>
    </form>
    <?php
