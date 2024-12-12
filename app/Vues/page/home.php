<!-- Vue pour un artiste en fonction de son id -->

<div>
    <p> on est dans la page home</p>
    <div>

        <p>l'indice reçue est <?php $data['id'] ?></p>
        


        <!-- bouton de test  -->
        
        <!-- lien avec envoie d'un id -->
        <a href=<?php echo "/?c=home&f=index&i=".$data['id'] ?> >
            
        <button>
            <a href=<?php echo "/?c=artistes&f=index" ?> >
            artiste</a>
        </button>
        
        <button>
        <!-- lien avec envoie d'un id en dur -->
        <a href=<?php echo "/?c=artistes&f=artisteById&i=1" ?> >
            artiste 1
        </a>
    </button>
            <!-- img pas encore fonctionnel  -->
            <img 
            src="<?php $img ?>" 
            alt="<?php $img_alt ?>">
            
    </div>
</div>