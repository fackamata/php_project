<?php 
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Galery.php'; //Import du fichier contenant les fonctions BDD associé aux Galeries
?>
<html>
<head>
   <script defer src="./edit_artiste.js"></script>    
  <title>Modification Artiste</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
      session_start(); //Lance la session sur le navigateur
      include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
      $info = get_info_artiste($_SESSION['idartiste']); //Récupère les informations d'un artiste pour les afficher dans le formulaire
      $pseudo = get_all_artiste_pseudo(); //Récupère la liste de tout les pseudos d'artiste
      $listgalery = get_all_galery(); //Récupère la liste des galeries pour que l'artiste sélectionne sa galerie d'exposition
      echo "<script>let pseudo = ".json_encode($pseudo)."</script>"; //Initialise une variable JS pour utiliser la liste des pseudos dans un script
      echo "<script>let currentpseudo = '".$_SESSION['pseudoartiste']."';</script>"; //Initialise une variable JS pour utiliser le pseudo connecté dans un script
    ?>
        <!-- Formulaire de modification des informations d'un artiste, les champs sont prérempli avec ces informations actuelles-->
        <form class="container" action="./save_edit_artiste.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idartiste" value="<?php echo $info['idartiste'] ?>">
        <div class="form-group">
          <label for="image">Changer la photo de profil : </label>
          <input type="file" class="form-control" accept="image/*" name="image" >
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
          <label for="galeryartiste">Galerie d'exposition : </label>
          <select name='galeryartiste' class="form-select" required>
            <?php foreach ($listgalery as $galerie) {
                    if($galerie['idgalerie'] == $info['idgalerie']){
                      echo "<option value='".$galerie['idgalerie']."' selected>".$galerie['nomgalerie']."</option>";
                    }
                    else{
                      echo "<option value='".$galerie['idgalerie']."'>".$galerie['nomgalerie']."</option>";
                    }
                }?>
          </select>
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

        <!--Formulaire de modification du mot de passe artiste avec vérification de l'ancion mot de passe et double vérification du nouveau en javascript-->
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
              <p id='validate'></p> <!--Affichage de l'information de similitude entre les 2 mot de passes-->
            </div>
            <button class="btn btn-success" type='submit' id='changepass' disabled>Changer</button>
          </div>
        </form>

        <!--Formulaire de suppression de son compte artiste avec confirmation de mot de passe pour vérification d'identité-->
        <button class="btn btn-success" id="btnsupprcompte">Supprimer le compte</button>
        <div id="supprcompte" class="container" style="display: none;">
        <form method='POST' action='./delete_account_artiste.php'>
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
        <?php include "./../View/templates/footer.php";?>  <!--Inclus le pied de page-->
  </body>
</html>
