<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://coupondaddy.in
 * @since      1.0.0
 *
 * @package    Coupon_Maker
 * @subpackage Coupon_Maker/public
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'No candy for you here.' );
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and enqueues
 * The front-specific stylesheet and JavaScript.
 *
 * @package    Coupon_Maker
 * @subpackage Coupon_Maker/public
 * @author     Bishoy A. <hi@bishoy.me>
 */
class Coupon_Maker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Coupon_Maker    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Coupon_Maker       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function registers the script only
		 * while the shortcode function enqueues it on demand.
		 */

		wp_register_style( $this->plugin_name . '-shortcode-style', plugin_dir_url( __FILE__ ) . 'css/coupon-maker-shortcode.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the scripts for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function registers the script only
		 * while the shortcode function enqueues it on demand.
		 */
		
		wp_register_script( $this->plugin_name . '-shortcode-script', plugin_dir_url( __FILE__ ) . 'js/coupon-maker-shortcode.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Coupon Shortcode callback
	 * @param  array  $atts  Attributes array
	 * @return mixed         Shortcode HTML
	 */
	public function coupon_shortcode( $atts ) {

		/**
		 * Adding necessary scripts and styles
		 */
		wp_enqueue_script( $this->plugin_name . '-shortcode-script' );
		wp_enqueue_style( $this->plugin_name . '-shortcode-style' );

		/**
		 * Preparing Shortcode Attributes
		 * @var $a prepared shortcode_atts array
		 */
		$a = shortcode_atts( array(
			'coupon' => '',
			'url'    => '#',
			'text'   => __( 'Reveal offer', 'coupon-maker' ),
		), $atts );

		/**
		 * Output HTML String
		 * @var $output string
		 */
		$output = '';
		
		$output .= '<div class="action-button">';
			$output .= '<div class="cg-copy cg-smooth-slow">';
				$output .= '<a href="'.esc_url( $a['url'] ).'" rel="nofollow" class="cg-coupon-url coupon afflink" target="_blank" id="cg_coupon_'.wp_create_nonce( $a['coupon'] ).'">';
					$output .= '<span style="right: 6px; width: 6px;" class="peel cg-smooth-fast cover"></span>';
					$output .= '<span style="width: 96%;" class="cg-copy-cover cg-smooth-fast cover">';
						$output .= '<strong>'.$a['text'].'</strong>';
					$output .= '</span>';
					$output .= '<span class="cg-copy-code">';
						$output .= '<input readonly="" value="'.esc_attr( $a['coupon'] ).'" title="Ctrl/CMD + C" class="cg-coupon-code" id="cg_coupon_code_'.wp_create_nonce( $a['coupon'] ).'">';
					$output .= '</span>';
				$output .= '</a>';
			$output .= '</div>';
		$output .= '</div>';


		/**
		 * Returning the shortcode HTML
		 */
		return $output;
	}

	/**
	 * Deal Shortcode callback
	 * @param  array  $atts  Attributes array
	 * @return mixed         Shortcode HTML
	 */
	public function deal_shortcode( $atts ) {

		/**
		 * Adding necessary styles
		 */
		wp_enqueue_style( $this->plugin_name . '-shortcode-style' );

		/**
		 * Preparing Shortcode Attributes
		 * @var $a prepared shortcode_atts array
		 */
		$a = shortcode_atts( array(
			'url'    => '#',
			'text'   => __( 'Visit Deal', 'coupon-maker' ),
		), $atts );

		/**
		 * Output HTML String
		 * @var $output string
		 */
		$output = '';
		
		$output .= '<div class="action-button">';
			$output .= '<div class="cg-copy cg-deal cg-smooth-slow ">';
				$output .= '<a href="'.esc_url( $a['url'] ).'" rel="nofollow" id="cg_deal_'.wp_create_nonce( $a['url'] ).'" class="cg-coupon-url deal" target="_blank">';
					$output .= '<span class="cg-copy-cover">';
						$output .= '<strong>'.$a['text'].'</strong>';
					$output .= '</span>';
				$output .= '</a>';
			$output .= '</div>';
		$output .= '</div>';


		/**
		 * Returning the shortcode HTML
		 */
		return $output;
	}

}
