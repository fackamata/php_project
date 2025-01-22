<!-- Vue pour les clients -->
<?php
// on extraie les données nécessaire
    $clients = $data["clients"];
    $image = $clients["imageclient"];
    $artiste_favorit = $data["artiste_preferer"];
    // var_dump($artiste_favorit);
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
            <h2 class="h4">
                <?php echo $clients['nomclient'].' '.$clients['prenomclient'];?>
            </h2>
            <p><?php echo "E-mail : ".$clients['emailclient'];?>
            </p>
            <p><?php echo "Adresse : ".$clients['adresseclient'];?>
            </p>
            <p><?php echo "Code postal : ".$clients['cpclient'];?>
            </p>
            <p><?php echo "Ville : ".$clients['villeclient'];?>
            </p>
        </div>

        <div class="d-flex flex-column">
            <a href="<?php echo "?ctrl=client&fct=display_update_client&id=".$id ;?>"
                class="btn btn-outline-info m-1">
                Modifier mes infos</a>
            <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_form_psswd_client&id=".$id ;?>"
                class="btn btn-outline-danger m-1">Modifier mot de passe</a>
        </div>  
    </div>
</div>
       
<?php
if (count($artiste_favorit) > 0){
    ?>

    <h3 class="my-3 text-center">Mes artistes préféré</h3>

    <!-- <div class ="d-flex justify-content-end">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=display_add_client" ?>" 
                            class="btn btn-success mx-3" 
                            role="button" >
                            Créer Client
        </a>
    </div> -->
    
    <div class="h-50 d-flex flex-wrap justify-content-evenly">

        <?php
        for ($i = 0; $i < count($artiste_favorit); $i++) {
            $id_art = $artiste_favorit[$i]["idartiste"];
            ?> 
            <div class="card ">
                <!-- <div class="card-header">
                    Featured
                </div> -->
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $artiste_favorit[$i]['pseudoartiste'] ?></h5>
                    <div class="d-flex justify-content-around">

                        <p class="card-text"><?php echo $artiste_favorit[$i]['paysartiste']  ?></p>
                        <p class="card-text"><?php echo $artiste_favorit[$i]['villeartiste'] ?></p>
                    </div>
                    <div class="d-flex justify-content-around">

                        <a href="<?php echo SRV_PATH."Artistes/show_artiste.php/?idartiste=".$id_art ?>" 
                        class="btn btn-primary">Voir</a>
                        <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=preferredartiste&fct=remove_preferredartiste&id=".$id_art?>" role="button" >
                            <img src="<?php echo MARLENE_PATH."assets/img/delete.png"?>" alt="suppression">
                        </a>
                    </div>
                </div>
            </div>
            
        <?php } 
        ?>
    </div>  
    <?php
}
?>
