    <form action="index.php" method="post">
        <div class="container-fluid content">
            <div class="row">
                <div class="col-6 justify-content-center">
                    <label for="firstnameDistrict">Votre pr&eacute;nom</label>
                    <input type="text" id="firstnameDistrict" name="firstnameDistrict" class="btn-outline-district district-color text-center rounded" value="<?= $_SESSION['Auth']=='ok'?$_SESSION['firstname']:''; ?>" />
                    <label for="emailDistrict">Votre email</label>
                    <input type="email" id="emailDistrict" name="emailDistrict" class="district-color btn-outline-district text-center rounded" />
                </div>
                <div class="col-6 justify-content-end">
                <label for="textDistrict">Votre message</label>    
                <textarea cols="20" rows="10" class="rounded district-color" id="textDistrict" name="textDistrict"></textarea>
                </div>
                <div class="col-12 my-2 justify-content-end">
                    <input type="submit" value="Envoyer le message" name="messageDistrict" id="messageDistrict" class="btn btn-outline-district district-color" />
                    <p id="infoMail"><?= $infoMail!=""?$infoMail:'';?></p>
                </div>
            </div>
        </div>
    </form>
    <script src="assets/js/script_contact.js"></script>
    <?php
