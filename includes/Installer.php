<?php

namespace XVR\Post_Excerpt;

/**
 * Installer Class
 */
class Installer {
	/**
	 * Plugin runner
	 *
	 * @return void
	 */
	public function run() {
		$this->add_version();
	}

	/**
	 * Adds plugin version
	 */
	public function add_version() {
		$installed = get_option( 'xvr_post_excerpt_installed' );

		if ( ! $installed ) {
			update_option( 'xvr_post_excerpt_installed', time() );
		}

		update_option( 'xvr_post_excerpt_version', XVR_POST_EXCEPRT_VERSION );
	}
}