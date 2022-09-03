<?php
namespace Ytic;

class Plugin
{

    public function __construct() {


        add_action(
            'init',
            [$this, 'createProjectPostType']
        );

        add_action(
            'init',
            [$this, 'createCollaborationPostType']
        );


        add_action(
            'init',
            [$this, 'createMusicPostType']
        );

        add_action(
            'init',
            [$this, 'createPortfolio']
        );

        add_action(
            'init',
            [$this, 'createMusicTypeCustomTaxonomie']
        );

    }

    public function activate()
    {
        wp_insert_term('Reprise', 'music-type');

        wp_insert_term('Chanson originale', 'music-type');

    }


    public function deactivate()
    {

    }


    public function createProjectPostType()
    {
        register_post_type(
            'project',
            [
                'label' => 'Projets',
                'labels' => [
                    'name' => 'Projets',
                    'singular_name' => 'projet',
                    'add_new_item' => 'Ajouter un projet',
                    'new_item' => 'Nom du projet',
                    'all_items' => 'Tous les projets',
                    'featured_image' => 'Image principale du projet',
                    'not_found' => 'Aucun projet enregistré'
                ],
                'has_archive' => true,
                'public' => true,
                'menu_position' => 3,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-art',
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'author',
                    'custom-fields'
                ],
                'map_meta_cap' => true,

                // IMPORTANT WP le cpt recipe est accessible depuis l'api wordpress
                'show_in_rest' => true
            ]
        );
    }

    public function createCollaborationPostType()
    {
        register_post_type(
            'collaboration',
            [
                'label' => 'Collaborations',
                'labels' => [
                    'name' => 'Collaborations',
                    'singular_name' => 'collaboration',
                    'add_new_item' => 'Ajouter une collaboration',
                    'new_item' => 'Nom de la collaboration',
                    'all_items' => 'Toutes les collaborations',
                    'featured_image' => 'Image principale de la collaboration',
                    'not_found' => 'Aucune collaboration enregistrée'
                ],
                'has_archive' => true,
                'public' => true,
                'menu_position' => 3,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-groups',
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'author',
                    'custom-fields'
                ],
                'map_meta_cap' => true,

                // IMPORTANT WP le cpt recipe est accessible depuis l'api wordpress
                'show_in_rest' => true
            ]
        );
    }


    public function createMusicPostType()
    {
        register_post_type(
            'music',
            [
                'label' => 'Musiques',
                'labels' => [
                    'name' => 'Musiques',
                    'singular_name' => 'musique',
                    'add_new_item' => 'Ajouter une musique',
                    'new_item' => 'Nom de la musique',
                    'all_items' => 'Toutes les musiques',
                    'featured_image' => 'Pochette de l\'album',
                    'not_found' => 'Aucune musique enregistrée'
                ],
                'has_archive' => true,
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-media-audio',
                'menu_position' => 3,
                'supports' => [
                    'title',
                    'thumbnail',
                    'custom-fields'
                ],
                'map_meta_cap' => true,

                // IMPORTANT WP le cpt recipe est accessible depuis l'api wordpress
                'show_in_rest' => true
            ]
        );
    }

    public function createPortfolio()
    {
        register_post_type(
            'portfolio',
            [
                'label' => 'Portfolio',
                'labels' => [
                    'name' => 'Portfolio',
                    'not_found' => 'Aucun portfolio'
                ],
                'menu_position' => 3,
                'public' => true,
                'menu_icon' => 'dashicons-portfolio',
                'map_meta_cap' => true,
                // IMPORTANT WP le cpt recipe est accessible depuis l'api wordpress
                'show_in_rest' => true
            ]
        );
    }

    public function createMusicTypeCustomTaxonomie()
    {
        register_taxonomy(
            // identifiant de la taxonomy
            'music-type',
            // la taxonomy 'technology" est application sur le cpt "music"
            ['music'],
            // tableau d'options
            [
                'label' => 'Type de musique',
                'hierarchical' => true,
                'public' => true,
                'show_in_rest' => true
            ]
        );
    }

}
