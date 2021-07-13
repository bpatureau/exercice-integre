<?php 
    require_once("config.php");
    if( isset($_POST['add_raison']) ) :
      if($_POST['raison'] === "Suivre une formation") :
        $raison = 2;
        else :
          $raison = 1;
      endif;
      $sql = sprintf("INSERT INTO `bp_visite` (`idRaison`, `emailUser`, `objetRaison`) VALUES ('%d', '%s', '%s')",
          addslashes($raison),
          addslashes($email),
          addslashes($_POST['complement'])
      );
      $connect->query($sql);
      echo $connect->error;
      $last_id = $connect->insert_id;

  endif;
?>

<form method="post" class="form" action="form">
<div class="field">
  <label class="label">raison de votre visite</label>
  <div class="control">
    <select name="raison" class="form_raison" id="raison">
      <option value="selectionnez">selectionnez</option>
      <option value="formation">Suivre une formation</option>
      <option value="rdv">Rendez-vous avec un membre du personnel</option>
    </select>
  </div>
</div>
<div class="field complement">

</div>
<ul class="list_qui hidden"></ul>
    <input type="hidden" name="add_raison">
    <button class="button is-primary">Confirmer</button>
</form>
<script src="script/form.js"></script>