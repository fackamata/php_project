<!-- Vue pour les clients -->
<?php
// on extraie les données nécessaire
    $clients = $data["clients"];
    $image_client = $clients["imageclient"];
    $artiste_favorit = $data["artiste_preferer"];
    $achats = $data["achats"];
    // var_dump($clients    );
    $idclient= $clients["idclient"];
?>
<div class="container">
    <h1 class="h1 my-5 text-center">Compte de <?php echo $clients["pseudoclient"] ?></h1>
    
    <div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">
        <img
            <?php 
            // if (is_file( SRV_PATH."upload/".$image_client)){
                ?>
                src='<?php echo SRV_PATH."upload/".$image_client ?>'
                <?php 
            // } else{
                ?>
                src = "https://picsum.photos/200" ;
                <?php
            // }
            ?>
            class="img-thumbnail cover"
            alt="<?php echo "image de ".$clients['pseudoclient'];?>"
        >
            <!-- <img src="<?php echo SRV_PATH."upload/".$image_client ?>" 
            alt="" srcset=""> -->
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
            <a href="<?php echo "?ctrl=client&fct=display_update_client&id=".$idclient;?>"
                class="btn btn-outline-info m-1">
                Modifier mes infos</a>
            <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_form_psswd_client&id=".$idclient;?>"
                class="btn btn-outline-danger m-1">Modifier mot de passe</a>
        </div>  
    </div>
</div>
       

<!-- partie pour afficher les artistes préféré -->



<?php
if (count($artiste_favorit) > 0){
    ?>

    <h3 class="m-5 text-center">Liste de mes artistes préféré</h3>
    
    <div class="d-flex flex-wrap justify-content-evenly mb-5 ">

        <?php
        for ($i = 0; $i < count($artiste_favorit); $i++) {
            $id_art = $artiste_favorit[$i]["idartiste"];
            $image_artiste = $artiste_favorit[$i]["imageartiste"];
            ?> 
            <div class="card m-2">

                    <img
                        <?php 
                        if (is_file(SRV_PATH."upload/".$image_artiste)){
                            ?>
                            src='<?php echo $image_artiste ?>'
                            <?php 
                        } else{
                            ?>
                            src = "https://picsum.photos/200" ;
                            <?php
                        }
                        ?>
                        class="card-img-top"
                        alt="<?php echo "image de ".$clients['pseudoclient'];?>"
                    >

                    <h5 class="card-title text-center"><?php echo $artiste_favorit[$i]['pseudoartiste'] ?></h5>
                    <div class="card-body">
                        <div class="d-flex flex-wrap g-3 justify-content-around">

                            <p class="card-text"><?php echo $artiste_favorit[$i]['paysartiste']  ?></p>
                            <p class="card-text"><?php echo $artiste_favorit[$i]['villeartiste'] ?></p>
                        </div>
                        <div class="d-flex justify-content-around">

                            <a href="<?php echo SRV_PATH."Artistes/show_artiste.php/?idartiste=".$id_art ?>" 
                            class="btn btn-outline-info">Voir</a>
                            <a href="<?php 
                                        echo SRV_PATH."Marlene/home.php/?ctrl=preferredartiste&fct=remove_preferredartiste&idclient=".$idclient."&idartiste=".$id_art
                                    ?>" 
                                role="button" 
                            >
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

<!-- partie pour afficher les achat effectué -->

<?php
if (count($achats) > 0){
    ?>

    <h3 class="m-5 text-center">Liste de mes achats</h3>

    <div class="d-flex flex-wrap justify-content-evenly mb-5 ">

        <?php
        for ($i = 0; $i < count($achats); $i++) {
            $id_object = $achats[$i]["idobject"];
            $id_oeuvre = $achats[$i]["refidoeuvre"];
            $image_object = $achats[$i]["imageobject"];
            // var_dump($achats[0]);
            ?> 
            <div class="card m-2">

                    <img
                        <?php 
                        if (is_file(SRV_PATH."upload/".$image_object)){
                            ?>
                            src='<?php echo $image_object ?>'
                            <?php 
                        } else{
                            ?>
                            src = "https://picsum.photos/200" ;
                            <?php
                        }
                        ?>
                        class="card-img-top"
                        alt="<?php echo "image de ".$achats[$i]['nomobject'];?>"
                    >

                    <h5 class="card-title text-center"><?php echo $achats[$i]['quantiteachat']." - ".$achats[$i]['nomobject']?></h5>
                    <div class="card-body">
                        <div class="d-flex flex-wrap g-3 justify-content-around">

                            <p class="card-text">
                                <?php $date = $achats[$i]['dateachat'] ;
                                $date = date('D M d Y H:i:s', strtotime($date));
                                echo $date;
                                ?>
                            </p>
                        </div>

                        <div class="d-flex justify-content-around">

                            <a href="<?php echo SRV_PATH."Goodies/one_goodies.php?idobject=".$id_object ?>" 
                            class="btn btn-outline-info">Object</a>

                            <a href="<?php echo SRV_PATH."Oeuvres/show_artwork.php?idoeuvre=".$id_oeuvre ?>" 
                            class="btn btn-outline-info">Oeuvre
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
