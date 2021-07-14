<?php
  require_once("config.php");


?>
<form method="post" action="form" class="form form_main">
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
    <input type="hidden" name="add_user">
    <button class="button is-primary">Confirmer</button>
</form>
<script src="script/home.js"></script>