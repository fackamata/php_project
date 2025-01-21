<div class="container">
  <form action="<?php echo "./home.php?ctrl=bid&fct=new_bid"?>" 
        method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="pseudobid">Oeuvre :</label>
      <input type="text" class="form-control" name="pseudobid" >
    </div>
    <div class="form-group">
      <label for="nombid">Nom :</label>
      <input type="text" class="form-control" name="nombid" >
    </div>
    <div class="form-group">
      <label for="prenombid">Prenom :</label>
      <input type="text" class="form-control" name="prenombid" >
    </div>  
    <div class="form-group">
      <label for="adressebid">adresse :</label>
      <input type="text" class="form-control" name="adressebid" >
    </div>

      <button class="btn btn-success" type="submit">Envoyer</button>
  </form>

    <a href="home.php/?ctrl=bid&fct=index_bid" class="btn btn-primary">Retour à la page du bid</a>
</div>


<!-- TODO mettre une condition pour 
    ne pouvoir enchérir qu'au dessus du prix afficher 
    ( 
      SELECT prixencherir FROM encherir WHERE refidoeuvresencherir = $idoeuvre ORDER BY idencherir DESC
        fetchone()
    ) -->