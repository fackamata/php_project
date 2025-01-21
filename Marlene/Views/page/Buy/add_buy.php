<div class="container">
  <form action="<?php echo "./home.php?ctrl=buy&fct=new_buy"?>" 
        method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="quantitebuy">Quantité :</label>
      <input type="num" class="form-control" name="quantitebuy" >
    </div>
    <div class="form-group">
      <label for="nombuy">Object :</label>
      <input type="text" class="form-control" name="nombuy" >
    </div>
    <div class="form-group">
      <label for="prenombuy">Oeuvres :</label>
      <input type="text" class="form-control" name="prenombuy" >
    </div>  
    <div class="form-group">
      <label for="adressebuy">Artiste :</label>
      <input type="text" class="form-control" name="adressebuy" >
    </div>

      <button class="btn btn-success" type="submit">Envoyer</button>
  </form>

    <a href="home.php/?ctrl=buy&fct=index_buy" class="btn btn-primary">Retour à la page du buy</a>
</div>
