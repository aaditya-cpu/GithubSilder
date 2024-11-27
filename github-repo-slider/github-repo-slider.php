<?php
/**
 * Plugin Name: GitHub Repo Slider
 * Description: A plugin to display GitHub repositories in a responsive, claymorphic slider.
 * Version: 1.1
 * Author: Aaditya Goenka
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

    // Include modal styling and JS
    wp_enqueue_style('github-repo-modal-css', GITHUB_REPO_SLIDER_URL . 'public/modal.css');
    wp_enqueue_script('github-repo-modal-js', GITHUB_REPO_SLIDER_URL . 'public/modal.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'github_repo_slider_enqueue_assets');

// Enqueue admin styles and scripts
function github_repo_slider_enqueue_admin_assets() {
    wp_enqueue_style('github-repo-slider-admin-css', GITHUB_REPO_SLIDER_URL . 'admin/admin.css');
}
add_action('admin_enqueue_scripts', 'github_repo_slider_enqueue_admin_assets');

// Register slider shortcode
function github_repo_slider_shortcode() {
    ob_start();
    include GITHUB_REPO_SLIDER_PATH . 'public/templates/slider-template.php';
    return ob_get_clean();
}
add_shortcode('github_repo_slider', 'github_repo_slider_shortcode');

// Register modal shortcode
function github_repo_slider_modal_shortcode() {
    ob_start();
    include GITHUB_REPO_SLIDER_PATH . 'public/templates/modal-template.php';
    return ob_get_clean();
}
add_shortcode('github_repo_modal', 'github_repo_slider_modal_shortcode');

