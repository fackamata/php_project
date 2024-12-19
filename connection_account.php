<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
  <!--<script defer src="./connection_account.js"></script>-->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
	</header>
	<center>
        <br/><br/>
		<table border=1 bgcolor="#CCCCCC">
		<!--<form id='connexion' method="get" action="./Artistes/artiste_account.php">-->
		<form id='connexion' method="get" action="./login_account.php">
				<tr>
					<fieldset id='type_compte'>
						<legend>Choisir votre type de compte</legend>
						<div>
							<input type='radio' id='artistes' name='type_compte' value='artistes' checked/>
							<label for='artiste'>Artiste</label>
						</div><div>
							<input type='radio' id='clients' name='type_compte' value='clients'/>
							<label for='client'>Client</label>
						</div>
					</fieldset>
				</tr>
				<tr>
					<td>Pseudo : </td>
					<td> <input type="text" name="pseudo"></td>
					<td>Mot de passe : </td>
					<td> <input type="password" name="password"></td>
				</tr>
				<tr>
					<td> <input type="submit" value="connexion"></td>
					
				</tr>
			</form>
		</table>
	</center>
</body>
</html>
