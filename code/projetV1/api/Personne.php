<?php
  require_once('./manager/DBManager.php');
  require_once('./model/Personne.Class.php');
  require_once('./manager/PersonneManager.php');

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json;');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

  $dbManager = new DBManager();
  $connexion = $dbManager->connect();
  $personneManager = new PersonneManager($connexion);

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo 'not implemented yet';

  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'not implemented yet';

  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    echo 'not implemented yet';

  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    echo 'not implemented yet';

  }


?>
