<?php
$client = $data["clients"];
?>

<h1 class="h1 text-center">Mise à jour <?php echo $client['pseudoclient']?> </h1>

<div class="container">
    <!-- <form action="<?php // echo "./?ctrl=client&fct=update_client&id=".$client["idclient"]?>" method="post"  enctype="multipart/form-data"> -->
    <form action="<?php echo "./?ctrl=client&fct=update_client&id=".$client["idclient"]?>" method="post">
    
        <input type="text" class="form-control d-none" disabled name="idclient" >
        <div class="form-group">
            <label for="nomclient">Nom :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['nomclient'];?> 
                name="nomclient" >
        </div>  
        <div class="form-group">
            <label for="prenomclient">Prenom :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['prenomclient'];?> 
                name="prenomclient" >
        </div>  
        <div class="form-group">
            <label for="adresseclient">adresse :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['adresseclient'];?> 
                name="adresseclient" >
        </div> 
        <div class="form-group">
            <label for="cpclient">code postal :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['cpclient'];?> 
                name="cpclient" >
        </div> 
        <div class="form-group">
            <label for="villeclient">ville :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['villeclient'];?> 
                name="villeclient" >
        </div> 
        <div class="form-group">
            <label for="emailclient">Emailclient :</label>
            <input type="text" class="form-control" 
                value=<?php echo $client['emailclient'];?> 
                name="emailclient" >
        </div> 
        <button class="btn btn-success" type="submit">Envoyer</button>
    </form>

    <a href='<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_show_client&id=".$id ?>' class="btn btn-primary">Retour page perso</a>
</div>
