// Récupérer le canvas et le contexte
var canvas = document.getElementById('signatureCanvas');
var ctx = canvas.getContext('2d');

// Variables pour suivre l'état du dessin
var isDrawing = false;
var lastX = 0;
var lastY = 0;

// Fonction pour dessiner une ligne
function drawLine(x1, y1, x2, y2) {
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
}

// Fonction pour commencer le dessin
function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

// Fonction pour arrêter le dessin
function stopDrawing() {
    isDrawing = false;
}

// Fonction pour dessiner lors du déplacement de la souris
function draw(e) {
    if (!isDrawing) return;
    drawLine(lastX, lastY, e.offsetX, e.offsetY);
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

// Effacer le canvas
function clearCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

// Enregistrer la signature (peut être envoyée à un serveur par exemple)
function saveSignature() {
    var signatureDataURL = canvas.toDataURL(); // Retourne les données au format image (base64)
    document.getElementById('signature_image').value = signatureDataURL;
    // Vous pouvez envoyer les données au serveur à ce stade
}

// Ajouter des événements aux boutons
document.getElementById('clearButton').addEventListener('click', clearCanvas);
document.getElementById('saveButton').addEventListener('click', saveSignature);

// Ajouter des événements au canvas pour le dessin
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mouseout', stopDrawing);

// Fonction pour envoyer la signature vers le serveur
function sendSignatureToServer() {
    var signatureDataURL = canvas.toDataURL();
    document.getElementById('signature_image').value = signatureDataURL;

    fetch('upload_signature.php', {
        method: 'HTTP POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'signatureData=' + encodeURIComponent(signatureDataURL)
    })
    .then(response => {
        if (response.ok) {
            console.log('Signature envoyée avec succès au serveur !');
        } else {
            console.error('Erreur lors de l\'envoi de la signature au serveur.');
        }
    })
    .catch(error => {
        console.error('Une erreur est survenue lors de l\'envoi au serveur :', error);
    });
}
