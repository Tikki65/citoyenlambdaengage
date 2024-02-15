<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_de_naissance = $POST["date_de_naissance"];
    $nomrue = $_POST["nomrue"];
    $signature = $_POST["signature"];

    // Vous pouvez stocker les données dans une base de données ou les enregistrer dans un fichier
    // Exemple de stockage dans un fichier (ajouter des vérifications de sécurité pour un usage réel)
    $donneesFormulaire = "Nom: " . $nom . "\n" . "prenom: " . $prenom . "\n" . 
    "date_de_naissance: " . $date_de_naissance . "\n" . "nomrue: " . $nomrue . "\n" .
    "signature: " . $signature . "\n";
    file_put_contents("formulaire_data.txt", $donneesFormulaire, FILE_APPEND);

    // Répondre avec un statut OK (200) pour indiquer que le traitement a réussi
    http_response_code(200);
} else {
    // Répondre avec un statut "Method Not Allowed" (405) si la méthode de requête n'est pas autorisée
    http_response_code(405);
}
?>