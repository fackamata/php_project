<div class="row">
    <div class="col-12">
        <h1 class="text-center">Home</h1>
    </div>
    <div class="col-12">
        <!-- <h2 class="text-center">Il y a  artistes</h2> -->

    </div>
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center">
            <p> on est dans la page home</p>
            <div>
            <?php $id = 12 ?>
            <p>pour renvoyer un id dans un lien :</p>
            <a href=<?php echo "/?c=home&f=index&i=".$id ?> >
                controlleru home et action index</a>
            </div>
        </div>
    </div>
</div>