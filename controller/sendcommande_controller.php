<?php

require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;    

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;                                   

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');

// var_dump($mail);
var_dump('POST', $_POST);

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress($_POST['emailDistrict'], $_POST['firstnameDistrict']);

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// Sujet du mail
$mail->Subject = 'Test PHPMailer';

// Corps du message
$mail->Body = $_POST['textDistrict'];

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail){
    try {
        $mail->send();
        $infoMail = 'Email envoyé avec succès';
        echo 'Email envoyé avec succès';
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        $infoMail = 'Votre email n\'a pu être envoyé';
        }
}


















include "view/contact.php";