<?php get_header() ?>
<main class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part("template-parts/content");
                endwhile;
            endif;
            ?>
        </div>
        <div class="col-md-2">
            <div id="right-sidebar" class="sidebar">
                <?php dynamic_sidebar( 'h2wp-right-sidebar' ); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>

