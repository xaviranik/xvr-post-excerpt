<?php

/**
 * Plugin Name:       XVR Post Excerpt
 * Plugin URI:        https://zabiranik.me
 * Description:       Custom excerpt, shortcode for displaying latest excerpts
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zabir Anik
 * Author URI:        https://zabiranik.me
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       xvr-post-excerpt
 */

require_once __DIR__ . '/vendor/autoload.php';

use XVR\Post_Excerpt\Installer;
use XVR\Post_Excerpt\Frontend_Handler;
use XVR\Post_Excerpt\Excerpt_Meta_Box;

if (!defined('ABSPATH')) {
    exit;
}


/**
 * Main plugin class
 */
final class XVR_Post_Excerpt {

    /**
     * Plugin Version
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class Constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a Singleton
     * @return \XVR_Post_Excerpt
     */
    public static function init() {

        static $instance = false;

        if ( ! $instance ) {
            $instance = new Self();
        }

        return $instance;
    }

    /**
     * Defines plugin constants
     * @return void
     */
    public function define_constants() {
        define('XVR_POST_EXCEPRT_VERSION', self::version);
    }

    /**
     * Plugin init
     * @return void
     */
    public function init_plugin() {
        new Frontend_Handler;
        new Excerpt_Meta_Box;
    }

    /**
     * Executes on plugin activation
     * @return void
     */
    public function activate() {
        $installer = new Installer;
        $installer->run();
    }
}

/**
 * Plugin Instance init
 * @return \XVR_Post_Excerpt
 */
function xvr_post_excerpt_init() {
    return XVR_Post_Excerpt::init();
}

// Initialize the plugin
xvr_post_excerpt_init();