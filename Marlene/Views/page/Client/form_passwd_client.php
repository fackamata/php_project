<!-- Vue pour les artistes -->
 <div class="container ">
    <?php
        if ( isset($_SESSION['pseudoclient'])){
            ?>
            <h1 class="text-center"><?php $_SESSION["pseudoclient"]?></h1>
            <?php
        } else {
            ?>
            <h1 class="text-center"> Changement du mot de passe client</h1>
            <?php
        }
        
        ?>
        <h2 class="text-center"> Formulaire de changement de mot de passe</h2>

        <?php
        // var_dump_pre($data["message"]);
        if($data["message"] != null)
        {
            ?>
            <div class="alert alert-warning" role="alert">
                <h3 class="text-center"><?php echo $data['message'];?></h3>
            </div>
        <?php   
        }
        ?>
        
        <form   action=<?php echo "./../home.php/?ctrl=client&fct=pwd_change&id=".$id ?> 
            method="post" class="mar-h-75 mt-5 w-75 mx-auto">
            <input  value=<?php echo $data["clients"]["idclient"];?> 
                    name="idclient" class="d-none form-label">
            <div class="mb-3">
                <label for="old_passwd" class="form-label">Ancien mot de passe :</label>
                <input type="text" class="form-control" name="old_passwd" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Nouveau mot de passe :</label>
                <input type="password" class="form-control" id="firstpass" name="motdepasse">
            </div>
            <div class="mb-3">
                <label for="motdepasseclient" class="form-label">Confirmer mot de passe :</label>
                <input type="password" class="form-control" name="motdepasseclient" id="motdepasseclient">
                <p id='validate'></p>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Valider</button>
        </form>
        
</div>