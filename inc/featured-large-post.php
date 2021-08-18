<?php

class Featured_Large_Post extends WP_Widget {


    public function __construct() {
        parent::__construct(
            'featured_large_post',
            'Featured Large Post',
            array( 'description' => __( 'Featured Large Post Widget', 'h2wp' ), )
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Featured_Large_Post' );
        });
    }

    public function widget( $args, $instance ) {
        $post = get_post($instance['postId']);
        if (empty($post) ) {
            echo "<h1>Sorry, post not available.</h1>";
            return;
        }
        ?>
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-12 px-0">
                <h1 class="display-4 font-italic"><?php  echo $post->post_title; ?></h1>
                <?php echo wp_trim_words($post->post_content, 60, '<a href="' . get_permalink($post->ID) . '"> Read more...</a>') ; ?>
            </div>
        </div>
        <?php
    }

    public function form($instance){
        $postId = !empty($instance['postId']) ? $instance['postId'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'postId' ) ); ?>">
                <?php echo esc_html__( 'Post ID:', 'h2wp' ); ?>
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'postId' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'postId' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $postId ); ?>"
            >
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['postId'] = ( !empty( $new_instance['postId'] ) ) ? strip_tags( $new_instance['postId'] ) : 0;
        return $instance;
    }

}

$featuredLargePost = new Featured_Large_Post();
