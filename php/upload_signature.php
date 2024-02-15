<?php
// Vérifier si les données POST sont présentes
if (isset($_POST['signatureData'])) {
    // Obtenez les données de la signature depuis la requête POST
    $signatureData = $_POST['signatureData'];

    // Décodez les données base64 en image
    $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

    // Chemin où vous souhaitez enregistrer la signature (assurez-vous que le dossier existe et a les autorisations d'écriture appropriées)
    $destinationPath = 'http://localhost/test_signature/signaturespetition001/'; // Remplacez par le chemin approprié

    // Générez un nom de fichier unique pour la signature
    $filename = uniqid('signature_') . '.png';

    // Enregistrez la signature dans le dossier spécifié
    if (file_put_contents($destinationPath . $filename, $decodedImage)) {
        echo "Signature enregistrée avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'enregistrement de la signature.";
    }
} else {
    echo "Les données de la signature ne sont pas présentes dans la requête.";
}
?>