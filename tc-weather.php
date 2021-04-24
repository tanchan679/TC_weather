<?php
/*
Plugin Name: tc-Weather
Plugin URI: https://fb.com/tanchan679
Description: blugin by tanchan679
Version: 1.0.0
Author: tanchan679
Author URI: https://fb.com/tanchan679
License: GPLv2 or later
Text Domain: akismet
*/
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
	define( 'TC_WEATHER_VERSION', '1.0.0' );
	define( 'TC_WEATHER_MININUM_WP_VERSION', '4.1.0' );
	define( 'TC_WEATHER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	define( 'TC_WEATHER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	require_once TC_WEATHER_PLUGIN_DIR . "include/TC_WidgetWeather.php";
	new TC_WidgetWeather();
	require_once TC_WEATHER_PLUGIN_DIR . "include/TC_Wather_Setting.php";
	new TC_Wather_Setting();


?>

