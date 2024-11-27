<?php
/**
 * Plugin Name: GitHub Repo Slider
 * Description: A plugin to display GitHub repositories in a responsive, claymorphic slider.
 * Version: 1.1
 * Author: Your Name
 * Author URI: https://Goenka.xyz
 * Plugin URI: https://Goenka.xyz
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define plugin paths
define('GITHUB_REPO_SLIDER_PATH', plugin_dir_path(__FILE__));
define('GITHUB_REPO_SLIDER_URL', plugin_dir_url(__FILE__));

// Include admin and public files
include_once GITHUB_REPO_SLIDER_PATH . 'admin/admin-page.php';

// Enqueue scripts and styles
function github_repo_slider_enqueue_assets() {
    wp_enqueue_style('github-repo-slider-css', GITHUB_REPO_SLIDER_URL . 'public/slider.css');
    wp_enqueue_script('github-repo-slider-js', GITHUB_REPO_SLIDER_URL . 'public/slider.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'github_repo_slider_enqueue_assets');

// Enqueue admin styles
function github_repo_slider_enqueue_admin_assets() {
    wp_enqueue_style('github-repo-slider-admin-css', GITHUB_REPO_SLIDER_URL . 'admin/admin.css');
}
add_action('admin_enqueue_scripts', 'github_repo_slider_enqueue_admin_assets');

// Register shortcode
function github_repo_slider_shortcode() {
    ob_start();
    include GITHUB_REPO_SLIDER_PATH . 'public/templates/slider-template.php';
    return ob_get_clean();
}
add_shortcode('github_repo_slider', 'github_repo_slider_shortcode');

// Add plugin footer credit in the admin panel
function github_repo_slider_footer_credit() {
    echo '<p style="text-align:center; margin-top:20px; font-size:0.9em;">GitHub Repo Slider Plugin by <a href="https://Goenka.xyz" target="_blank">Goenka.xyz</a></p>';
}
add_action('admin_footer', 'github_repo_slider_footer_credit');
