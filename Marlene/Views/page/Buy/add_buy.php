
<?php
// var_dump($data);
$idclient = $data['idclient'];
$goodie = $data['goodie'];
$image = $goodie['imageobject'];

?>

<h1 class="h1 text-center m-5">Page d'achat de : <?php echo ' '.$goodie["nomobject"] ?></h1>


<div class="container">
    
    <div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">
        <img
            <?php 
            if (is_file(SRV_PATH."upload/".$image)){
                ?>
                src='<?php echo $image ?>'
                <?php 
            } else{
                ?>
                src = "https://picsum.photos/200" ;
                <?php
            }
            ?>
            class="img-thumbnail"
            alt="<?php echo "image de ".$goodie['nomobject'];?>"
        >

        <div class="p-5">
            <h4 class="h4">
                <?php echo $goodie['nomobject'];?>
            </h4>
            <p><?php echo $goodie['descriptionobject'];?>
            </p>
        </div>
        <div>
          <p>Au prix de :</p>
          <p id="prix-object">
            <?php echo $goodie['prixobject']." €";?>
          </p>
        </div>
    </div>
</div>
<form action="<?php echo MARLENE_PATH."home.php/?ctrl=buy&fct=new_buy&id=".$goodie['idobject'] ?>"
      method="post" class="d-flex justify-content-evenly align-items-center">
      
<div class="d-flex justify-content-center">
  <div class="form-group">
    <label for="quantiteachat">Quantité :</label>
    <input class="form-control" name="quantiteachat" id="idquantitebuy" value="1" readonly>
  </div>
  <p id="incremente" class="btn">+</p>
</div>
  <div class="form-group ">
    <label for="prixtotal">Total :</label>
    <input class="form-control" name="prixtotal" id="prixtotal" value="<?php echo $goodie['prixobject'] ?>" readonly>
  </div>


  <button class="btn btn-outline-success" type="submit">Acheter</button>
</form>
