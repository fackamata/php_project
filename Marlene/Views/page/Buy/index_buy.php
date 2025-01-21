<div class="container">

    <h1 class="mb-3">Page d'administration des Enchères</h1>

    <div class="d-flex justify-content-end">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=bid&fct=display_add_bid" ?>" 
                            class="btn btn-success mx-3" 
                            role="button" >
                            Créer Enchères
        </a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">ref Client</th>
                <th scope="col">ref object</th>
                <th scope="col">prix</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $bid = $data['buys']; 
            // }

            for ($i = 0; $i < count($bid); $i++) {
                $id = $bid[$i]['idachat'];
                echo $id;
                ?>

                <tr> 
                <th scope="row"><?php echo $client[$i]['idclient'] ?></th>

                <td><?php echo $client[$i]['refidclientachat'] ?></td>
                <td><?php echo $client[$i]['refidobjectachat'] ?></td>
                <td><?php echo $client[$i]['quantiteachat'] ?></td>
                <td><?php echo $client[$i]['dateachat'] ?></td>
                <!-- <td> -->
                    <?php 
                //echo $client[$i]['imageclient'] ?>
                <!-- </td> -->

                <td class="d-flex justify-content-evenly">
                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=bid&fct=display_show_bid&id=".$id ?>" 
                        class="btn btn-info" 
                        role="button" >
                        Voir
                    </a>
                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=bid&fct=display_update_bid&id=".$id ?>" 
                        class="btn btn-warning mx-3" 
                        role="button" >
                        Éditer
                    </a>

                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=bid&fct=delete_bid&id=".$id?>" 
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
