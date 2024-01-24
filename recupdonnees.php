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
	<ul>
		<li><?php echo $_POST['nom']; ?></li>
		<li><?php echo $_POST['prenom']; ?></li>
		<li><?php echo $_POST['date_de_naissance']; ?></li>
		<li><?php echo $_POST['code_postal']; ?></li>
		<li><?php echo $_POST['signatureCanvas']; ?></li>
	</ul>

    </body>
  </div>
</html>
