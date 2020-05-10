<?php
  require_once('./manager/DBManager.php');
  require_once('./model/Domaine.Class.php');
  require_once('./manager/DomaineManager.php');

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json;');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

  $dbManager = new DBManager();
  $connexion = $dbManager->connect();
  $DomaineManager = new DomaineManager($connexion);

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['total'])) {
      echo json_encode($DomaineManager->total());
    } else {
      if (isset($_GET['id'])) {
        $idToGet = $_GET['id'];
        echo json_encode($DomaineManager->get($idToGet));
      } else echo json_encode($DomaineManager->getAll());
    }



  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $domaineJSON = json_decode(file_get_contents('php://input'), true);
    $domaine = new Domaine();
    $domaine->__set('id',$domaineJSON['id']);
    $domaine->__set('libelle',$domaineJSON['libelle']);
    echo json_encode($DomaineManager->modifier($domaine));

  } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $domaineJSON = json_decode(file_get_contents('php://input'), true);
    $domaine = new Domaine();
    $domaine->__set('id',$domaineJSON['id']);
    $domaine->__set('libelle',$domaineJSON['libelle']);


    echo json_encode($DomaineManager->ajouter($domaine));

  } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idToDelete = $_GET['id'];
    echo $DomaineManager->supprimer($idToDelete);

  }

?>
