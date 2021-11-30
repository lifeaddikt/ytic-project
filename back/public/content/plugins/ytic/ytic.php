<?php

/**
 * Plugin Name: Ytic Administrator
 * Author: lifeaddikt
 * Description: Plugin qui configure ton backoffice
 */

use Ytic\Plugin;
use Ytic\Api;

require __DIR__ . '/vendor-ocooking/autoload.php';

$ytic = new Plugin();

register_activation_hook(
   __FILE__,
   [$ytic, 'activate']
);


register_deactivation_hook(
   __FILE__,
   [$ytic, 'deactivate']
);

$api = new Api();


