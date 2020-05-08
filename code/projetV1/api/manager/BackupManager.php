<?php
class BackupManager{
  private $connexion;

  function __construct($db) {
    $this->connexion = $db;
  }

  function createBackup(){

    $toDay = date('d-m-Y-H-i');
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '1234';
    $dbname = 'rqs';

    file_put_contents('logs.txt', $toDay, FILE_APPEND | LOCK_EX);
    exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname -r > ".$toDay.".sql");
    return $toDay.".sql";
  }

  function getDateLastBackup(){
    $line = '';

    $f = fopen('logs.txt', 'r');
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

    return str_replace("-","a",$line);
  }
}
