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
                // on récupère les informations de l'artiste
                $artistes = $data["artistes"][0];
                var_dump($artistes);
                // $data = unserialize($data);
                ?>
        </div>
    </div>
</div>
<form action="" method="post">
    <label for="nomartiste">Nom Artiste :</label>
    <!-- /on utilise les infos pour remplir les placeholder -->
    <input type="text" name="nomartiste" placeholder="<?php echo  $artistes['nomartiste'] ?>">
    <label for="prenomartiste">Prenom Artiste :</label>
    <input type="text" name="prenomartiste" placeholder="<?php echo $artistes["prenomartiste"] ?>">
</form>

<!-- <label for="email">email Artiste :</label>
<input type="email" name="email" placeholder="<?php //$data["email"] ?>">
<label for="pays">Pays :</label>
<input type="text" name="pays" placeholder="<?php //$data["pays"] ?>">
<label for="ville">Ville :</label>
<input type="text" name="ville" placeholder="<?php //$data["ville"] ?>">
<button type="submit">Envoyer</button> -->
    