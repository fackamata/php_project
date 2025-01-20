<header>
  <?php 
  $host = "https://".$_SERVER['HTTP_HOST']."/RT/2ALT5/"; 
  // include_once( $host.'Utils/marlene_fonctions.php');
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href=<?php echo $host."index.php" ; ?> 
        class="navbar-brand"
        role="button">
        Home
    </a>
    <!-- <a class="navbar-brand" href="index.php" >Home</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Artistes/all_artistes.php"; ?> >Artistes</a>
        </li>
        <?php 
          if (isset($_SERVER["PHP_AUTH_USER"]) && $_SERVER["PHP_AUTH_USER"] == 'lizzim') {
            ?>
            <li class="nav-item">
              <a class="nav-link" href=<?php echo $host."Marlene/home.php"; ?> >Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=<?php echo $host."Marlene/home.php/?ctrl=buy&fct=index_buy"; ?> >Achats</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=<?php echo $host."Marlene/home.php/?ctrl=bid&fct=index_bid"; ?> >Enchères</a>
            </li>
              
        <?php 
          }
            
        ?>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Oeuvres/all_artwork.php"; ?> >Oeuvres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Type/all_type.php"; ?> >Type</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Comment/all_comments.php"; ?> >Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Galery/all_galery.php"; ?> >Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo $host."Goodies/all_goodies.php"; ?> >Goodies</a>
        </li>
      <form class="form-inline my-2 my-lg-0">
        <?php 
        if( isset($_SESSION['idclient']) && $_SESSION['idclient'] !== null 
            || isset($_SESSION['idartiste']) && $_SESSION['idartiste'] !== null ) {
          ?>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo $host."Utils/logout.php"; ?>
              >Se déconnecter</a>  
          </li>
          <li class="nav-item">
          <?php 
        } else {
          ?>
            <a class="nav-link" href="/login.php">Se connecter</a>
          </li>
          <?php 
        }
          ?>
        </li>
          
          <a  href=<?php echo $host."Artistes/connection_artiste.php"; ?> 
            class="btn btn-info"
            role="button">
            connexion Artiste
          </a>
          <a  href=<?php echo $host."Marlene/home.php/?ctrl=client&fct=display_login_client"; ?> 
            class="btn btn-info"
            role="button">
            connexion Client
          </a>
          
          <a  href=<?php echo $host."Artistes/add_artiste.php"; ?> 
            class="btn btn-info"
            role="button">
            création artiste
          </a>
          
          <a  href=<?php echo $host."Clients/add_client.php"; ?> 
              class="btn btn-info"
              role="button">
              création client
          </a>

          <a  href=<?php echo $host."Galery/add_galery.php"; ?> 
              class="btn btn-info"
              role="button">
              création galerie
          </a>

        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      </form>
    </div>
  </nav>
   
</header>