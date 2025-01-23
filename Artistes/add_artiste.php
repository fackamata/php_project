<?php
require './../config.php'; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Galery.php'; //Import du fichier contenant les fonctions BDD associé aux Galeries
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./add_artiste.js"></script>
    <title>Ajout d'un artiste</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
      <?php
        session_start(); //Lance la session sur le navigateur
        include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
        $pseudo = get_all_artiste_pseudo(); //Récupère la liste de tout les pseudos d'artiste
        $listgalery = get_all_galery(); //Récupère la liste des galeries pour que l'artiste sélectionne sa galerie d'exposition
        echo "<script>let pseudo = ".json_encode($pseudo)."</script>"; //Initialise une variable JS pour utiliser la liste des pseudos dans un script
        ?>
        <div class="container">
       
      <!-- Formulaire de création d'un artiste double vérification de mot de passe et pseudo unique-->

      <form action="./save_artiste.php" method="post" enctype="multipart/form-data">
      <?php 
        if(isset($_GET['regex'])){ //Condition d'affichage d'une erreur de login précédente
          echo "<div class='alert alert-danger' role='alert'>
              Le mot de passe ne correspond pas aux exigences rappel : 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial, 8 caratères minimum
          </div>";
        }
      ?>
        <div class="form-group">
          <label for="imageartiste">Photo de profil :</label>
          <input type="file" class="form-control" accept="image/*" name="imageartiste" >
        </div>
        <div class="form-group">
          <label for="nomartiste">Nom artiste :</label>
          <input type="text" class="form-control" name="nomartiste" >
        </div>
        <div class="form-group">
          <label for="prenomartiste">Prenom artiste :</label>
          <input type="text" class="form-control" name="prenomartiste" >
        </div>
        <div class="form-group">
          <label for="pseudoartiste">Pseudo artiste :</label>
          <input type="text" class="form-control" name="pseudoartiste" id="pseudoconfirm" required>
          <p id="msgconfirmpseudo"></p>
        </div> 
        <div class="form-group">
          <label for="galeryartiste">Galerie d'exposition : </label>
          <select name='galeryartiste' class="form-select" required>
            <option value='' selected></option>
            <?php foreach ($listgalery as $galerie) {
                    echo "<option value='".$galerie['idgalerie']."'>".$galerie['nomgalerie']."</option>";
                }?>
          </select>
        </div> 
        <div class="form-group">
          <label for="paysartiste">Pays artiste :</label>
          <input type="text" class="form-control" name="paysartiste" >
        </div>
        <div class="form-group">
          <label for="villeartiste">ville artiste :</label>
          <input type="text" class="form-control" name="villeartiste" >
        </div>
        <div class="form-group">
          <label for="emailartiste">email artiste :</label>
          <input type="text" class="form-control" name="emailartiste" >
        </div>
        <div class="form-group">
          <label for="descriptionartiste">Description artiste :</label>
          <input type="text" class="form-control" name="descriptionartiste" >
        </div>
        <div class="form-group">
          <label for="firstpass">mot de passe :</label>
          <input type="password" class="form-control" name="firstpass" id="firstpass"  title="Une majuscule, une minusclue, un chiffre, un caractère spéciale 8 caractères minimum" required>
        </div>
        <div class="form-group">
          <label for="secondpass">Confirmer le passe :</label>
          <input type="password" class="form-control" name="secondpass" id="secondpass"  title="Une majuscule, une minusclue, un chiffre, un caractère spéciale 8 caractères minimum" required>
          <p id='validate'></p>
        </div>

          <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
      </form>

    </div>
    <?php include "./../View/templates/footer.php";?> <!-- Inclus le pied de page-->
  </body>
</html>

pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}"