<?php
/*
Plugin Name:  Select Image
Plugin URI:   https://cool.wordpress.org/plugins/select-image/
Description:  Select images from Amazon
Version:      3.14
Author:       Cool
Author URI:   https://cool.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  select-image
Domain Path:  /languages/
*/

function select_setup_post_type() {
    // register the "book" custom post type
    register_post_type( 'book', ['public' => 'true'] );
}

function select_install() {
    // trigger our function that registers the custom post type
    select_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'select_install' );


function select_deactivation() {
    // unregister the post type, so the rules are no longer in memory
    unregister_post_type( 'book' );
    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'select_deactivation' );


// register_uninstall_hook(__FILE__, 'pluginprefix_function_to_run');

