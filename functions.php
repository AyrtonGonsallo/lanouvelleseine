<?php


// ensure EXT is defined

if ( ! defined( 'EXT' ) ) {

	define( 'EXT', '.php' );

}



#

# See: wpgrade-config.php -> include-paths for additional theme specific

# function and class includes

#



// ensure REQUEST_PROTOCOL is defined

if ( ! defined('REQUEST_PROTOCOL')) {

	if (is_ssl()) {

		define( 'REQUEST_PROTOCOL', 'https:' );

	} else {

		define( 'REQUEST_PROTOCOL', 'http:' );

	}

}



// Theme specific settings

// -----------------------



// add theme support for post formats

// child themes note: use the after_setup_theme hook with a callback

// right now no post formats

//$formats = array( 'video', 'audio', 'gallery', 'image', 'quote', 'link', 'chat', 'aside', );

//add_theme_support( 'post-formats', $formats );



// Initialize system core

// ----------------------



require_once 'wpgrade-core/bootstrap' . EXT;



#

# Please perform any initialization via options in wpgrade-config and

# calls in wpgrade-core/bootstrap. Required for testing.

#

function jquery_cdn() {
	
	   wp_deregister_script('jquery');
	   wp_deregister_script('jquery-migrate');
	   wp_deregister_script('bootstrap-datepicker');
	   wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js', false, '1.12.4');
	   wp_register_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-1.4.1.min.js', false, '1.4.1');
	   wp_register_script('bootstrap-datepicker', 'https://lanouvelleseine.com/wp-content/plugins/the-events-calendar/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js', false, '1.12.4');
	   wp_enqueue_script('jquery');
	   wp_enqueue_script('jquery-migrate');
	   wp_enqueue_script('bootstrap-datepicker');
  }
 add_action('init', 'jquery_cdn');