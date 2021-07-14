<?php 
    require_once("config.php");

    if( isset($_POST['add_user']) ) :    
      $email = $_POST['email'];
      $sql = sprintf("INSERT INTO `bp_users` (`nom`, `prenom`, `email`) VALUES ('%s', '%s', '%s')",
          addslashes($_POST['nom']),
          addslashes($_POST['prenom']),
          addslashes($_POST['email']));
      $connect->query($sql);
      echo $connect->error;
      $last_id = $connect->insert_id;
  endif;
  if(isset($_POST['email'])):
  $get_user = sprintf("SELECT * FROM `bp_users` WHERE email='%s'",
  $_POST['email']
    );
    $user = $connect->query($get_user);
    echo $connect->error;
    if($user->num_rows > 0):
      while($oneElement = $user->fetch_array()):
        $user_elements[] = $oneElement;
      endwhile;
    endif;

    if( isset($_POST['add_raison']) ) :
      if($_POST['raison'] === "Suivre une formation") :
        $raison = 2;
        else :
          $raison = 1;
      endif;
      $sql = sprintf("INSERT INTO `bp_visite` (`idRaison`, `idUsers`, `objetRaison`) VALUES ('%d', '%d', '%s')",
          addslashes($raison),
          addslashes($user_elements[0][0]),
          addslashes($_POST['complement'])
      );
      $connect->query($sql);
      echo $connect->error;
      $last_id = $connect->insert_id;

  endif;
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