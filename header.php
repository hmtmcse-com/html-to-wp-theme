<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-100">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMTMCSE Blog</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(["d-flex flex-column h-100"]); ?>>
<?php wp_body_open(); ?>

<div class="container">

    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-6">
                <a class="blog-header-logo text-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <div class="row">
                    <div class="12">
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-search"></i></div>
                                <input type="text" class="form-control" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light py-1 mb-2 blog-header">
        <div class="collapse navbar-collapse">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-main-menu',
                    'menu_id' => 'main-menu',
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'container' => false,
                    'fallback_cb'    => '__return_false',
                    'walker' => new Bootstrap_Menu_Walker()
                )
            );
            ?>
        </div>
    </nav>
</div>