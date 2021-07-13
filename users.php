<?php
/*voir les utilisateurs enregistré. C'était pas demandé mais j'avais envie de le faire*/
    require("config.php");
    $sql = "SELECT * FROM `bp_users`";
    $rq = $connect->query($sql);
    $nb_news = $rq->num_rows;
    while($one_news = $rq->fetch_object()) :
      $allNews[] = $one_news;
  endwhile;

  foreach($allNews as $key => $value): 
  echo "<p>$value->nom | $value->prenom | $value->email</p>";
  
  endforeach;
  ?>