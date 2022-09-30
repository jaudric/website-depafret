<?php
 require "vendor/autoload.php";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;

 if (!empty($_POST)){
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
    $mail->CharSet="utf-8";
	$mail->SMTPAuth = true;

	$mail->Host = "smtp.ionos.fr";
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->port = 587;
	$mail->Username = 'contact@depa-fret.fr';
	$mail->Password = 'Lejourdegloire1';

	$mail->SetFrom($from, $name);
	$mail->addAddress("contact@depa-fret.fr", "Devis Depa");
	$logo = '../assets/img/img/depa_logo_transparent.png';
    $link = '#';
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Depart:</strong> {$depart}</td>";
	$body .= "<td style='border:none;'><strong>Arrive:</strong> {$arrive}</td>";
	$body .= "</tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$description}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

	$mail->Subject =  "Demande de devis";
	$mail->Body = $body;
	$mail->Send();
	
	header("Location: ../sent.html");
}