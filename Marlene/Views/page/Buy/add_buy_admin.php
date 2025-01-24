<!-- <?php 
// $clients = $data["clients"];
// $objects = $data["objects"];
var_dump($data);
?> -->

<h1 class="m-5 text-center">Page d'ajout d'achat par l'admin'</h1>

<div class="container">
  <form action="<?php echo "./home.php?ctrl=buy&fct=new_buy_admin"?>" 
      method="post">
    <div class="d-flex flex-column w-50 align-items-center justify-content-center">
    
      <select class="form-select"  name="idclient" >

        <option selected>Client :</option>
          <?php
            for ($i=0; $i < count($clients); $i++) { 
              ?>
            <option 
              value="<?php echo $clients[$i]["idclient"];?>"
              ><?php  echo $clients[$i]["pseudoclient"]; ?>
            </option>

          <?php } ?>
          
      </select>

      <select class="form-select"  name="idobject" >
        <option selected>Objet :</option>
        <?php
          for ($i=0; $i < count($objects); $i++) { 
            ?>
          <option 
            value="<?php echo $objects[$i]["idobject"];?>"
            ><?php  echo $objects[$i]["nomobject"]; ?>
          </option>

        <?php } ?>
        
      </select>
          
      <div class="d-flex justify-content-center">
        <div class="form-group">
          <label for="quantiteachat">Quantité :</label>
          <input class="form-control" name="quantiteachat" id="idquantitebuy" value="1" readonly>
        </div>
        <p id="incremente" class="btn">+</p>
      </div>

      <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
    </div>
  </form>

</div>
