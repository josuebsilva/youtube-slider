<?php
/**
 * Youtube Video Slider
 *
 * @package   YVSlider
 * @copyright Copyright (C) 2018, Infinity Lab - infinitylab.io
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Youtube Video Slider
 * Version:     1.0
 * Plugin URI:  https://infinitylab.io
 * Description: Add vídeo of youtube in your site on slider style.
 * Author:      Josué Barbosa
 * Author URI:  https://josuebarbosa.com
 * Text Domain: youtube-video-slider
 * License:     GPL v3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function create_posttype() {
 
    register_post_type( 'youtubeslider',
        array(
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'youtubeslider'),
            "supports" => array( "title", "revisions", "thumbnail", 'custom-fields' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function youtube_slider_admin_page(){
    require_once(dirname(__FILE__).'/pages/plugin-page.php');
}

function my_admin_menu() {
	add_menu_page( 'Youtube Slider', 'Youtube Video Slider', 'manage_options', 'youtube-slider/index.php', 'youtube_slider_admin_page', 'dashicons-video-alt3', 6  );
}
add_action( 'admin_menu', 'my_admin_menu' );

// Example 1 : WP Shortcode to display form on any page or post.
function showSlider(){
    require_once(dirname(__FILE__).'/slider/slider.php');
}
add_shortcode('youtubeslider', 'showSlider');


function load_scripts(){
    wp_register_script('youtube-slider-script', plugins_url('youtube-slider/script/main.js'), null);
    wp_register_style('youtube-slider-style', plugins_url('youtube-slider/style/style.css'));
}

// Register style sheet.
add_action('wp_enqueue_scripts', 'load_scripts');

