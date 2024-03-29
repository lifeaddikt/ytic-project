<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */
/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', false );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp/wp-blog-header.php';

// wp_redirect( 'https://back.saraytic.fr/wp/wp-admin' );
// exit;
