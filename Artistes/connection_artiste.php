<html>
<head>
  <title>Connexion</title>
  <meta charset="utf-8"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
	session_start(); //Lancement de la session
	include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
	?>
	<div class="container">
		<?php 
		$etat = $_GET['etat'];
		if($etat == 'error'){ //Condition d'affichage d'une erreur de login précédente
			echo "<div class='alert alert-danger' role='alert'>
  				Pseudo ou Mot de passe incorrect
			</div>";
		}
		?>
		<!-- Formulaire de connexion login mot de passe-->
		<form method='POST' action="./login_account_artiste.php">
			<div class="mb-3">
				<label for="pseudo" class="form-label">Pseudo : </label>
				<input type="text" class="form-control" name="pseudo">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Mot de passe : </label>
				<input type="password" class="form-control" name="password">
				<div class="form-text">Ne jamais partager votre mot de passe avec qui que ce soit !</div>
			</div>
			<button type="submit" class="btn btn-primary">Connexion</button>
		</form>
	</div>
	<?php include "./../View/templates/footer.php";?>  <!--Inclus le pied de page-->
  </body>
</body>
</html>
