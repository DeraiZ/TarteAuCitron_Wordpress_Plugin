<?php

/**
 * Plugin Name: Cookie
 * Description: Plugins Basé avec Tarte_aux_citron
 * Author: Moa
 * Version: 0.0.1
 */

function add_tarte_aux_citron_script()
{
	wp_enqueue_scripts('tarteaucitron', '/asset/js/tarteaucitron.js');
}

add_action('wp_enqueue_scripts', 'add_tarte_aux_citron_script');