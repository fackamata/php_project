<div class="container">
  <form action="<?php echo "./home.php?ctrl=client&fct=new_client"?>" 
        method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="pseudoclient">Pseudo :</label>
      <input type="text" class="form-control" name="pseudoclient" >
    </div>
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
    </div>
    <div class="alert alert-success" role="alert" id="alert" disabled></div>

      <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
  </form>
</div>
