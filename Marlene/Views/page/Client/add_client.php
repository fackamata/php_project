<?php
  // var_dump($data);
  $pseudo = $data['pseudo'];
  echo "<script>let pseudo = ".json_encode($pseudo)."; console.log(pseudo);</script>";
  // echo "<script>let currentpseudo = ".$_SESSION['pseudoartiste']."</script>";
?>
<h1 class="h1 m-5 text-center">Création de compte</h1>

<div class="container">
  <form action="<?php echo "./home.php?ctrl=client&fct=new_client"?>" 
        method="post" enctype="multipart/form-data">
        <?php 
        if(isset($_GET['regexpasswd'])){ //Condition d'affichage d'une erreur de login précédente
          echo "<div class='alert alert-danger' role='alert'>
              Le mot de passe ne correspond pas aux exigences rappel : 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial, 8 caratères minimum
          </div>";
        }
        if(isset($_GET['regexmail'])){ //Condition d'affichage d'une erreur de login précédente
          echo "<div class='alert alert-danger' role='alert'>
              L'adresse mail n'est pas au format standard !
          </div>";
        }
      ?>
    <div class="form-group">
      <label for="pseudoclient">Pseudo :</label>
      <input type="text" class="form-control" 
          name="pseudoclient" id="pseudoconfirm" required >
      <p id="msgconfirmpseudo"></p>
    </div>
    <div class="form-group">
      <label for="nomclient">Nom :</label>
      <input type="text" class="form-control" name="nomclient" required >
    </div>
    <div class="form-group">
      <label for="prenomclient">Prenom :</label>
      <input type="text" class="form-control" name="prenomclient" required>
    </div>  
    <div class="form-group">
      <label for="adresseclient">adresse :</label>
      <input type="text" class="form-control" name="adresseclient" >
    </div>
    <div class="form-group">
      <label for="cpclient">code postal :</label>
      <input type="integer" class="form-control" name="cpclient" >
    </div>
    <div class="form-group">
      <label for="villeclient">ville  :</label>
      <input type="text" class="form-control" name="villeclient"required >
    </div>
    <div class="form-group">
      <label for="emailclient">email :</label>
      <input type="email" class="form-control" 
          pattern="^[a-zA-Z0-9\W]+@[a-zA-Z0-9\W]+\.[a-zA-Z]{2,}$" 
          title="Entrez une adresse mail valide" name="emailclient" required>

    </div>
    <!-- <div class="form-group">
      <label for="imageclient">Image de profil :</label>
      <input type="text" class="form-control" name="imageclient" >
    </div> -->
    <div class="form-group">
      <label for="imageclient">Image de profil :</label>
      <input type="file" class="form-control" name="imageclient" >
    </div>
    <div class="form-group">
      <label for="motdepasse">mot de passe :</label>
      <input type="password" class="form-control"
         name="motdepasse" id="firstpass" 
         pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}" 
         title="Une majuscule, une minusclue, un chiffre, un caractère spéciale 8 caractères minimum" required>

    </div>
    <div class="form-group">
      <label for="motdepasseclient">Confirmer le passe :</label>
      <input type="password" class="form-control"
              name="motdepasseclient" id="motdepasseclient" 
              pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}" 
              title="Une majuscule, une minusclue, un chiffre, un caractère spéciale 8 caractères minimum" required>
              <p id='validate'></p>
    </div>

      <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
  </form>
</div>
