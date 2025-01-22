<?php 
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';
?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <script defer src="./edit_artiste.js"></script>    
  <title>Modification Artiste</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<header>
		
	</header>
	<center>
        <?php
          session_start();
          include "./../View/templates/navbar.php";
          $info=$_POST["id_artiste"];
          $info = unserialize($info);
          $pseudo = get_all_artiste_pseudo();
          echo "<script>let pseudo = ".json_encode($pseudo)."</script>";
          echo "<script>let currentpseudo = '".$_SESSION['pseudoartiste']."';</script>";
        ?>

            <form class="container" action="./save_edit_artiste.php" method="post">
            <input type="hidden" name="idartiste" value="<?php echo $info['idartiste'] ?>">
            <div class="form-group">
              <label for="image">Changer la photo de profil : </label>
              <input type="file" class="form-control" accept="image/*" nom="image" >
            </div>
            <div class="form-group">
              <label for="nom">Nom : </label>
              <input type="text" class="form-control" name="nom" value='<?php echo $info["nomartiste"] ?>'>
            </div>
            <div class="form-group">
              <label for="prenom">Prénom : </label>
              <input type="text" class="form-control" name="prenom" value='<?php echo $info["prenomartiste"]?>'>
            </div>
            <div class="form-group">
              <label for="pseudo">Pseudo : </label>
              <input type="text" class="form-control" name="pseudo" id="pseudoconfirm" value='<?php echo $_SESSION['pseudoartiste'] ?>' required>
              <p id="msgconfirmpseudo"></p>
            </div>  
            <div class="form-group">
              <label for="pays">Pays : </label>
              <input type="text" class="form-control" name="pays" value='<?php echo $info["paysartiste"] ?>'>
            </div>
            <div class="form-group">
              <label for="ville">Ville : </label>
              <input type="text" class="form-control" name="ville" value='<?php echo $info["villeartiste"] ?>'>
            </div>
            <div class="form-group">
              <label for="email">Email : </label>
              <input type="email" class="form-control" name="email" value='<?php echo $info["emailartiste"] ?>'>
            </div>
            <div class="form-group">
              <label for="description">Description : </label>
              <input type="text" class="form-control" name="description" value='<?php echo $info["descriptionartiste"] ?>'>
            </div>
              <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
            </form>

            <form method='POST' class='container' action='./change_password.php'>
              <p>Changer le mot de passe</p>
              <div class="col g-3 align-items-center">
                <div class="col-auto">
                  <label for='oldpass' class="col-form-label">Ancien mot de passe : </label>
                  <input type='password' class="form-control" name='oldpass' placeholder="********" required>
                </div>
                <div class="col-auto">
                  <label for="firstpass" class="col-form-label">Nouveau mot de passe : </label>
                  <input type="password" id="firstpass" class="form-control" name="firstpass" placeholder="********" required>
                </div>
                <div class="col-auto">
                  <label for="secondpass" class="col-form-label">Confirmez le mot de passe : </label>
                  <input type="password" id="secondpass" class="form-control" name="secondpass" placeholder="********" required>
                  <p id='validate'></p>
                </div>
                <button class="btn btn-success" type='submit' id='changepass' disabled>Changer</button>
              </div>
            </form>

            <button class="btn btn-success" id="btnsupprcompte">Supprimer le compte</button>
            <div id="supprcompte" class="container" style="display: none;">
            <form method='POST' action='./suppr_compte_artiste.php'>
              <div class="col g-3 align-items-center">
                <div class="col-auto">
                  <label for="supprpass" class="col-form-label">Confirmez en tapant votre mot de passe : </label>
                </div>
                <div class="col-auto">
                  <input type="password" id="supprpass" name="supprpass" class="form-control" placeholder="********" required>
                </div>
                <button class="btn btn-success" type='submit'>Supprimer</button>
              </div>
            </form>
            </div>
            <?php include "./../View/templates/footer.php";?>
  </body>
</html>
