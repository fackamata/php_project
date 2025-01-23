<?php
require "./../config.php";
require_once './../fonctionsBDD/Goodies.php';

$goodies = get_goodies_by_id($_GET["idobject"]);
echo "<pre>";
print_r($goodies);
echo "</pre>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

$idobject = pg_escape_string($_GET["idobject"]);

echo "<pre>";
print_r(pg_escape_string($_GET["idobject"]));
echo "</pre>";

delete_goodies($idobject);
header('Location: ./../Goodies/all_goodies.php');
?>