<?php get_header() ?>

    <main class="container">

        <?php dynamic_sidebar( 'h2wp-large-featured-post' ); ?>

        <div class="row mb-2">
            <?php
            $args = array('post_type' => 'h2wp-featured-post', 'posts_per_page' => 2);
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-251 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-0"><?php the_title() ?></h3>
                                <div class="mb-1 text-muted"><?php the_time('F j, Y'); ?></div>
                                <div class="text-justify">
                                    <?php the_excerpt() ?>
                                </div>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <?php if (!get_the_post_thumbnail_url()) : ?>
                                    <svg class="bd-placeholder-img" width="200" height="295"
                                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                         preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                    </svg>
                                <?php else: ?>
                                    <img width="200" height="295" alt="<?php the_title() ?>" src="<?php echo get_the_post_thumbnail_url(); ?>"/>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>

        <div class="row">
            <div class="col-md-10">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Recent Posts
                </h3>
                <?php
                $args = array('posts_per_page' => 3);
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <article class="blog-post">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title( '<h2 class="blog-post-title">', '</h2>' ); ?>
                            </a>
                            <p class="blog-post-meta"><?php the_time('F j, Y'); ?> by <span><?php the_author() ?></span></p>
                            <div class="post-excerpt">
                                <?php the_excerpt() ?>
                            </div>
                        </article>
                    <?php
                    endwhile;
                else:
                    _e('Sorry, no posts matched your criteria.', 'textdomain');
                endif;
                wp_reset_postdata();
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