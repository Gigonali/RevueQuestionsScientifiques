<?php

require_once('./manager/DBManager.php');
require_once('./model/MaisonEdition.Class.php');
require_once('./manager/MaisonEditionManager.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

$dbManager = new DBManager();
$connexion = $dbManager->connect();
$maisonEditionManager = new MaisonEditionManager($connexion);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['total'])) {
    echo json_encode($maisonEditionManager->total());
  } else {
    if (isset($_GET['id'])) {
      $idToGet = $_GET['id'];
      echo json_encode($maisonEditionManager->get($idToGet));
    } else echo json_encode($maisonEditionManager->getAll());
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $maisonEditionJSON = json_decode(file_get_contents('php://input'), true);
  $maisonEdition = new MaisonEdition($maisonEditionJSON);
  echo json_encode($maisonEditionManager->modifier($maisonEdition));
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  $maisonEditionJSON = json_decode(file_get_contents('php://input'), true);
  $maisonEdition = new MaisonEdition($maisonEditionJSON);
  echo json_encode($maisonEdition);
  echo json_encode($maisonEditionManager->ajouter($maisonEdition));
} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $idToDelete = $_GET['id'];
  echo $maisonEditionManager->supprimer($idToDelete);
}
