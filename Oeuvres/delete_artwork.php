<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';

delete_artwork($_POST['id_oeuvre']);
header('Location: ./../Artistes/artiste_account.php');
?>