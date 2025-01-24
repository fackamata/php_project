<h1 class="text-center my-5">Bienvenue dans la page d'administration de Marlène</h1>

<h2 class="text-center my-5">Liste des parties que vous pouvez administrer : </h2>

<div class="d-flex justify-content-evenly my-5 ">
    <a href="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=index_client" ?>" 
        class="btn btn-outline-primary" 
        role="button" >
        Clients
    </a>
    <a href="<?php echo MARLENE_PATH."home.php/?ctrl=preferredartiste&fct=index_preferredartiste" ?>" 
        class="btn btn-outline-primary" 
        role="button" >
        Artiste favoris
    </a>
    <a href="<?php echo MARLENE_PATH."home.php/?ctrl=buy&fct=index_buy" ?>" 
        class="btn btn-outline-primary" 
        role="button" >
        Achats
    </a>
</div>
<div class="d-flex justify-content-center">
    <a href="<?php echo MARLENE_PATH."home.php/?ctrl=home&fct=return_home" ?>" 
        class="btn btn-outline-info" 
        role="button" >
        Retour Home
    </a>
</div>