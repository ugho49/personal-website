<?php
include '../src/App.php';
App::getSession();
$lang = App::getLang();

/**
* Vérifications params
*/
if (empty($_POST['recaptcha'])) {
    $obj = array('status' => 'warning', 'libelle' => $lang->formMessageNotARobot);
    die(json_encode($obj));
} else {
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])) {
        $obj = array('status' => 'warning', 'libelle' => $lang->formMessageFieldsMissing);
        die(json_encode($obj));
    }
    else {
        if(isValid($_POST['recaptcha'])) {
            sendMail($_POST['prenom'], $_POST['nom'], $_POST['email'], htmlspecialchars($_POST['message']));
            $obj = array('status' => 'success', 'libelle' => $lang->formMessageSuccess);
            die(json_encode($obj));
        } else {
            $obj = array('status' => 'danger', 'libelle' => $lang->formMessageRobotNotGood);
            die(json_encode($obj));
        }
    }
}

/**
* Functions
*/
function isValid($code)
{
    if (empty($code)) {
        return false; // Si aucun code n'est entré, on ne cherche pas plus loin
    }

    include_once '../src/App.php';
    $app = new App();

    $params = [
        'secret'    => $app->getInformations()['recaptcha_secret'],
        'response'  => $code
    ];

    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Evite les problèmes, si le ser
        $response = curl_exec($curl);
    } else {
        // Si curl n'est pas dispo, un bon vieux file_get_contents
        $response = file_get_contents($url);
    }

    if (empty($response) || is_null($response)) {
        return false;
    }

    $json = json_decode($response);
    return $json->success;
}

function sendMail($prenom, $nom, $email, $message){
	/* Destinataire */
	$to = "stephan.ugho@gmail.com";

	/* Sujet du message */
	$sujet = "Nouveau message ugho-stephan.fr";

	/* Construction du message */
	$msg .= ucfirst(strtolower($prenom)).' '.strtoupper($nom).' ('.$email.') vous à envoyé un message :'."\r\n\r\n";
	$msg .= '************************'."\r\n\r\n";
	$msg .= $message ."\r\n\r\n";
    $msg .= '************************'."\r\n\r\n";
    $msg .= 'Ce mail a été envoyé de façon automatique'."\r\n\r\n";

	/* En-têtes de l'e-mail */
	$headers = 'From: ugho-stephan.fr <contact@ugho-stephan.fr>'."\r\n\r\n";

	/* Envoi de l'e-mail */
	mail($to, $sujet, $msg, $headers);
}
?>