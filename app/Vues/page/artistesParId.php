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
                <div class='card'>
                    <!-- <img src="" alt=""> -->
                    <?php
                        echo "<h3>".$artiste['nomartiste']." ".$artiste['prenomartiste']."</h3>"; 
                    ?>                    
                </div>
            </div>
        </div>      
    </div>