<?php

namespace XVR\Post_Excerpt;

use XVR\Post_Excerpt\Frontend\Shortcode;

class Frontend_Handler {
    public function __construct() {
        Shortcode::render();
    }
}