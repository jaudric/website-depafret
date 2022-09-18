<?php
 require "vendor/autoload.php";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;

if (!empty($_POST)){
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = "smtp.ionos.fr";
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->port = 587;
	$mail->Username = 'contact@depa-fret.fr';
	$mail->Password = 'Lejourdegloire1';

	$mail->SetFrom($from, $name);
	$mail->addAddress("contact@depa-fret.fr", "Service Depa");

	$mail->Subject =  $subject;
	$mail->Body = $message;
	$mail->Send();
	
	//header("Location: ../sent.html");
}
?>