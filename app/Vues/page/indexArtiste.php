<!-- Vue pour les artistes -->
    <div>
        <div>
            <h1>Artiste</h1>
        </div>
        <div>
            <h2>Il y a <?= $data['title'] ?> artistes</h2>

        </div>
        <div>
            <div>
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
                    ?>
            </div>
        </div>
    </div>