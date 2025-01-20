<div class="container">
  <form action="<?php echo "./home.php?ctrl=bid&fct=new_client"?>" 
        method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="pseudoclient">Oeuvre :</label>
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

      <button class="btn btn-success" type="submit">Envoyer</button>
  </form>

    <a href="home.php/?ctrl=client&fct=index_client" class="btn btn-primary">Retour à la page du client</a>
</div>
