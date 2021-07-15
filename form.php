<?php 
    require_once("config.php");
    if( isset($_POST['add_user']) ) :    
      $_SESSION['nomUser'] = $_POST['nom'];
      $_SESSION['prenomUser'] = $_POST['prenom'];
      $_SESSION['email'] = $_POST['email'];

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
  <input type="hidden" class="personnel" name="idPersonnel" value="">
  <input type="hidden" class="planning" name="planning" value="">

  <button class="button is-primary">Confirmer</button>
</form>
<script src="script/form.js"></script>