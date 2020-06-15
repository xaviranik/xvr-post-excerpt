<?php

namespace XVR\Post_Excerpt;

use XVR\Post_Excerpt\Frontend\Shortcode;

/**
 * Frontend Handlder Class
 */
class Frontend_Handler {

    /**
     * Initializes frontend
     */
    public function __construct() {
        Shortcode::render();
    }
}