<?php
/**
 * BanglaPress News Theme Functions
 */

// Theme setup
function banglapress_setup() {
    // Enable featured images
    add_theme_support('post-thumbnails');

    // Add title tag support
    add_theme_support('title-tag');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'banglapress'),
    ));

    // Add HTML5 markup support
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'banglapress_setup');

// Load CSS and JS
function banglapress_scripts() {
    // Main stylesheet
    wp_enqueue_style('banglapress-style', get_stylesheet_uri());

    // Responsive CSS
    wp_enqueue_style('banglapress-responsive', get_template_directory_uri() . '/responsive.css', array('banglapress-style'), '1.0');

    // JavaScript
    wp_enqueue_script('banglapress-script', get_template_directory_uri() . '/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'banglapress_scripts');

// Register Sidebar
function banglapress_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'banglapress'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'banglapress_widgets_init');
