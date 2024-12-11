<!-- Vue pour les clients -->
 <div><?= $data['title'] ?></div>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">clients</h1>
        </div>
        <div class="col-12">
            <h2 class="text-center">Il y a <?= $data['count'] ?> clients</h2>

        </div>
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center">
                <h2> La liste de nos clients</h2>
                
                <?php
                    // var_dump_pre($data.lenght);
                    var_dump_pre($data);
                    // pprint($data['clients'][0]);
                    // $clients = $data["clients"];
                    // $titles = $data["titles"];
                    
                    // for ($i=0; $i < 7; $i++) { 
                    //     // var_dump_pre($clients[$i]);
                    //     echo "
                    //     <div>
                    //         <p>".$clients[$i]['nomclients']." ".$clients[$i]['prenomclients']."</p>
                    //     </div>";
                    // }
                    ?>
            </div>
        </div>
    </div>