<?php
/*
Plugin Name: Social Integration Bar
Version: 0.1
Plugin URI: https://github.com/drewhammond/dh-social-bar/
Description: Displays social feeds and other goodies at the top of your blog in a responsive dropdown
Author: Drew Hammond <drew@marketwarp.com>
Author URI: http://www.marketwarp.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

    Copyright (C) 2014  Drew Hammond <drew@marketwarp.com>

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
 * Class DH_Social_Bar
 *
 * @package Social Integration Bar
 *
 * @since 0.1
 */
class DH_Social_Bar {

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
		// Leeeeeeroyyyyy Jenkinsssss
		$this->init();
	}

	/**
	 * Initialize the plugin and load configuration
	 *
	 * @since 0.1
	 */
	public function init() {
		// Do plugin initialization\
		$this->render();;
	}

	public function render() { ?>

		<div class="social-integration-bar">
			<div class="container">
				<p class="sib-content">
					Social Integration Bar
				</p>
			</div>
		</div>

	<?php
	}

}


/**
 * Initialize the plugin in a non-OOP wrapper
 *
 * @since 0.1
 */
function dh_social_bar_init() {
	// Create new instance of Social Bar
	$dh_social_bar = new DH_Social_Bar();
}


add_action( 'plugins_loaded', 'dh_social_bar_init', 20 );
