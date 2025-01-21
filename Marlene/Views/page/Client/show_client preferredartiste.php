<!-- Vue pour les clients -->
<?php
// on extraie les données nécessaire
    $clients = $data["clients"];
    $image = $clients["imageclient"];
    // var_dump($clients);
    $id = $clients["idclient"];
?>
<div class="container">
    <h1 class="h1 my-5 text-center">Compte de <?php echo $clients["pseudoclient"] ?></h1>
    
    <div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">
        <img
            <?php 
            if (is_file(SRV_PATH."image/".$image)){
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
            alt="<?php echo "image de ".$clients['pseudoclient'];?>"
            <?php //echo SRV_PATH."image/".$imgclient;?>
        >

        <div class="p-5">
            <h3 class="h3">
                <?php echo $clients['nomclient'].' '.$clients['prenomclient'];?>
            </h3>
            <p><?php echo "E-mail : ".$clients['emailclient'];?>
            </p>
            <p><?php echo "Adresse : ".$clients['adresseclient'];?>
            </p>
            <p><?php echo "Code postal : ".$clients['cpclient'];?>
            </p>
            <p><?php echo "Ville : ".$clients['villeclient'];?>
            </p>
        </div>
    </div>
</div>
            <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_form_psswd_client&id=".$id ;?>"
            class="btn btn-info">Modifier mot de passe</a>
            <a href="<?php echo "?ctrl=client&fct=display_update_client&id=".$id ;?>"
                class="btn btn-warning">Modifier mes infos</a>
            </div>  
    </div>
       