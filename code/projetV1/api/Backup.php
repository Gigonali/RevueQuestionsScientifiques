<?php
require_once('./manager/DBManager.php');
require_once('./manager/BackupManager.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');

$dbManager = new DBManager();
$connexion = $dbManager->connect();
$backupManager = new BackupManager($connexion);

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if (isset($_GET['date'])) {
      echo json_encode($backupManager->getDateLastBackup());
    } else {
      echo json_encode($backupManager->createBackup());

    }

} else if($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo 'not implemented';
}
