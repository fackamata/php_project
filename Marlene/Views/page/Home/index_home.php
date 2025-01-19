<h1>Bienvenue dans la page d'administration de Marlène</h1>

<article class=" m-5 d-flex justify-content-center align-items-center">
    <h2>Liste des parties que vous pouvez administrer : </h2>
</article>

<div class="d-flex justify-content-evenly">
    <td class="d-flex justify-content-evenly">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=index_client" ?>" 
            class="btn btn-outline-primary" 
            role="button" >
            Clients
        </a>
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=bid&fct=index_bid" ?>" 
            class="btn btn-outline-primary" 
            role="button" >
            Enchères
        </a>

        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=buy&fct=index_buy" ?>" 
            class="btn btn-outline-primary" 
            role="button" >
            Achats
        </a>
    </td>

</div>