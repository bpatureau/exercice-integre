<?php 
    require_once("config.php");
    $deux = 2;
    if( isset($_POST['add_user']) ) :    
      $email = $_POST['email'];
      $sql = sprintf("INSERT INTO `bp_users` (`nom`, `prenom`, `email`) VALUES ('%s', '%s', '%s')",
          addslashes($_POST['nom']),
          addslashes($_POST['prenom']),
          addslashes($_POST['email']));
        
      $connect->query($sql);
      echo $connect->error;
      $last_id = $connect->insert_id;
      $sql = sprintf("INSERT INTO bp_visite SET idUsers = %d" ,
      $last_id);
    $connect->query($sql);
    echo $connect->error;
  endif;
?>

<form method="post" class="form" action="etiquette">
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
    <input type="hidden" name="idVisite" value="<?php echo $deux?>">
    <button class="button is-primary">Confirmer</button>
</form>
<script src="script/form.js"></script>