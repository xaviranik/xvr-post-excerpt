<?php

namespace XVR\Post_Excerpt\Frontend;

use XVR\Post_Excerpt\Excerpt_Meta_Box;

class Shortcode {

    /**
     * Renders shortcode
     *
     * @return void
     */
    public static function render() {
        add_shortcode('post-excerpts', [ new self, 'prepare' ] );
    }

    /**
     * Prepares shortcode
     *
     * @return string
     */
    public function prepare($attr = [], $content = null)
    {
        $output = "";
        $params = shortcode_atts([
            'posts_per_page' => 10,
            'category' => '',
        ], $attr);

        $query = new \WP_Query($params);

        if ( $query->have_posts() ) {
            while ($query->have_posts()) {
                $query->the_post();
                
                ?>
                <h6><a href="<?php echo get_permalink() ?>"><?php echo get_post_meta( get_the_ID(), Excerpt_Meta_Box::get_post_except_key(), true ); ?></a></h6>
                <?php
            }
            wp_reset_postdata();
        }

        return $output;
    }


    
}