<form method="post" action="form.php">
<div class="field">
  <label class="label">Nom</label>
  <div class="control">
    <input class="input" name="nom" type="text" placeholder="Nom">
  </div>
</div>
<div class="field">
  <label class="label">prenom</label>
  <div class="control">
    <input class="input" name="prenom" type="text" placeholder="Prenom">
  </div>
</div>
<div class="field">
  <label class="label">email</label>
  <div class="control">
    <input class="input" name="email" type="email" placeholder="exemple@test.be">
  </div>
</div>
    <button class="button is-primary">Confirmer</button>
</form>


<?php 
/*
    $sql = "SELECT * FROM `bp_users`";
    $rq = $connect->query($sql);
    $nb_news = $rq->num_rows;
    while($one_news = $rq->fetch_object()) :
      $allNews[] = $one_news;
  endwhile;
  myPrint_r($allNews)
  */
?>