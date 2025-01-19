
<?php
   $host = "https://".$_SERVER['HTTP_HOST']."/RT/2ALT5/"; 
  //  var_dump($_SERVER["HTTP_HOST"]);
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="<?php echo $host."index.php" ; ?>" 
        class="navbar-brand"
        role="button">
        Home
    </a>
    <!-- <a class="navbar-brand" href=""index.php" >Home</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Artistes/all_artistes.php"; ?>" >Artistes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Marlene/home.php"; ?>" >Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Oeuvres/all_artwork.php"; ?>" >Oeuvres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Type/all_type.php"; ?>" >Type</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Comment/all_comments.php"; ?>" >Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Galery/all_galery.php"; ?>" >Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Goodies/all_goodies.php"; ?>" >Goodies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Marlene/home.php/?ctrl=buy&fct=index"; ?>" >Achats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $host."Marlene/home.php/?ctrl=bid&fct=index"; ?>" >Enchères</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
          
          <a  href="<?php echo $host."./connection_account.php"; ?> "
            class="btn btn-info"
            role="button">
            connexion
          </a>
          
          <a  href="<?php echo $host."Artistes/add_artiste.php"; ?>" 
            class="btn btn-info"
            role="button">
            création artiste
          </a>
          
          <a  href="<?php echo $host."Clients/add_client.php"; ?>" 
              class="btn btn-info"
              role="button">
              création client
          </a>

          <a  href="<?php echo $host."Galery/add_galery.php"; ?>" 
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