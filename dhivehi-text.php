<?php

/*
Plugin Name: Dhivehi Text
Plugin URI: http://wordpress.org/extend/plugins/dhivehi-text/
Description: Adds a button to the WordPress TinyMCE editor for Dhivehi text.
Version: 0.1
Author: Arushad Ahmed (@dash8x)
Author URI: http://arushad.org
Text Domain: dhivehi-text
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Adds stylesheets and scripts to WordPress dashboard
 *
 * @param void
 * @return void
 * @since 0.1
 */
function dhivehi_text_admin_scripts() {
    wp_enqueue_style( 'dhivehi-text' );
}

/**
 * Adds the [dhivehi] shortcode button to TinyMCE
 *
 * @param array $plugin_array
 * @return array
 * @since 0.1
 */
function dhivehi_text_add_buttons( $plugin_array ) {
    $plugin_array['dhivehi_text'] = plugins_url('/js/dhivehi-text-tinymce.js', __FILE__);
    return $plugin_array;
}

/**
 * Registers the [dhivehi] shortcode button with TinyMCE
 *
 * @param array $buttons
 * @return array
 * @since 0.1
 */
function dhivehi_text_register_buttons( $buttons ) {
    array_push( $buttons, 'dhivehi' );
    return $buttons;
}

/**
 * Add styles to the WYSIWYG editor
 *
 * @param void
 * @return void
 * @since  0.1
 */
function dhivehi_text_editor_styles() {
    add_editor_style( plugins_url('/css/dhivehi-text.css', __FILE__) );
}

/**
 * Registers the plugin styles
 *
 * @param void
 * @return void
 * @since  0.1
 */
function dhivehi_text_register_styles() {
    wp_register_style('dhivehi-text', plugins_url('/css/dhivehi-text.css', __FILE__), array(), '0.1', 'all');
}

/**
 * Enqueue the plugin styles
 *
 * @param void
 * @return void
 * @since  0.1
 */
function dhivehi_text_styles() {
    wp_enqueue_style('dhivehi-text');
}

/**
 * Creates the [dhivehi] shortcode
 *
 * @param array $atts The attributes, supports container, class, id
 * @param string $content The content
 * @return string
 * @since  0.1
 */
function dhivehi_text_shortcode($atts, $content=null) {
    $params = shortcode_atts(array(
        'container' => 'span',
        'class' => '',
        'id' => '',
    ), $atts);

    $container = empty($params['container']) ? 'span' : $params['container'];
    $id = empty($params['id']) ? '' : trim($params['id']);

    $class = empty($params['class']) ? '' : trim($params['class']);
    $class .= ($class ? ' ' : '').'dhivehi-text';


    $ret = '<'.$container.' class="'.esc_attr($class).'"';
    $ret .= $id ? ' id="'.$id.'"' : '';
    $ret .= '>';
    $ret .= $content ? $content : '';
    $ret .= '</'.$container.'>';

    return $ret;
}

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions
add_action( 'init', 'dhivehi_text_register_styles' ); //Register styles
add_action( 'wp_enqueue_scripts', 'dhivehi_text_styles' ); // Add plugin stylesheet
add_action( 'admin_enqueue_scripts', 'dhivehi_text_admin_scripts' ); //Admin scripts
add_action( 'init', 'dhivehi_text_editor_styles' ); //Editor styles

//Add Filters
add_filter( 'mce_external_plugins', 'dhivehi_text_add_buttons' ); //Adds button js to TinyMCE
add_filter( 'mce_buttons', 'dhivehi_text_register_buttons' ); //Registers button with TinyMCE

//Add Shortcodes
add_shortcode( 'dhivehi', 'dhivehi_text_shortcode' ); //[dhivehi] shortcode