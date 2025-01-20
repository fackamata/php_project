<?php
  session_start();

  session_unset();
  session_destroy();
  echo "on est dans session destroy";
  header("location: ../index.php")
?>  