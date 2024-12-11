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
            <?php $data['id'] = 12 ?>
            <p>l'indice reçue est <?php $data['id'] ?></p>
            
            <!-- bouton de test  -->
            <a href=<?php echo "/?c=home&f=index&i=".$data['id'] ?> >
            
            <button>
                <a href=<?php echo "/?c=artistes&f=index" ?> >
                    artiste</a>
            </button>
            </div>
        </div>
    </div>
</div>