<?php
require('fpdf.php');
require '../vendor/autoload.php'; // PHPMailer via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// --- Récupération des données du formulaire ---
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$date_naissance = $_POST['date_de_naissance'] ?? '';
$adresse = $_POST['nom_rue'] ?? '';
$code_postal = $_POST['code_postal'] ?? '';
$signatureData = $_POST['signature_image'] ?? '';

// --- Création du PDF ---
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Formulaire de Pétition Signé', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Nom : $nom", 0, 1);
$pdf->Cell(0, 10, "Prénom : $prenom", 0, 1);
$pdf->Cell(0, 10, "Date de naissance : $date_naissance", 0, 1);
$pdf->Cell(0, 10, "Adresse : $adresse", 0, 1);
$pdf->Cell(0, 10, "Code postal : $code_postal", 0, 1);

// --- Ajout de la signature ---
if (!empty($signatureData)) {
    $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
    $signatureData = str_replace(' ', '+', $signatureData);
    $signatureFile = 'signature.png';
    file_put_contents($signatureFile, base64_decode($signatureData));
    $pdf->Image($signatureFile, 10, $pdf->GetY(), 60, 30);
}

// --- Sauvegarder le PDF ---
$pdfPath = 'formulaire_rempli.pdf';
$pdf->Output('F', $pdfPath);

// --- Envoi du mail ---
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'ssl0.ovh.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@citoyenlambdaengage.be';
    $mail->Password = '20Citoyem@24'; // Remplace par le vrai mot de passe de la boîte mail
    $mail->SMTPSecure = 'ssl'; // ou 'tls' si tu as une erreur
    $mail->Port = 465; // 587 si tu mets 'tls'

    $mail->setFrom('contact@citoyenlambdaengage.be', 'Formulaire Pétition');
    $mail->addAddress('eric.victor.dumont@gmail.com');
    $mail->addAddress('contact@citoyenlambdaengage.be');
    $mail->Subject = 'Formulaire signé';
    $mail->Body = 'Veuillez trouver ci-joint le formulaire PDF signé.';
    $mail->addAttachment($pdfPath);

    $mail->send();
    echo '✅ Formulaire envoyé avec succès !';
} catch (Exception $e) {
    echo "❌ Erreur : {$mail->ErrorInfo}";
}
?>
