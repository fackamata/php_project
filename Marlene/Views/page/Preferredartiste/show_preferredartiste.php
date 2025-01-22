<!-- Vue pour les preferredartiste -->
<?php
// on extraie les données nécessaire
    $preferredartiste = $data["preferredartiste"];
    $image = $preferredartiste["imageclient"];
    // var_dump($preferredartiste);
    $id = $preferredartiste["idclient"];
?>
<div class="container">
    <h1 class="h1 my-5 text-center">Préférence par artiste </h1>
    
    <div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">

        <?php   
            // for ( $i = 0; $i < count($preferredartiste) )
            // {
            //     $pair = $preferredartiste[$i];
            // }
        ?>
        <div class="p-5">
            <h3 class="h3">
                <?php echo $pair['pseudoclient'].' '.$pair['pseudo artiste'];?>
            </h3>
        </div>
    </div>
</div>
            <!-- <div>
                <a href="<?php //echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_form_psswd_client&id=".$id ;?>"
                    class="btn btn-info">Modifier mot de passe</a>
                <a href="<?php //echo "?ctrl=client&fct=display_update_client&id=".$id ;?>"
                    class="btn btn-warning">Modifier mes infos</a>
            </div>   -->
       