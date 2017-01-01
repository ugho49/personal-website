<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function sendMessage() {

        $response = $this->checkParams();
        if ($response != null) {
            return $response;
        }

        $mailer = new \PHPMailer();

        //Set who the message is to be sent from
        $mailer->setFrom('contact@ugho-stephan.fr', 'ugho-stephan.fr');
        //Set who the message is to be sent to
        $mailer->addAddress('stephan.ugho@gmail.com', 'Ugho STEPHAN');
        //Set the subject line
        $mailer->Subject = 'Nouveau message ugho-stephan.fr';
        // Set email format to HTML
        $mailer->isHTML(true);
        //convert HTML into a basic plain-text alternative body
        $mailer->Body = View::make('mail.contact-mail', [
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
            'message' => Input::get('message')
        ])->render();
        //DKIM
        $mailer->DKIM_domain = env('DKIM_DOMAIN', '');
        $mailer->DKIM_private = env('DKIM_PRIVATE', '');
        $mailer->DKIM_selector = env('DKIM_SELECTOR', '');
        $mailer->DKIM_passphrase = env('DKIM_PASSPHRASE', '');
        //send the message, check for errors
        if (!$mailer->send()) {
            return Response::json(['error' => true, 'message' => $mailer->ErrorInfo], 500);
        }

        return Response::json(['error' => false, 'message' => 'Message send succesfully !'], 200);
    }

    private function checkParams() {

        if (empty(Input::get('firstname')) || empty(Input::get('lastname')) || empty(Input::get('email')) || empty(Input::get('message'))) {
            return Response::json(['error' => true, 'message' => 'values are missing'], 400);
        }

        // Check recaptcha is not empty
        if (empty(Input::get('recaptcha'))) {
            return Response::json(['error' => true, 'message' => "missing i'm not a robot"], 400);
        }

        // Checks message field contain less or equal 1000 characters
        if(strlen(Input::get('message')) > 1000) {
            return Response::json(['error' => true, 'message' => "the field message is too long"], 400);
        }

        // Check recaptcha is valid
        if(!$this->isRecaptchaValid(Input::get('recaptcha'))) {
            return Response::json(['error' => true, 'message' => "unauthorized : field not a robot not good"], 403);
        }

        return null;
    }

    private function isRecaptchaValid($recaptcha_response) {
        if (empty($recaptcha_response)) {
            return false; // Si aucune reponse n'est entré, on ne cherche pas plus loin
        }
        
        $info_recaptcha_secret = Information::where('key', InformationController::recaptcha_secret)->first();

        $params = [
            'secret'    => $info_recaptcha_secret->value,
            'response'  => $recaptcha_response
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
}
