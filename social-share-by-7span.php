<?php
/*
 * Plugin Name: Social Connect By 7Span
 * Plugin URI:  https://wordpress.org/plugins/social-share-by-7span/
 * Version: 1.3.6
 * Stable Tag: trunk
 * Description: Adds very attractive responsive social icons on your website.
 * Author: 7Span
 * Author URI: https://7span.com
 */

$sources = [ 'Facebook' => 'fb','Instagram' => 'insta', 'Twitter' => 'twt', 'Linkedin' => 'linkdin', 'Reddit' => 'reddit', 'Youtube' => 'youtube'];
 
/*
* Define
*/
define('SS7S_VERSION', '1.0');
define('SS7S_DIR', plugin_dir_path(__FILE__));
defined('SS7S_PATH') or define('SS7S_PATH', untrailingslashit(plugins_url('', __FILE__)));

require_once(SS7S_DIR . 'includes/core.php');
require_once(SS7S_DIR . 'includes/embed.php');
require_once(SS7S_DIR . 'assets/widget/widget_social_connect.php');

/**
 * load style
 */
add_action('wp_enqueue_scripts', 'ss7s_callback_for_setting_up_styles');
function ss7s_callback_for_setting_up_styles() {
    wp_register_style( 'ss7s-social-share-style', SS7S_PATH . '/assets/css/social-share-style.css' );
    wp_enqueue_style( 'ss7s-social-share-style' );  
    
    wp_register_style( 'ss7s-social-follow-style', SS7S_PATH . '/assets/css/social-follow-style.css' );
    wp_enqueue_style( 'ss7s-social-follow-style' );    
}
?>