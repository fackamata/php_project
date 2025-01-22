<?php
  var_dump($data);
  $pseudo = $data['pseudoclient'];
  echo "<script>let pseudo = ".json_encode($pseudo)."; console.log(pseudo);</script>";
  // echo "<script>let currentpseudo = ".$_SESSION['pseudoartiste']."</script>";
?>
<h1 class="h1 m-5 text-center">Création de compte</h1>

<div class="container">
  <form action="<?php echo "./home.php?ctrl=client&fct=new_client"?>" 
        method="post" enctype="multipart/form-data">
  
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
      <input type="text" class="form-control" name="emailclient" required >
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
            name="motdepasse" id="firstpass" required>
    </div>
    <div class="form-group">
      <label for="motdepasseclient">Confirmer le passe :</label>
      <input type="password" class="form-control"
              name="motdepasseclient" id="motdepasseclient" required>
              <p id='validate'></p>
    </div>
    <div class="alert alert-success" role="alert" id="alert" disabled></div>

      <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
  </form>
</div>
