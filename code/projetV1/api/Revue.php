<?php
  require_once('./manager/DBManager.php');
  require_once('./model/Revue.Class.php');
  require_once('./manager/RevueManager.php');

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json;');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

  $dbManager = new DBManager();
  $connexion = $dbManager->connect();
  $RevueManager = new RevueManager($connexion);

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['total'])) {
      echo json_encode($RevueManager->total());
    } else {
      if (isset($_GET['id'])) {
        $idToGet = $_GET['id'];
        echo json_encode($RevueManager->get($idToGet));
      } else echo json_encode($RevueManager->getAll());
    }

  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $revueJSON = json_decode(file_get_contents('php://input'), true);
    $revue = new Revue($revueJSON);
    if ($revue->id != null) {
      echo json_encode($RevueManager->modifier());
    } else echo json_encode($RevueManager->ajouter());

  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    echo 'not implemented yet';

  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idToDelete = $_GET['id'];
    echo $contactManager->delete($idToDelete);

  }

?>
