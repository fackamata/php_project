<!-- <?php 
$clients = $data["clients"];
$artistes = $data["artistes"];
var_dump($artistes);
?> -->

<h1 class="m-5 text-center">Page d'ajout de préférences client artiste</h1>

<div class="container">
  <form action="<?php echo "./home.php?ctrl=preferredartiste&fct=new_preferredartiste"?>" 
      method="post">

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

      <select class="form-select"  name="idartiste" >
        <option selected>Artiste :</option>
        <?php
          for ($i=0; $i < count($artistes); $i++) { 
            ?>
          <option 
            value="<?php echo $artistes[$i]["idartiste"];?>"
            ><?php  echo $artistes[$i]["pseudoartiste"]; ?>
          </option>

        <?php } ?>
        
      </select>

      <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
  </form>
</div>
