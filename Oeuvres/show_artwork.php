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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php 
    session_start();
    include "./../View/templates/navbar.php";
    $oeuvre = get_info_artwork($_GET['idoeuvre']);
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
?>
    <body>
       <h1> Oeuvres </h1>
        <div class='card mb-3' style='max-width: 540px;'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <?php if($oeuvre['imageoeuvre']){
                        echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
                    }
                    else{
                        echo "<img src='https://picsum.photos/200' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
                    }
                    ?>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $oeuvre['nomoeuvre'] ?></h5>
                        <h4 class='card-title'><a href='./../Artistes/show_artiste.php?idartiste=<?php echo $oeuvre['idartiste']?>'><?php echo $oeuvre['pseudoartiste'] ?></a></h4>
                        <p class='card-text'><?php echo $oeuvre['descriptionoeuvre'] ?></p>
                        <p class='card-text'><small class='text-body-secondary'><?php echo $oeuvre['dateoeuvre'] ?></small></p>
                        <form method="POST" action="" ><input type='hidden' name='idoeuvre' value='<?php echo $oeuvre['idoeuvre']?>'/><button type='submit' class='btn btn-primary'>Favoris</button></form>
                    </div>
                </div>
            </div>
        </div>
        <div class='container-fluid'>
        <?php
            $comments = get_info_comment($oeuvre['idoeuvre']);
            if(isset($_SESSION['pseudoclient'])){
                $commentaire = false;
                foreach ($comments as $comment){
                    if ($comment['pseudoclient'] == $_SESSION['pseudoclient']){
                        $commentaire = true;
                    }
                }
                if(!$commentaire){
                    echo "<form method='POST' action='./../Coments/save_comment.php'>
                            <div class='mb-3'>
                            <label for='commentaire' class='form-label'>Commentaire : </label>
                            <textarea class='form-control' name='commentaire' rows='3'></textarea>
                            </div>
                            <button type='submit' class='btn btn-primary'>Enregistrer</button>
                            <input type='hidden' name='idclient' value='".$_SESSION['idclient']."'>
                            <input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'>
                            </form>";
                }
            }
            foreach ($comments as $comment){
                $html = "<div class='card container'>
                    <div class='card-header'>
                        ".$comment['pseudoartiste']."
                    </div>
                    <div class='card-body'>
                        <blockquote class='blockquote mb-0'>
                        <p>".$comment['message']."</p>
                        <footer class='blockquote-footer'>".$comment['pseudoclient']." - ".$comment['datecommentaire']."</footer>
                        </blockquote>
                    </div>
                    </div>";
                    echo $html;
            }
        ?>
        </div>
        <?php include "./../View/templates/footer.php";?>
    </body>
</html>
