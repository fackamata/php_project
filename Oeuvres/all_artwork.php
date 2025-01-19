<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
require_once BASE_PATH.'/fonctionsBDD/Comments.php';
?>
<html>
<head>
  <title>Oeuvres</title>
  <meta charset="utf-8"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <h1> Oeuvres </h1>
        <div class="container-fluid">
            <?php
                $collectionoeuvres = get_all_artwork();
                //echo "<pre>";
                //print_r($collectionoeuvres);
                //echo "</pre>";
                foreach($collectionoeuvres as $oeuvre){
                    $comments = get_info_comment($oeuvre['idoeuvre']);
                    $html = "<div class='card mb-3' style='max-width: 540px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>
                            <img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>
                            </div>
                            <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                                <h4 class='card-title'>".$oeuvre['pseudoartiste']."</h4>
                                <p class='card-text'>".$oeuvre['descriptionoeuvre']."</p>
                                <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>";
                                foreach ($comments as $comment){
                                    $html = $html."<div class='card'>
                                        <div class='card-header'>
                                            ".$comment['pseudoartiste']."
                                        </div>
                                        <div class='card-body'>
                                            <blockquote class='blockquote mb-0'>
                                            <p>".$comment['message']."</p>
                                            <footer class='blockquote-footer'>".$comment['pseudoclient']."<cite title='Source Title'>".$comment['datecommentaire']."</cite></footer>
                                            </blockquote>
                                        </div>
                                        </div>";
                                }
                            $html = $html."</div>
                            </div>
                        </div>
                        </div>";
                    //echo "<pre>";
                    //print_r($comments);
                    //echo "</pre>";
                echo $html;
                }
            ?>
        </div>
        <a href="./../index.php">Home</a>
    </body>
</html>
