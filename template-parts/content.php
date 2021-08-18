<header class="content-header">
    <div class="meta mb-3">
        <span class="date"><?php the_time('F j, Y'); ?></span>
        <?php the_tags(' <span class="tag"><i class="fa fa-tag"></i> ', '</span> <span class="tag"><i class="fa fa-tag"></i> ', '</span>'); ?>
        <span class="comment">
            <i class='fa fa-comment'></i> <?php echo get_comments_number() ?>
        </span>
    </div>
</header>
<div class="content-body">
    <?php if (get_the_post_thumbnail_url()) : ?>
        <figure class="blog-banner text-center" >
            <img class="img-fluid"  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
        </figure>
    <?php endif; ?>
    <h3 class="mt-5 mb-3"><?php the_title() ?></h3>
    <div class="content">
        <?php the_content(); ?>
    </div>

    <div class="comments">
        <?php comments_template(); ?>
    </div>
</div>