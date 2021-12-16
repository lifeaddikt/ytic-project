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

    // Add filter to respond with next and previous post in post response.
    add_filter('rest_prepare_project', [$this, 'getNextAndPrevious'], 10, 2 );

    // STEP API enregistrement de notre api custom
    add_action('rest_api_init', [$this, 'initialize']);

    add_filter( 'wp_mail_content_type',[$this, 'wpse27856_set_content_type']);

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

    public function getNextAndPrevious($response, $post){

        global $post;
        // Get the so-called next post.
        $next = get_adjacent_post( false, '', false );
        // Get the so-called previous post.
        $previous = get_adjacent_post( false, '', true );
        // Format them a bit and only send id and slug (or null, if there is no next/previous post).
        $response->data['next'] = ( is_a( $next, 'WP_Post') ) ? array( "id" => $next->ID, "slug" => $next->post_name ) : null;
        $response->data['previous'] = ( is_a( $previous, 'WP_Post') ) ? array( "id" => $previous->ID, "slug" => $previous->post_name ) : null;

    return $response;
}

    public function wpse27856_set_content_type(){
        return "text/html";
    }

    public function sendMail(WP_REST_Request $request){

        $name = $request->get_param('name');
        $mail = $request->get_param('mail');
        $content = $request->get_param('content');

        $message = 'Nouveau message de : ' . $name . "<br> Contact : " . $mail . "<br> Message : <br>'" . $content . "'";


        $to = 'sara.ytic.officiel@gmail.com';
        $subject = 'Nouveau message!!!';
        $headers[] = 'From: Site internet Ytic <wordpress@ytic.com>';

        $mailResult = false;

        $mailResult = wp_mail($to, $subject, $message, $headers);

        if($mailResult){
            return "Votre message a bien été envoyé :)";
        }

        return "Une erreur est survenue :( veuillez réessayer plus tard";
    }

}