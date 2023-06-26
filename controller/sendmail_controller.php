<?php

include "mail_controller.php";
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
$Subject="Accusé de réception de commande";
$mail->Subject = $Subject;

// Corps du message
$mail->Body = $messBody;

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs

var_dump($mail);
// die();
if ($mail){
    try {
        $mail->send();
        $infoMail = 'Email envoyé avec succès';
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
}


















//include "view/contact.php";