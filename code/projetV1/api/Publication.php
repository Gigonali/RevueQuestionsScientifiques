<?php
  require_once('./manager/DBManager.php');
  require_once('./model/Publication.Class.php');
  require_once('./manager/PublicationManager.php');

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json;');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

  $dbManager = new DBManager();
  $connexion = $dbManager->connect();
  $publicationManager = new PublicationManager($connexion);

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['total'])) {
      echo json_encode($publicationManager->total());
    } else {
      if (isset($_GET['id'])) {
        $idToGet = $_GET['id'];
        echo json_encode($publicationManager->get($idToGet));
      } else echo json_encode($publicationManager->getAll());
    }

  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $publicationJSON = json_decode(file_get_contents('php://input'), true);
    $publication = new Publication($publicationJSON);
    echo json_encode($publicationManager->modifier($publication));

  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $publicationJSON = json_decode(file_get_contents('php://input'), true);
    $publication = new Publication($publicationJSON);
    echo json_encode($publicationManager->ajouter($publication));

  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idToDelete = $_GET['id'];
    echo $publicationManager->supprimer($idToDelete);

  }

?>
