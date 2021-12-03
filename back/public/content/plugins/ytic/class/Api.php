<?php

namespace Ytic;

use WP_REST_Request;

class Api
{

    /**
     * @var string
     */
    protected $baseURI;

    public function __construct()
    {
        // STEP API enregistrement de notre api custom
        add_action('rest_api_init', [$this, 'initialize']);

    }

    public function initialize()
    {
        // DOC PHP récupération du nom d'un dossier depuis un chemain de fichier https://www.php.net/dirname
        $this->baseURI = dirname($_SERVER['SCRIPT_NAME']);


        // STEP WP création d'une route d'API
        // DOC WP création d'une route d'API https://developer.wordpress.org/reference/functions/register_rest_route/
        register_rest_route(
            'ytic/v1', // le nom de notre API
            '/mail', // la route qui se mettra après le nom de notre api
            [
                // WARNING WP route api "methods" avec un S !
                'methods' => 'post',
                'callback' => [$this, 'sendmail'],
                'permission_callback' => '__return_true'
            ],
        );

    }

    public function sendMail(WP_REST_Request $request){

        $name = $request->get_param('name');
        $mail = $request->get_param('mail');
        $content = $request->get_param('content');

        $message = 'Nouveau message de : ' . $name . "<br> Contact : " . $mail . "<br> Message : '<br>" . $content;


        $to = 'sara.ytic.officiel@gmail.com';
        $subject = 'Nouveau message de Ytic Blogz';
        $headers[] = 'From: Ytic<wordpress@ytic.com>';

        $mailResult = false;

        $mailResult = wp_mail($to, $subject, $message, $headers);

        if($mailResult){
            return "Votre message a bien été envoyé :)";
        }

        return "Une erreur est survenue :( veuillez réessayer plus tard";
    }
}