<?php

require get_template_directory() . "/inc/bootstrap-menu-walker.php";

if (!defined('THEME_VERSION')) {
    define('THEME_VERSION', '1.0.0');
}

function get_assets_path($file, $directory = "css"){
    return get_template_directory_uri() . "/assets/$directory/$file";
}

function h2wp_include_css_js() {
    wp_enqueue_style( 'h2wp-bootstrap', get_assets_path("bootstrap.min.css"), [], THEME_VERSION );
    wp_enqueue_style( 'h2wp-font-awesome', get_assets_path("font-awesome.min.css"), [], THEME_VERSION );
    wp_enqueue_style( 'h2wp-theme', get_assets_path("theme.css"), [], THEME_VERSION );

    wp_enqueue_script( 'h2wp-js-bootstrap', get_assets_path("bootstrap.bundle.min", "js"), ["jquery"], THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'h2wp_include_css_js' );



if ( ! function_exists( 'h2wp_theme_setup' ) ) :
    function h2wp_theme_setup() {
        register_nav_menus(
            array(
                'top-main-menu' => esc_html__( 'Main menu', 'h2wp' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'h2wp_theme_setup' );
