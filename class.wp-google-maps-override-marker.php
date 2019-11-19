<?php
/*
Plugin Name: WP Google Maps - Override Marker
Version: 1.0
Plugin Author: Code Cabin - Perry Rylance
Description: This plugin shows how to externally override WP Google Maps built in marker class, in this example, we show how to modify the markers description
*/

add_action('init', function() {
	require_once(plugin_dir_path(__FILE__) . 'class.custom-marker.php');
});
