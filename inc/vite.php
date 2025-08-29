<?php

declare(strict_types=1);

define('VITE_THEME_ASSETS_DIR', get_template_directory_uri() . '/dist');
define('VITE_THEME_MANIFEST_PATH', get_template_directory() . '/dist/.vite/manifest.json');
define('VITE_THEME_DEV_SERVER', 'http://localhost:5173');
define('VITE_THEME_DEV_DIR', 'wp-content/themes/' . basename(get_template_directory()));
define('VITE_THEME_DEV_ASSETS_DIR', VITE_THEME_DEV_DIR . '/resources');
define('VITE_THEME_DEV_CLIENT_PATH', VITE_THEME_DEV_SERVER . '/' . VITE_THEME_DEV_DIR . '/@vite/client');
define('VITE_THEME_DEV_SCRIPTS_PATH', VITE_THEME_DEV_SERVER . '/' . VITE_THEME_DEV_ASSETS_DIR . '/scripts/scripts.js');
define('VITE_THEME_DEV_STYLES_PATH', VITE_THEME_DEV_SERVER . '/' . VITE_THEME_DEV_ASSETS_DIR . '/styles/styles.css');

if (file_exists(VITE_THEME_MANIFEST_PATH)) {
    add_action('wp_enqueue_scripts', 'enqueueProdAssets');
    add_action('admin_enqueue_scripts', 'enqueueProdAssets');
} else {
    add_action('wp_enqueue_scripts', function () {
        function vite_head_module_hook()
        {
            echo '<script type="module" crossorigin src="' . VITE_THEME_DEV_SCRIPTS_PATH . '"></script>';
            echo '<script type="module" crossorigin src="' . VITE_THEME_DEV_CLIENT_PATH . '"></script>';
        }
        add_action('wp_head', 'vite_head_module_hook');
        wp_enqueue_style('theme-styles', VITE_THEME_DEV_STYLES_PATH, [], null);
    });
    add_action('admin_enqueue_scripts', function () {
        wp_enqueue_style('theme-styles', VITE_THEME_DEV_STYLES_PATH, [], null);
    });
}

function enqueueProdAssets()
{
    $manifest = json_decode(file_get_contents(VITE_THEME_MANIFEST_PATH), true);
    $themeVersion = wp_get_theme()->get('Version');
    if (is_array($manifest)) {
        foreach ($manifest as $key => $value) {
            $file = $value['file'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext === 'css') {
                wp_enqueue_style($key, VITE_THEME_ASSETS_DIR . '/' . $file, [], $themeVersion);
            } elseif ($ext === 'js') {
                wp_enqueue_script($key, VITE_THEME_ASSETS_DIR . '/' . $file, [], $themeVersion, true);
            }
        }
    }
}
