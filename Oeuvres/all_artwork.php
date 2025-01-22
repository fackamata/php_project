<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
require_once BASE_PATH.'/fonctionsBDD/Comments.php';
?>
<html>
<head>
  <title>Oeuvres</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
        <?php include "./../View/templates/navbar.php";?>
        <h1> Oeuvres </h1>
        <div class="container-fluid">
            <?php
            session_start();
                $collectionoeuvres = get_all_artwork();
                //echo "<pre>";
                //print_r($collectionoeuvres);
                //echo "</pre>";
                foreach($collectionoeuvres as $oeuvre){
                    $html = "<div class='card mb-3' style='max-width: 540px;'>
                        <div class='row g-0'>
                        <div class='col-md-4'>";
                        if($oeuvre['imageoeuvre']){
                            $html = $html."<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
                        }
                        else{
                            $html = $html."<img src='https://picsum.photos/200' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
                        }
                        $html = $html."</div>
                            <div class='col-md-8'>
                            <div class='card-body'>
                            <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                            <h4 class='card-title'>".$oeuvre['pseudoartiste']."</h4>
                            <p class='card-text'>".$oeuvre['descriptionoeuvre']."</p>
                            <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                            <form method='GET' action='./show_artwork.php'><input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'/><input type='submit' value='Voir'/></form>";
                    $html = $html."</div></div></div></div>";
                    echo $html;
                }
            ?>
        </div>
        <?php include "./../View/templates/footer.php";?>
    </body>
</html>