<?php
/**
 * @package ulr
 */
/*
Plugin Name: Oliver Sänger
Plugin URI: http://www.oliver-saenger.de
Description: PLugin to restrict content to users
Version: 0.1
Author: Oliver Sänger
Author URI: https://github.com/doctordebug/wordpressLoginRestriction
License: GPLv2 or later
Text Domain: ulr
*/


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'ULR_VERSION', '0.1' );
define( 'ULR_MINIMUM_WP_VERSION', '0.1' );
define( 'ULR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ULR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ULR_DELETE_LIMIT', 100000 );

require_once( ULR_PLUGIN_DIR . '/classes/UserLoginRestriction.class.php' );

add_action( 'init', array( 'UserLoginRestriction', 'init' ) );

if ( is_admin() ) {
	require_once( ULR_PLUGIN_DIR . '/classes/UserLoginRestrictionAdmin.class.php' );
	add_action( 'init', array( 'UserLoginRestrictionAdmin', 'init' ) );
}



