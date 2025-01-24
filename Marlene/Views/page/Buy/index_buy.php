<?php
// var_dump($data);
$buys = $data["buys"]
?>

<div class="container">

    <h1 class="mb-3">Page d'administration des Achat</h1>

    <div class="d-flex justify-content-end">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=buy&fct=display_add_buy_admin" ?>" 
                            class="btn btn-success mx-3" 
                            role="button" >
                            Créer Achat
        </a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Client</th>
                <th scope="col">Nom objet</th>
                <th scope="col">quantité</th>
            </tr>
        </thead>
        <tbody> 
            <?php

            for ($i = 0; $i < count($buys); $i++) {
                $id = $buys[$i]['idacheter'];
                ?>

                <tr> 
                <th scope="row"><?php echo $id ?></th>

                <td><?php echo $buys[$i]['pseudoclient'] ?></td>
                <td><?php echo $buys[$i]['nomobject'] ?></td>
                <td><?php echo $buys[$i]['quantiteachat'] ?></td>
                <!-- <td> -->
                    <?php 
                //echo $buy[$i]['imagebuy'] ?>
                <!-- </td> -->

                <td class="d-flex justify-content-evenly">
                    <!-- <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=buy&fct=display_show_buy&id=".$id ?>" 
                        class="btn btn-info" 
                        role="button" >
                        Voir
                    </a>
                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=buy&fct=display_update_buy&id=".$id ?>" 
                        class="btn btn-warning mx-3" 
                        role="button" >
                        Éditer
                    </a> -->

                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=buy&fct=delete_buy&id=".$id?>" 
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
