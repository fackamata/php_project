<?php 
// définition de la constante globale BASE_PATH pour éviter les problèmes d'uri

define('FULL_PATH',"https://".$_SERVER['HTTP_HOST']."/RT/2ALT5/");
// définition de la constante globale BASE_PATH_LOCAL pour travailler en local
define('FULL_PATH_LOCAL',"http://".$_SERVER['HTTP_HOST']."/");
define('BASE_PATH', __DIR__);
?>