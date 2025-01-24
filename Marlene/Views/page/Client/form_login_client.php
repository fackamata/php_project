<div class="container">
  <div class="d-flex flex-column  align-items-center justify-content-around">
    <h1 class="h1 text-center my-4">Page de connexion</h1>

    <?php
      if($data["message"] != null){
        ?>
          <h3 class="h3" ><?php echo $data['message'];?></h3>
          <?php   
      }
      ?>

    <form method="post" action="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=login_client" ?>"
      class="w-50 mt-5" >
      <div class="form-group">
        <label for="pseudoclient">Identifiant :</label>
        <input type="text" class="form-control" name="pseudoclient" placeholder="pseudo" required>
      </div>
      <div class="form-group">
        <label for="motdepasseclient">Password :</label>
        <input type="password" class="form-control" name="motdepasseclient" required>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Connexion</button>
    </form>
  </div>
  
</div>