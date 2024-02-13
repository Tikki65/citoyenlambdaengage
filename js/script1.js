document.getElementById("myForm").addEventListener("submit", function (event) {
    event.preventDefault();
  
    var formData = new FormData(this);
  
    fetch("stocker_formulaire.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        if (response.ok) {
          console.log("Formulaire envoyé avec succès !");
          // Vous pouvez ajouter ici des actions supplémentaires après avoir stocké les données.
        } else {
          console.error("Erreur lors de l'envoi du formulaire.");
        }
      })
      .catch(function (error) {
        console.error("Une erreur est survenue :", error);
      });
  });
  