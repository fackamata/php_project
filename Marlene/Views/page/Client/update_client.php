<?php
require_once './../fonctionsBDD/Clients.php'; 

?>
<div class="container">

    <form action="<?php echo "./home.php?fct=update_client"?>" method="post">
    
        <input type="text" class="form-control" disabled name="idclient" >
        <div class="form-group">
            <label for="nomclient">Nom :</label>
            <input type="text" class="form-control" name="nomclient" >
        <div class="form-group">
        </div>
            <label for="prenomclient">Prenom :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['prenomclient'];?> 
                name="prenomclient" >
        <div class="form-group">
        </div>  
            <label for="adresseclient">adresse :</label>
            <input type="text" class="form-control" name="adresseclient" >
        <div class="form-group">
        </div>
            <label for="cpclient">code postal :</label>
            <input type="integer" class="form-control" name="cpclient" >
        <div class="form-group">
        </div>
            <label for="villeclient">ville  :</label>
            <input type="text" class="form-control" name="villeclient" >
        <div class="form-group">
        </div>
            <label for="emailclient">email :</label>
            <input type="text" class="form-control" name="emailclient" >
        <div class="form-group">
            <label for="firstpass">mot de passe :</label>
            <input type="password" class="form-control" name="firstpass" id="firstpass" required>
        </div>
        <div class="form-group">
            <label for="secondpass">Confirmer le passe :</label>
            <input type="password" class="form-control" name="secondpass" id="secondpass" required>
        </div>

        <button class="btn btn-success" type="submit">Envoyer</button>
    </form>

    <a href='<?php echo "./home.php/?fct=client&id=".$id ?>' class="btn btn-primary">Retour page perso</a>
</div>
