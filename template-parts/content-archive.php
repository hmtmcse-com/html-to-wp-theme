<div class="container">
    <article class="blog-post">
        <a href="<?php the_permalink() ?>">
            <?php the_title( '<h2>', '</h2>' ); ?>
        </a>
        <p class="blog-post-meta"><?php the_time('F j, Y'); ?> by <span><?php the_author() ?></span></p>
        <div class="content">
            <?php the_content(); ?>
        </div>
    </article>
</div>

