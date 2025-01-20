<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
  <!--<script defer src="./connection_account.js"></script>-->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
	<header>
	</header>
	<center>
	<div class="container">
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
	</center>
</body>
</html>
