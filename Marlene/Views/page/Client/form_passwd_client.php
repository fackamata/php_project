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
                <h2> Formulaire de changement de mot de passe</h2>
                
                <form   action=<?php echo "./../home.php/?ctrl=client&fct=pwd_change&id=".$id?> 
                        method="post">
                    <div class="mb-3">
                        <label for="old_passwd" class="form-label">Ancien mot de passe</label>
                        <input type="email" class="form-control" id="old_passwd" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="new_passwd_base" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_passwd_base">
                    </div>
                    <div class="mb-3">
                        <label for="new_passwd" class="form-label">Confirmer mot de passe</label>
                        <input type="password" class="form-control" id="new_passwd">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
                
            </div>
        </div>      
    </div>