<?php

require_once('./manager/DBManager.php');
require_once('./model/Livre.Class.php');
require_once('./manager/LivreManager.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

$dbManager = new DBManager();
$connexion = $dbManager->connect();
$livreManager = new LivreManager($connexion);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['total'])) {
    echo json_encode($livreManager->total());
  } else {
    if (isset($_GET['id'])) {
      $idToGet = $_GET['id'];
      echo json_encode($livreManager->get($idToGet));
    } else echo json_encode($livreManager->getAll());
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $livreJSON = json_decode(file_get_contents('php://input'), true);
  $livre = new Livre($livreJSON);
  echo json_encode($livreManager->modifier($livre));
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  $livreJSON = json_decode(file_get_contents('php://input'), true);
  $livre = new Livre($livreJSON);
  echo json_encode($livreManager->ajouter($livre));
} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $idToDelete = $_GET['id'];
  echo $livreManager->supprimer($idToDelete);
}
