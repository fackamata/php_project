
<?php
   $host = "https://".$_SERVER['HTTP_HOST']."/RT/2ALT5/"; 
?>

<!-- <footer class="d-flex flex-wrap justify-content-between a fixed-bottom lign-items-center py-3 my-4 border-top"> -->
<footer class="d-flex flex-wrap justify-content-between a lign-items-center py-3 my-4 border-top">
<p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

<a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
</a>

<ul class="nav col-md-4 justify-content-end">
    <li class="nav-item"><a href=<?php echo $host."index.php"?> class="nav-link px-2 text-muted">Home</a></li>
    <li class="nav-item"><a href=<?php echo $host."Artistes/all_artistes.php"?> class="nav-link px-2 text-muted">Artistes</a></li>
    <li class="nav-item"><a href=<?php echo $host."Marlene/home.php"?> class="nav-link px-2 text-muted">Clients</a></li>
    <li class="nav-item"><a href=<?php echo $host."Marlene/home.php/?ctrl=client&fct=display_client&id=7"?> class="nav-link px-2 text-muted">Client</a></li>
    <li class="nav-item"><a href=<?php echo $host."Oeuvres/all_artwork.php"?> class="nav-link px-2 text-muted">Oeuvres</a></li>
    <li class="nav-item"><a href=<?php echo $host."Type/all_type.php"?> class="nav-link px-2 text-muted">Types</a></li>
    <li class="nav-item"><a href=<?php echo $host."Goodies/all_goodies.php"?> class="nav-link px-2 text-muted">Objets</a></li>
</ul>
</footer>