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

    if (isset($_GET['total'])) {
      echo json_encode($personneManager->total());
    } else {
      if (isset($_GET['id'])) {
        $idToGet = $_GET['id'];
        echo json_encode($personneManager->get($idToGet));
      } else echo json_encode($personneManager->getAll());
    }

  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'not implemented yet';

  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $personneJSON = json_decode(file_get_contents('php://input'), true);
    $personne = new Personne($personneJSON);
    echo json_encode($personneManager->ajouter($personne));

  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idToDelete = $_GET['id'];
    echo $personneManager->supprimer($idToDelete);

  }


?>
