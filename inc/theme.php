<?php

declare(strict_types=1);

// Menus
add_theme_support('menus');

// Page title
add_theme_support('title-tag');

// Illustrations
add_theme_support('post-thumbnails');

// Image sizes
add_image_size('member-card', 150, 150, true);

// Cleaning
add_action('after_setup_theme', function () {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    add_action('wp_enqueue_scripts', function () {
        wp_dequeue_style('classic-theme-styles');
    });
});