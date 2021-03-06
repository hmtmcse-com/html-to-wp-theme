<?php get_header() ?>

<main class="container">

    <?php if (is_search()): ?>
        <h1>Search Results</h1>
    <?php endif; ?>

    <div class="row">
        <div class="col-10">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part("template-parts/content", "thumb");
                endwhile;
            endif;
            ?>
            <?php the_posts_pagination(); ?>
        </div>

        <div class="col-md-2">
            <div id="right-sidebar" class="sidebar">
                <?php dynamic_sidebar( 'h2wp-right-sidebar' ); ?>
            </div>
        </div>
    </div>
</main>



<?php get_footer() ?>