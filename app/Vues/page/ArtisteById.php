<!-- Vue pour un artiste en fonction de son id -->
<div>
    <div>
        <h1>Artiste</h1>
    </div>
    <div>
        <div>
            <h2> page détail de l'artiste d'id : 
                <?php $data["artistes"]["idartiste"]; ?>
            </h2>
            
            <?php
                // var_dump_pre($data);
                echo "
                <p>nom : ".$data["artistes"]['nomartiste']."</p>"
                ."<p> prénom : ".$data["artistes"]['prenomartiste']."</p>"
                ?>
        </div>
    </div>
</div>