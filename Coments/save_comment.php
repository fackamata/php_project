<?php
require "./../config.php";
require BASE_PATH."/fonctionsBDD/Comments.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";
$date = getdate();
$datenow = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
$res = save_comment($_POST['commentaire'], $_POST['idoeuvre'], $_POST['idclient'], $datenow);
echo $datenow;
if($res){
    //header('Location: ./../Oeuvres/show_artwork.php?idoeuvre='.$_POST['idoeuvre']);
}
else{
    //header('Location: ./../Oeuvres/show_artwork.php?idoeuvre='.$_POST['idoeuvre']);
}
?>