<?php
require_once('./manager/DBManager.php');
require_once('./manager/AuthentificationManager.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

$dbManager = new DBManager();
$connexion = $dbManager->connect();
$authManager = new AuthentificationManager($connexion);

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo 'Not implemented yet';

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $authentifiantJSON = json_decode(file_get_contents('php://input'), true);
    print_r($authentifiantJSON);
      $answer=$authManager->connecter($authentifiantJSON['mailCo'],$authentifiantJSON['mdp']);
    if (is_array($answer) && password_verify($authentifiantJSON['mdp'],$answer['hashMdp'])) {  //mail et mot de passe correspondent à un User
        switch ($authManager->getPermission($answer['id'])) {
          case 'GESTIONNAIRE':
            echo "1";
            break;
          case 'ADMINISTRATEUR':
            echo "2";
            break;
          default:
            if($authManager->isAuteur($answer['id'])){
              echo "3";
            }
          break;
        }
    } else {
      return $answer;
    }

  /* $authentifiantJSON = json_decode(file_get_contents('php://input'), true);

  echo json_encode($authManager->connecter($authentifiantJSON['mailCo'],
                   $authentifiantJSON['mdp'])); */

} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  echo 'Not implemented yet';

} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  echo 'Not implemented yet';
}
