<!-- Vue pour les artistes -->
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Artiste</h1>
        </div>
        <div class="col-12">
            <h2 class="text-center">Il y a <?= $data['title'] ?> artistes</h2>

        </div>
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center">
                <h2> La liste de nos artiste</h2>
                
                <?php
                    // var_dump_pre($data);
                    $artistes = $data["artistes"];
                    for ($i=0; $i < count($artistes) ; $i++) { 
                        echo "
                        <div>
                            <p>".$artistes[$i]['nomartiste']." ".$artistes[$i]['prenomartiste']."</p>
                        </div>";
                    }
                    // for ($i=0; $i < 7; $i++) { 
                    //     // var_dump_pre($artistes[$i]);
                    //     echo "
                    //     <div>
                    //         <p>".$artistes[$i]['nomartiste']." ".$artistes[$i]['prenomartiste']."</p>
                    //     </div>";
                    // }
                    ?>
            </div>
        </div>
    </div>