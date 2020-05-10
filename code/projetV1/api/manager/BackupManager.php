<?php
include('Dumper/dumper.php');

class BackupManager{
  private $connexion;

  function __construct($db) {
    $this->connexion = $db;
  }

  function createBackup() {
    // Permet d'avoir l'heure sur l'UTC de Bruxelles
    date_default_timezone_set('Europe/Brussels');
    $toDay = date('d-m-Y-H-i');

    // Sauvegarde la date dans le fichier de logs
    file_put_contents('../backupDB/logs.txt', $toDay, FILE_TEXT | LOCK_EX);

    // chemin vers le fichiers
    $file = "../backupDB/backupRQS-".$toDay.".sql";

    $backupReussi = false;

    // Export de la base de données
    // Utilisation d'un script php externe
    try {
      $rqs_dumper = Shuttle_Dumper::create(array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '', //'1234',
        'db_name' => 'rqs'
      ));

      $rqs_dumper->dump($file);
    // Utilisation d'un script php externe
      if(file_exists($file)){
        header('Content-description: File Transfer');
        header('Expires: 0');
        header('Cache-control: must-revalidate');
        header('Pragma: public');
        header('Content-length: ' . filesize($file));
        header('Content-disposition: attachment; filename='.$file.'');

      }

    } catch(Shuttle_Exception $e) {
      echo "Échec de l'export : " . $e->getMessage();
    }
    return "../backupDB/backupRQS-".$toDay.".sql";
  }

  function getDateLastBackup(){
    $line = '';

    $f = fopen('../backupDB/logs.txt', 'r');
    $cursor = -1;

    fseek($f, $cursor, SEEK_END);
    $char = fgetc($f);

    /**
     * Trim trailing newline chars of the file
     */
    while ($char === "\n" || $char === "\r") {
        fseek($f, $cursor--, SEEK_END);
        $char = fgetc($f);
    }

    /**
     * Read until the start of file or first newline char
     */
    while ($char !== false && $char !== "\n" && $char !== "\r") {
        /**
         * Prepend the new char
         */
        $line = $char . $line;
        fseek($f, $cursor--, SEEK_END);
        $char = fgetc($f);
    }

    return $line;
  }
}
