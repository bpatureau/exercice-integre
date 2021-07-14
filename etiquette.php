<?php 
    require_once("config.php");

    if( isset($_POST['complement']) ) :    
      $sql = sprintf("SELECT * FROM `bp_visite` WHERE idVisite='%d'",
          addslashes($_POST['idVisite']));
      $connect->query($sql);
      echo $connect->error;
      $last_id = 2;
      $sql = sprintf("INSERT INTO bp_visite SET idUsers = %d" ,
      $last_id);
    $connect->query($sql);
    echo $connect->error;
    endif;
?>