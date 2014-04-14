<?php
/*
Plugin Name: Bootcodes
Plugin URI: https://github.com/patrickshampine/bootcodes
Description: The plugin adds a shortcodes for Bootstrap 3 grid elements.
Version: 0.1
Author: Patrick Shampine
Author URI: http://patrickshampine.com
*/

// Cleans up the wp wysishit.
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

class bootCodes {
  
  function __construct() {
    add_action( 'init', array( $this, 'createShortcodes' ) );
  }

  function createShortcodes() {
    add_shortcode('row', array( $this, 'row' ));
    add_shortcode('col', array( $this, 'col' ));
  }

  function row( $atts, $content = null ) {
    return '<div class="row">' . do_shortcode( $content ) . '</div>';
  }

  function col( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "col" => 'col'
    ), $atts));
    return '<div class="col-' . $col . '">' . do_shortcode( $content ) . '</div>';
  }

}

new bootCodes()
