<?php

require get_template_directory() . "/inc/bootstrap-menu-walker.php";
require get_template_directory() . "/inc/featured-large-post.php";

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
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
    }
endif;
add_action( 'after_setup_theme', 'h2wp_theme_setup' );

function read_more_excerpt($excerpt) {
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter( 'excerpt_more', 'read_more_excerpt' );



function h2wp_right_sidebar() {
    register_sidebar(
        array(
            'id'            => 'h2wp-right-sidebar',
            'name'          => __( 'Right Sidebar' ),
            'description'   => __( 'On theme right the sidebar will show' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'h2wp-large-featured-post',
            'name'          => __( 'Large Featured Post' ),
            'description'   => __( 'Single Large Featured Post' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'h2wp_right_sidebar');

function h2wp_featured_post_type() {
    register_post_type('h2wp-featured-post',
        array(
            'labels'      => array(
                'name'          => __( 'Featured Post', 'h2wp' ),
                'singular_name' => __( 'Featured Posts', 'h2wp' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'featured-post' ),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'h2wp_featured_post_type');
add_post_type_support( 'h2wp-featured-post', 'thumbnail' );