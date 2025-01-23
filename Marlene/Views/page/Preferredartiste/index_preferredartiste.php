<div class="container-fluid">

    <h1 class="my-3 text-center">Page d'administration des Artistes préférer des clients</h1>

    <div class="d-flex justify-content-end">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=preferredartiste&fct=display_add_preferredartiste" ?>" 
                            class="btn btn-success mx-3" 
                            role="button" >
                            Créer preferredartiste
        </a>
    </div>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id artiste</th>
                <th scope="col">Pseudo artiste</th>
                <th scope="col">Id client</th>
                <th scope="col">Pseudo client</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $preferredartiste = $data['preferredartistes']; 
            // if(isset($data["preferredartiste"])) {
            //     $preferredartiste = $data['preferredartistes']; 
            // } else {
            //     $preferredartiste =
            // }

            for ($i = 0; $i < count($preferredartiste); $i++) {
                ?> 

                <tr> 
                <td><?php echo $preferredartiste[$i]['idartiste'] ?></td>
                <td><?php echo $preferredartiste[$i]['pseudoartiste'] ?></td>
                <td><?php echo $preferredartiste[$i]['idclient'] ?></td>
                <td><?php echo $preferredartiste[$i]['pseudoclient'] ?></td>
                <!-- <td> -->
                    <?php 
                //echo $preferredartiste[$i]['imagepreferredartiste'] ?>
                <!-- </td> -->
                 <?php $idartiste = $preferredartiste[$i]['idartiste']; echo $idartiste;?>
                 <?php $idclient = $preferredartiste[$i]['idclient'];echo $idclient;?>

                <td class="d-flex justify-content-evenly">
                    <!-- <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=preferredartiste&fct=display_show_preferredartiste&idclient=".$idclient."&idartiste=".$idartiste ?>" 
                        class="btn btn-info" 
                        role="button" >
                        Voir
                    </a> -->

                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=preferredartiste&fct=remove_preferredartiste&idclient=".$idclient."&idartiste=".$idartiste?>" 
                        class="btn btn-danger" 
                        role="button" >
                        Supprimer
                    </a>
                </td>

                </tr>    
            <?php } ?>
        </tbody>
    </table>
</div>