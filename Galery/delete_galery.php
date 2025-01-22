<?php
require "./../config.php";
require_once './../fonctionsBDD/Galery.php';

// $galeries = get_galery_by_id($_GET["idgalerie"]);
// echo "<pre>";
// print_r($galeries);
// echo "</pre>";

echo "<pre>";
print_r($_GET['idgalerie']);
echo "</pre>";

delete_galery($_GET['idgalerie']);
// header('Location: ./../Galery/all_galery.php');
?>