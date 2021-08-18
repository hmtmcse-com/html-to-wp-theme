<?php get_header() ?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part("template-parts/content", "archive");
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
</div>


<?php get_footer() ?>