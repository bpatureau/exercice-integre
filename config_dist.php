<?php
define('DB_HOST','localhost');
define('DB_USER', 'u868520261_ingrwf09');
define('DB_PASS','Ingrwf09');
define('DB_NAME','u868520261_ingrwf09');

define('MODE','dev'); // dev ou prod

define('ROOT', 'http://localhost/exercice-integre');

define('REFERANT', $_SERVER['HTTP_REFERER']);

$connect = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connect->connect_error) {
    echo 'Erreur de connexion à la base de données';
    exit;
}
else {
    $connect->set_charset("utf8");
}

session_start();

include('functions.php');

//myPrint_r($connect);
?>