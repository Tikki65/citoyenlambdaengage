<!DOCTYPE html>
<html lang="fr">
	<div id="bloc_page">
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
			<meta name="description" content="Système électoral - Représentation - Electeur - Discrimination - Vote blanc">
			<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
			<link rel="stylesheet" href="style.css" />
			<title>Notre système électoral, qu'en penser ?</title>
		</head>
		<header class="header">
			<img id="logo" src="images/LogoSmallCLE.png" alt="Son logo"/>
		
			<input type="checkbox" id="check">
			<label for="check" class="icons">
			<i class='bx bx-menu' id="menu-icon"></i>
			<i class='bx bx-x' id="close-icon"></i>
			</label>
			
			<nav class="navbar">  
				<a href="index.html">Accueil</a>
				<a href="constat.html">Constat</a>
				<a href="obligationvote.html">Obligation de vote</a>
				<a href="attribution.html">Attribution des sièges</a><br>
				<a href="laloi.html">Que dit la loi ?</a>
				<a href="propositions.html">Propositions</a>
				<a href="experts.html">Qu'en disent les experts ?</a><br>
				<a href="conclusion.html">Conclusion provisoire</a>
				<a href="initiatives.html">Initiatives citoyennes</a>
				<a href="info.html">Documentation</a>
			</nav>
		</header>
		<body>
      <h1>Affichage des données issues du formulaire</h1>
	<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'citoyenlambdaengage.be');
    $mail->addAddress('');     //Add a recipient

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    </body>
  </div>
</html>
