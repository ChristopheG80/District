<?php
// Récupérer les infos les stocker dans la base et envoyer un mail

// echo 'On arrive dans l enregistrement de la commande';

$id = isset($_POST['quantyty']) ? intval($_POST['quantyty']) : null;
$quantite = isset($_POST['quantite']) ? intval($_POST['quantite']) : null;
$plat = isset($_POST['libName']) ? $_POST['libName'] : null;
$total = isset($_POST['prixQte']) ? floatval($_POST['prixQte']) : null;
$custEmail = isset($_POST['emailCust']) ? $_POST['emailCust'] : null;
$custPhone = isset($_POST['phoneCust']) ? $_POST['phoneCust'] : null;
$custName = isset($_POST['nameCust']) ? $_POST['nameCust'] : null;
$custAddress = isset($_POST['addressCust']) ? $_POST['addressCust'] : null;
// var_dump($id, $quantite, $total, $custEmail, $custPhone, $custName, $custAddress);
// Envoi vers la BDDR


$cde_plat = new commande();
$cde = $cde_plat->enreg_commande($id, $quantite, $total, $custEmail, $custPhone, $custName, $custAddress);

// if ($cde) {
//     echo 'commande enregistrée';
// } else {
//     echo 'pb sur la cde';
// }

// Envoi de confirmation au client par email

require "controller/mail_controller.php";
// var_dump('POST', $_POST);
// echo 'coucou';
$emailCust = $custEmail;

// On va utiliser le SMTP
// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');
// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress($emailCust);
//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// Sujet du mail
$sujet = 'Accus&#233; de reception de commande';
$mail->Subject = $sujet;

// Corps du message
$messBody = 'Vous avez commandé ' . $quantite . ' ' . $plat . ' pour un total de ' . $total . ' ' . $devise;
$mail->Body = $messBody;


// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs

//  var_dump($mail);

 // die();
if ($mail) {
    try {
        $mail->send();
        $infoMail = 'Une confirmation de votre commande vous a été envoyée';

        // echo $infoMail;
    } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
    }
}

include "controller/accueil_controller.php";
