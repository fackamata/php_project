<div class="container">
  <form action="<?php echo "./home.php?fct=new_client"?>" 
        method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="nomclient">Nom :</label>
      <input type="text" class="form-control" name="nomclient" >
    </div>
    <div class="form-group">
      <label for="prenomclient">Prenom :</label>
      <input type="text" class="form-control" name="prenomclient" >
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
      <input type="text" class="form-control" name="villeclient" >
    </div>
    <div class="form-group">
      <label for="emailclient">email :</label>
      <input type="text" class="form-control" name="emailclient" >
    </div>
    <div class="form-group">
      <label for="imageclient">Image de profil :</label>
      <input type="file" class="form-control" name="imageclient" >
    </div>
    <div class="form-group">
      <label for="firstpasswd">mot de passe :</label>
      <input type="password" class="form-control" 
            name="firstpasswd" id="firstpass" required>
    </div>
    <div class="form-group">
      <label for="confirpasswd">Confirmer le passe :</label>
      <input type="password" class="form-control"
              name="confirpasswd" id="secondpass" required>
    </div>

      <button class="btn btn-success" type="submit">Envoyer</button>
  </form>

    <a href="./all_client.php" class="btn btn-primary">Retour à la page du client</a>
</div>
