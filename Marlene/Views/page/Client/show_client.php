<!-- Vue pour les clients -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">clients</h1>
        </div>
        <div class="col-12">

        </div>
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center">
                <h2> Page de gestion de <?php echo $clients["pseudoclient"];?></h2>
                
                <?php
                    $clients = $data["clients"];
                    $imgclient = $data["image"];
                    // var_dump($clients);
                    $id = $clients["idclient"];
                ?>
                <div class="container">

                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo SRV_PATH."image/".$imgclient;?>" 
                        class="card-img-top" alt="<?php echo $clients['pseudoclient'];?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $clients['pseudoclient'];?>
                            </h5>
                            <p class="card-text"><?php echo $clients['emailclient'];?>
                                </p>
                                <p class="card-text"><?php echo $clients['adresseclient'];?>
                            </p>
                            <p class="card-text"><?php echo $clients['cpclient'];?>
                                </p>
                                <p class="card-text"><?php echo $clients['villeclient'];?>
                            </p>
                            <p class="card-text"><?php echo $clients['cpclient'];?>
                            </p>
                            <a href="<?php echo SRV_PATH."Marlene/home.php/?fct=pwd_change&id=".$id ;?>"
                            class="btn btn-info">Modifier mot de passe</a>
                            <a href="<?php echo "?fct=update_client&id=".$id ;?>"
                                class="btn btn-warning">Modifier mes infos</a>
                            </div>  
                    </div>
                </div>
            </div>
        </div> 
</div>
        <!-- <a href="<?php // echo "?fct=pwd_change&id=".$id ;?>" -->