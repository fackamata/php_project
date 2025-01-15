<?php 
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';
?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <script defer src="./edit_artiste.js"></script>
  <title>Saisie d'un artiste</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		
	</header>
	<center>
        <?php
          $info=$_POST["id_artiste"];
          $info = unserialize($info);
          echo "<pre>";
          print_r($info);
          echo "</pre>";
        ?>
            <form method='POST' action='./save_edit_artiste.php'>
              <input type="hidden" name="idartiste" value="<?php echo $info['idartiste'] ?>">
              <label for='nom'>Nom : </label>
              <input type='text' name='nom' value='<?php echo $info["nomartiste"] ?>'></br>
              <label for="prenom">Prénom : </label>
              <input type='text' name='prenom' value='<?php echo $info["prenomartiste"]?>'></br>
              <label for='pseudo'>Pseudo : </label>
              <input type='text' name='pseudo' id='pseudo' pattern='' value='<?php echo $info["pseudoartiste"] ?>'></br>
              <?php
              $listpseudo = get_all_artiste_pseudo();
              $list = '';
              foreach ($listpseudo as $pseudo){
                $list = $list.$pseudo[0].',';
              }
              ?>
              <div id='list' style="display: none;"><?php echo $list;?></div>
              <label for="email">Email : </label>
              <input type='text' name='email' value='<?php echo $info["emailartiste"] ?>'></br>
              <label for="pays">Pays : </label>
              <input type='text' name='pays' value='<?php echo $info["paysartiste"] ?>'></br>
              <label for="ville">Ville : </label>
              <input type='text' name='ville' value='<?php echo $info["villeartiste"] ?>'></br>
              <label for="description">Description : </label>
              <input type='text' name='description' value='<?php echo $info["descriptionartiste"] ?>'></br>
              <input type='submit' value='Modifier'>
            </form>
            <form method='POST' action='./change_password.php'>
              <p>Changer le mot de passe</p>
              <label for='oldpass'>Ancien mot de passe : </label>
              <input type='password' name='oldpass' placeholder="********" required></br>
              <label for="firstpass">Nouveau mot de passe : </label>
              <input type="password" id="firstpass" name="firstpass" placeholder="********" required></br>
              <label for="secondpass">Confirmez le mot de passe : </label>
              <input type="password" id="secondpass" name="secondpass" placeholder="********" required></br>
              <p id='validate'></p>
              <input type='submit' id='changepass' value='Changer' disabled>
            </form>
    </center>
</body>
</html>
