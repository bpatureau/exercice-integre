<?php
    require("config.php");
    $sql = "SELECT * FROM `bp_users`";
    $rq = $connect->query($sql);
    $nb_news = $rq->num_rows;
    while($one_news = $rq->fetch_object()) :
      $allNews[] = $one_news;
  endwhile;
  myPrint_r($allNews);