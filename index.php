<?php

/*
Plugin Name: Shortcodes In Titles
Description: Give you the ability to use shortcodes in your titles without the hassle.
Version: 1.0
Author: Ion Alexandru
Author URI: http://www.xero.ro
*/

//remove the shortcode tag leaving the content between the tag intact
function clear_shortcode($title){
    return preg_replace('/\[\/?.*?\]/i','',$title);
}
add_filter('sanitize_title', 'clear_shortcode',1);
add_filter('wp_title', 'clear_shortcode',100);
add_filter('the_title', 'clear_shortcode');

//new functions to show the post title
//one of this functions must be used to show the title with the shortcode applied
function sc_title(){
    echo get_sc_title();
}
function get_sc_title(){
    $title = do_shortcode(get_post()->post_title);
    return apply_filters( 'the_title', $title );
}
?>