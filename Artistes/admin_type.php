<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Types.php'; //Import du fichier contenant les fonctions BDD associé aux Types

?>
<html>
<head>
  <title>Administration Types</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
		<?php
            session_start(); //Lance la session sur le navigateur
            include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
        ?>
<table class="table table-hover container">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $types = get_info_type(); 

            foreach ($types as $type) {
                ?> 

                <tr> 
                <th scope="row"><?php echo $type['idtype'] ?></th>

                <th><?php echo $type['nomtype'] ?></th>
                <th><form method="POST" action="./../Types/delete_type.php"><input type='hidden' name='idtype' value='<?php echo $type['idtype']?>'><button class="btn btn-danger" type='submit'>Supprimer</button></form></th>
                </tr>
                <?php }?>
        </tbody>
    </table>
    <p style='text-align: center;'>Ajouter un Type : </p>
    <form method='POST' action="./../Types/add_type.php" class="container">
			<div class="mb-3">
				<label for="nomtype" class="form-label">Intituler du type : </label>
				<input type="text" class="form-control" name="nomtype">
			</div>
			<button type="submit" class="btn btn-primary">Ajouter</button>
	</form>
    <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
</body>
</html>
