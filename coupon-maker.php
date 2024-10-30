<?php

/**
 * The plugin bootstrap file
 *
 * @link              http://coupondaddy.in
 * @since             1.0.0
 * @package           Coupon_Maker
 *
 * @wordpress-plugin
 * Plugin Name:       Coupon Maker
 * Plugin URI:        http://coupondaddy.in/coupon-maker-plugin/
 * Description:       Coupon Maker is a plugin which lets you make your own coupon buttons which you can use on your website to give exclusive discounts to your readers or visitors.
 * Version:           1.0.0
 * Author:            Bishoy A.
 * Author URI:        http://bishoy.me/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       coupon-maker
 * Domain Path:       /languages
 *
 *  Coupon Maker WordPress Plugin
 *  Copyright (C) 2015 Bishoy A.
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, version 3 of the License.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'No candy for you here.' );
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-coupon-maker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Coupon_Maker() {

	$plugin = new Coupon_Maker();
	$plugin->run();

}
run_Coupon_Maker();