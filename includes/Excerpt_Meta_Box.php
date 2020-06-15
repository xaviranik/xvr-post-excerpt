<?php

namespace XVR\Post_Excerpt;

class Excerpt_Meta_Box
{
    protected $key = 'xvr_post_excerpt';

    public function __construct() {
        $this->register_excerpt_meta_box();
    }

    public function register_excerpt_meta_box() {
        add_action( 'add_meta_boxes', [ $this, 'add_excerpt_meta_box'] );
        add_action( 'save_post', [ $this, 'save_metabox_data' ], 10, 2 );
    }

    public function add_excerpt_meta_box() {
        add_meta_box( 'xvr_page_id', __( 'XVR Post Excerpt', 'xvr-post-excerpt' ), [ $this, 'render' ], 'post', 'side', 'high');
    }

    public function save_metabox_data( $post_id, $post ) {
        if ( ! isset( $_POST['xvr_pe_nonce'] ) || ! wp_verify_nonce( $_POST[ 'xvr_pe_nonce' ], basename( __FILE__ ) ) ) {
            return;
        }

        $post_excerpt = isset( $_POST['xvr-post-excerpt'] ) ? sanitize_textarea_field( $_POST['xvr-post-excerpt'] ) : '';
        update_post_meta( $post_id, $this->key, $post_excerpt );
    }

    public function render( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'xvr_pe_nonce' );
        $post_excerpt = get_post_meta( $post->ID, $this->key, true );
        ?>
        <label class="components-form-token-field__label" for="xvr-post-excerpt">Custom Post Excerpt</label>
        <textarea name="xvr-post-excerpt" id="xvr-post-excerpt" class="components-textarea-control__input" rows="6"><?php echo $post_excerpt; ?></textarea>
        <?php
    }
}
