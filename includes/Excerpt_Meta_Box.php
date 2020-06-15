<?php

namespace XVR\Post_Excerpt;

class Excerpt_Meta_Box
{
    public function __construct() {
        $this->register_excerpt_meta_box();
    }

    public function register_excerpt_meta_box() {
        add_action( 'add_meta_boxes', [ $this, 'add_excerpt_meta_box'] );
    }

    public function add_excerpt_meta_box() {
        add_meta_box( 'xvr_page_id', __( 'XVR Post Excerpt', 'xvr-post-excerpt' ), [ $this, 'render' ], 'post', 'side', 'high');
    }

    public function render() {
        ?>
        <textarea name="xvr-post-excerpt" id="xvr-post-excerpt" class="components-textarea-control__input" rows="6"><?php echo "LOL"; ?></textarea>
        <?php
    }
}
