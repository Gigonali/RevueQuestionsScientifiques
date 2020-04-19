<?php
require_once('./manager/DBManager.php');
require_once('./manager/ReinitialisationManager.php');
require_once('./manager/MailManager.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');


$dbManager = new DBManager();
$connexion = $dbManager->connect();
$reinitManager = new ReinitialisationManager($connexion);
$mailManager = new MailManager();
$json = json_decode(file_get_contents('php://input'), true);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($json['email']) && !isset($json['code'])){//DEBUT PROCEDURE DE REINIT DE CODE = ENVOI DE MAIL ET ELABORATION D'UN CODE
    $answer = $reinitManager->verifEmail($json['email']);
    if($answer){
        $code = md5(rand());
        $reinitManager->initCode($json['email'], $code);
        
        //MAIL
        $msg = 'Pour reinitialiser votre mot de passe, suivez le lien suivant: <a href="http://localhost:4200/reinitialisation/'.$json['email'].'/'.$code.'">lien</a>, <br> Si vous n\'êtes pas concerné, ignorez ce mail';
        $mailManager->envoyerEmail($json['email'],$msg,'Reinitialisation de votre mot de passe | RQSEdition');
    }
    echo $answer;
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($json['code']) && isset($json['email'])){ //VERIF D'IDENTITE GRACE AU CODE
    echo $reinitManager->verifCode($json['email'],$json['code']);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($json['mailCo']) && isset($json['mdp'])){ // CHANGEMENT DE MDP
    $reinitManager->modifierMdp($json['mailCo'],password_hash($json['mdp'],PASSWORD_BCRYPT,['cost' => 10]));
}