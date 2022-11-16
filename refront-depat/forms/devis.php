<?php
 require 'vendor/autoload.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;

 if (!empty($_POST))
    $from = $_POST['email'];
    $name = $_POST['name'];
    $depart = $_POST['depart'];
    $arrive = $_POST['arrive'];
    $description = $_POST['description'];
	$dimensions = $_POST['dimensions'];
	$weight = $_POST['weight'];
	$phone = $_POST['phone'];

    $mail = new PHPMailer(true);
	$mail->isSMTP();
    $mail->IsHTML(true);
    $mail->CharSet='utf-8';
	$mail->SMTPAuth = true;

	$mail->Host = 'smtp.ionos.fr';
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->port = 587;
	$mail->Username = 'contact@depa-fret.fr';
	$mail->Password = 'Lejourdegloire1';

	$mail->SetFrom($from, $name);
	$mail->addAddress('contact@depa-fret.fr', 'Devis Depa');
	$logo = '../assets/img/img/depa_logo_transparent.png';
    $link = '#';
$body = "<html> 
    <head> 
        <title>Depa Fret | Devis</title> 
    </head> 
    <body> 
        <h1 style='text-align: center;'>Demande de devis</h1> 
        <table cellspacing='0' style='border: 2px dashed #0b6fb6; width: 700px; text-align: center; margin: 0 auto; padding: 15px;'> 
            <tr> 
                <th>Nom:</th><td>".$name."</td> 
            </tr>
            <tr style='background-color: #e0e0e0;'> 
                <th>Email:</th><td>".$from."</td> 
            </tr>
            <tr> 
                <th>Téléphone:</th><td>".$phone."</td> 
            </tr>
            <tr style='background-color: #e0e0e0;'>
                <th>Adresse de départ:</th>
                <td>".$depart."</td> 
            </tr> 
            <tr>
                <th>Adresse de livraison:</th>
                <td>".$arrive."</td> 
            </tr> 
            <tr style='background-color: #e0e0e0;'>
                <th>Poids (kg):</th>
                <td>".$weight."</td> 
            </tr> 
            <tr style='background-color: #e0e0e0;'>
                <th>Dimensions (Cm):</th>
                <td>".$dimensions."</td> 
            </tr> 
        </table> 
        <p style=' width: 700px; text-align: center; margin: 0 auto; padding: 15px;'>
            ".$description."
        </p>
    </body> 
    </html>";

	$mail->Subject =  'Demande de devis';
	$mail->Body = $body;
	$mail->Send();
	
	header('Location: ../sent.html');
