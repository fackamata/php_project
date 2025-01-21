
<?php
  var_dump_pre($data["message"]);
  if($data["message"] != null){
      ?>
      <h3 class="h3"><?php echo $data['message'];?></h3>
  <?php   
  }
?>

<form method="post" action="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=login_client" ?>" >
  <div class="form-group">
    <label for="pseudoclient">Identifiant</label>
    <input type="text" class="form-control" name="pseudoclient" placeholder="email ou pseudo">
  </div>
  <div class="form-group">
    <label for="motdepasseclient">Password</label>
    <input type="password" class="form-control" name="motdepasseclient">
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>