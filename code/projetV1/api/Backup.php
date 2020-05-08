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

    $file = $backupManager->createBackup();
    if(file_exists($file)){
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($file).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      readfile($file);
      exit;
    }

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo json_encode($backupManager->getDateLastBackup());
}
