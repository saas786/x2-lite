<?php

define( 'x2_VERSION', '1.0' );

/**
 * loads x2 files
 *
 * @package x2
 * @since 1.0
 */
function x2_init() {
	
	require( dirname( __FILE__ ) . '/x2.php' );
	$x2 = new x2;
	
}

add_action( 'after_setup_theme', 'x2_init', 9999 );

?>