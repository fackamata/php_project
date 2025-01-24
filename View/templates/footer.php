
<?php
   $host = "https://".$_SERVER['HTTP_HOST']."/RT/2ALT5/"; 
?>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2025 Galeri'Alt</p>

    <ul class="nav col-md-4 justify-content-evenly">
        <li class="nav-item"><a href=<?php echo $host."index.php"?> class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href=<?php echo $host."Artistes/all_artistes.php"?> class="nav-link px-2 text-muted">Artistes</a></li>
        <?php 
            if( isset($_SESSION['pseudoclient']) && $_SESSION['pseudoclient'] == 'lizzim' ) // Afficher bouton admin Marlene
                {
                  ?>
                          
                        <li class="nav-item px-2 text-muted">
                            <a class="nav-link" href=<?php echo $host."Marlene/home.php"; ?> >Admin Marlène</a>
                        </li>

                  <?php
                  
                  if( isset($_SESSION['idartiste']) && $_SESSION['idartiste'] !== null ) { 
                    ?>
                        <li class="nav-item">
                          <a 
                              class="btn btn-outline-success" 
                              role="button" 
                              href=<?php echo $host . "Artistes/artiste_account.php?"; ?>
                              >
                              Mon Compte
                          </a>
                          </li>
                <?php
                    } 
                }
                ?>
            <?php 
            if( isset($_SESSION['pseudoclient']) && $_SESSION['pseudoclient'] == 'cupifm' ) // Afficher bouton admin Marius
                {
                  ?>
                          
                        <li class="nav-item px-2 text-muted">
                            <a class="nav-link" href=<?php echo "./../../Artistes/admin_type.php"; ?> >Admin Marius</a>
                        </li>

                  <?php
                  
                  if( isset($_SESSION['idartiste']) && $_SESSION['idartiste'] !== null ) { 
                    ?>
                        <li class="nav-item">
                          <a 
                              class="btn btn-outline-success" 
                              role="button" 
                              href=<?php echo $host . "Artistes/artiste_account.php?"; ?>
                              >
                              Mon Compte
                          </a>
                          </li>
                <?php
                    } 
                }
                ?>
                <?php
                if( isset($_SESSION['pseudoclient']) && $_SESSION['pseudoclient'] == 'serrante' ) // Afficher bouton admin Terry
                    {
                    ?>
                            <li class="nav-item px-2 text-muted">
                                <a class="nav-link" role="button" href=<?php echo $host."Galery/add_galery.php"; ?> >Création Galerie</a>
                            </li>
                            <li class="nav-item px-2 text-muted">
                                <a class="nav-link" href=<?php echo $host."Goodies/add_goodies.php"; ?> >Création Object</a>
                            </li>
                    <?php
                        } 
                    ?>
        <li class="nav-item"><a href=<?php echo $host."Oeuvres/all_artwork.php"?> class="nav-link px-2 text-muted">Oeuvres</a></li>
        <li class="nav-item"><a href=<?php echo $host."Galery/all_Galery.php"?> class="nav-link px-2 text-muted">Galeries</a></li>
        <li class="nav-item"><a href=<?php echo $host."Goodies/all_goodies.php"?> class="nav-link px-2 text-muted">Objets</a></li>
    </ul>
</footer>