<?php
  require_once("config.php");
  if( isset($_POST['add_user']) ) :
    $sql = sprintf("INSERT INTO `bp_users` (`nom`, `prenom`, `email`) VALUES ('%s', '%s', '%s')",
        addslashes($_POST['nom']),
        addslashes($_POST['prenom']),
        addslashes($_POST['email'])
    );
    $connect->query($sql);
    echo $connect->error;
    $last_id = $connect->insert_id;
    header("location:".REFERANT);
    exit;
endif;
?>
<form method="post" action="form">
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

