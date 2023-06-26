    <form action="index.php" method="post">
        <div class="container-fluid content">
            <div class="row">
                <div class="col-12 col-md-6 justify-content-center text-center my-2">
                <label for="lastnameDistrict">Nom</label><br />
                    <input type="text" id="lastnameDistrict" name="lastnameDistrict" class="btn-outline-district district-color text-center rounded" value="" />    
                    </div>
                    <div class="col-12 col-md-6 justify-content-center text-center my-2">
                    <label for="firstnameDistrict">Pr&eacute;nom</label><br />
                    <input type="text" id="firstnameDistrict" name="firstnameDistrict" class="btn-outline-district district-color text-center rounded" value="<?= $_SESSION['Auth'] == 'ok' ? $_SESSION['firstname'] : ''; ?>" />
                </div>
                    <div class="col-12 col-md-6 justify-content-center text-center my-2">
                    <label for="emailDistrict">Email</label><br />
                    <input type="email" id="emailDistrict" name="emailDistrict" class="district-color btn-outline-district text-center rounded" />
                    </div>
                    <div class="col-12 col-md-6 justify-content-center text-center my-2">
                    <label for="phoneDistrict">Téléphone</label><br />
                    <input type="phone" id="phoneDistrict" name="phoneDistrict" class="district-color btn-outline-district text-center rounded" />
                </div>
                <div class="col-12 justify-content-center text-center my-2">
                    <label for="textDistrict">Votre demande</label><br />
                    <textarea cols="40" rows="6" class="rounded district-color" id="textDistrict" name="textDistrict"></textarea>
                </div>
                <div class="col-12 my-2 justify-content-center text-center my-2">
                    <input type="submit" value="Envoyer le message" name="messageDistrict" id="messageDistrict" class="btn btn-outline-district district-color" />
                    <p id="infoMail"><?= $infoMail != "" ? $infoMail : ''; ?></p>
                </div>
            </div>
        </div>
    </form>
    <script src="assets/js/script_contact.js"></script>
    <?php
