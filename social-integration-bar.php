<?php
/*
Plugin Name: Social Integration Bar
Version: 1.0.0
Plugin URI: https://github.com/drewhammond/social-integration-bar/
Description: Displays social feeds and other goodies at the top of your blog in a responsive dropdown
Author: Drew Hammond <drew@alphagenetica.com>
Author URI: http://www.alphagenetica.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

    Copyright (C) 2014  Drew Hammond <drew@alphagenetica.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
 * Class DH_Social_Integration_Bar
 *
 *
 * @package Social Integration Bar
 * @requires Genesis Theme for WP (studiopress.com)
 *
 * @since 1.0.0
 */
class DH_Social_Integration_Bar {


	const NS = 'social-integration-bar';
	const VERSION = '1.0.0';
	protected $num_widgets = 2;
	/**
	 * @var array Default configuration array
	 */
	public $defaults = array();


	/**
	 * Constructor for DH_Social_Bar
	 *
	 * @since 0.1
	 */
	public function __construct() {

		// Define paths
		define( 'SIB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		define( 'SIB_PLUGIN_VER', self::VERSION );

		// Leeeeeeroyyyyy Jenkinsssss
		$this->init();
	}

	/**
	 * Initialize the plugin and load configuration
	 *
	 * @since 0.1
	 */
	public function init() {
		// Do plugin initialization

		add_action( 'wp_enqueue_scripts', array( $this, 'init_css' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'init_js' ) );
		add_action( 'wp_footer', array( $this, 'render' ) );


		$this->register_widgets( 2 );


		//$theme = new acv3_theme();
		if ( method_exists( 'acv3_theme', 'render_social_icons' ) ) {

		}

	}

	/**
	 * Register plugin options
	 */
	public function register_options() {

	}

	/**
	 * Register widget areas in the expanded bar area
	 *
	 * This function registers two widget areas inside the expanded bar div that can be
	 * referenced from within Wordpress.
	 *
	 * @param int $quantity Number of widget boxes to register in the Social Integration Bar
	 */
	public function register_widgets( $quantity = 2 ) {


		for ( $i = 0; $i < $quantity; $i ++ ) {
			register_sidebar( $args = array(
				'name'          => __( 'Social Integration Box ' . ( $i + 1 ), self::NS ),
				'id'            => self::NS . 'widget-area-' . $i,
				'description'   => __( 'This widget area is displayed in the left hand column on the Social Integration Bar', self::NS ),
				'class'         => self::NS . '-section-' . ( $i + 1 ),
				'before_widget' => '<li id="%1$s" class="widget %2$s list-unstyled">',
				'after_widget'  => '</li>',
				'before_title'  => '<p class="sib-widget-title">',
				'after_title'   => '</p>',
			) );
		}

		add_action( 'widgets_init', 'register_widgets' );

	}

	public function render() {
		?>

		<div class="social-integration-bar sib-wrapper">
			<div class="sib-inner-wrapper">
				<div class="sib-content container">
					<div class="sib-teaser">
						<p>Social Integration Bar - Expand Me!</p>
					</div>
					<div class="sib-toggle">
						<a href="#" class="fa fa-angle-down fa-3"></a>
					</div>
					<div class="sib-hidden container">
						<div class="col-md-6">
							<?php dynamic_sidebar( 'Social Integration Box 1' ); ?>
						</div>
						<div class="col-md-6">
							<?php dynamic_sidebar( 'Social Integration Box 2' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}

	public function init_css() {
		wp_register_style( 'social-integration-bar', SIB_PLUGIN_URL . 'css/styles.css' );
		wp_enqueue_style( 'social-integration-bar' );
	}

	public function init_js() {
		wp_enqueue_script( 'social-integration-bar', SIB_PLUGIN_URL . 'js/script.js', array( 'jquery' ), SIB_PLUGIN_VER, true );
	}

}


/**
 * Initialize the plugin in a non-OOP wrapper
 *
 * @since 0.1
 */
function dh_social_integration_bar_init() {
	// Create new instance of Social Bar
	$dh_social_bar = new DH_Social_Integration_Bar();
}


add_action( 'init', 'dh_social_integration_bar_init', 20 );
