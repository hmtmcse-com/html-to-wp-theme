<div class="card mb-3">
    <div class="row">
        <div class="col-2 text-center">
            <?php if (get_the_post_thumbnail_url()) : ?>
                <img height="200" width="200" class="img-thumbnail"  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
            <?php else: ?>
                <img height="200" width="200" class="img-thumbnail"  src="<?php echo get_template_directory_uri() . "/assets/images/no-image.png"; ?>" alt="image">
            <?php endif; ?>
        </div>
        <div class="col-10">
            <div class="card-body">
                <a href="<?php the_permalink() ?>">
                    <?php the_title('<h5 class="card-title">', '</h5>'); ?>
                </a>
                <div class="card-text">
                    <?php the_excerpt() ?>
                </div>
            </div>
        </div>
    </div>
</div>