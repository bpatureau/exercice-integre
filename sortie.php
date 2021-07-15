<?php 
    require_once("config.php");
    $sql = sprintf("SELECT planning, idPersonnel, idUsers FROM bp_visite WHERE idVisite='%d'",
    addslashes($_SESSION['idVisite'])
  );
  $rq = $connect->query($sql);
  echo $connect->error;
  if ($rq->num_rows > 0) {
    while($row = $rq->fetch_assoc()) {
      $_SESSION['idPersonnel'] = $row["idPersonnel"];
      $_SESSION['planning'] = $row["planning"];
      $_SESSION['idUsers'] = $row["idUsers"];
    }
  }
  $sql = sprintf("SELECT nom, prenom FROM bp_users WHERE idUsers='%d'",
  addslashes($_SESSION['idUsers'])
);
$request = $connect->query($sql);
echo $connect->error;
if ($rq->num_rows > 0) {
  while($row = $request->fetch_assoc()) {
    $_SESSION['nomUser'] = $row["nom"];
    $_SESSION['prenomUser'] = $row["prenom"];
  }
}
$time = date('Y-m-d H:i:s');
myPrint_r($time);
if(isset($_POST['sortie'])):
  myPrint_r($time);
  $sql = sprintf("UPDATE `bp_visite` SET `dateHeureDepart` = '%s'  WHERE `bp_visite`.`idVisite` = %d",
          $time,
          addslashes($_SESSION['idVisite'])
        );
        $connect->query($sql);
        echo $connect->error;
endif;
if(isset($_SESSION['idPersonnel']) && !empty($_SESSION['idPersonnel'])) :
  $url = $_SESSION['idPersonnel'];
  $json = file_get_contents("https://firestore.googleapis.com/v1/".$url);
  $data = json_decode($json);
    ?>
  <p>Personnel à rencontrer: <?php echo $data->fields->prenom->stringValue; ?> <?php echo $data->fields->nom->stringValue; ?></p>
  <p>Téléphone de <?php echo $data->fields->prenom->stringValue; ?>: <?php echo $data->fields->tel->stringValue; ?></p>
  <p>Salle: <?php echo $data->fields->salle->stringValue; ?></p>
    <?php endif;?>
    <?php if(isset($_SESSION['planning']) && !empty($_SESSION['planning'])) :
      $url = $_SESSION['planning'];
      $json = file_get_contents("https://firestore.googleapis.com/v1/".$url);
      $data = json_decode($json);
      $_SESSION['urlcours'] = $data->fields->cours->referenceValue;
      $url = $_SESSION['urlcours'];
      $json = file_get_contents("https://firestore.googleapis.com/v1/".$url);
      $datacours = json_decode($json);
?>

<h1>étiquette</h1>

<p>nom: <?php echo $_SESSION['nomUser'] ?></p>
<p>prenom: <?php echo $_SESSION['nomUser'] ?></p>
  <p>cours: <?php echo $datacours->fields->label->stringValue; ?></p>
  <p>Salle du cours: <?php echo $data->fields->salle->stringValue; ?></p>
    <?php endif;?>
    <script src="script/etiquette.js"></script>