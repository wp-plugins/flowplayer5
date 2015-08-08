<?php
/**
 * Sanitize Settings
 *
 * @package   Flowplayer 5 for WordPress
 * @author    Ulrich Pogson <ulrich@pogson.ch>
 * @license   GPL-2.0+
 * @link      http://flowplayer.org/
 * @copyright 2013 Flowplayer Ltd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Flowplayer5_Sanitize_Settings {

	private $options;

	/**
	 * Get things started
	 *
	 * @since 2.0
	 * @return void
	*/
	public function __construct() {

		$this->options  = get_option( 'fp5_settings_general', array() );

		add_filter( 'fp5_settings_sanitize_checkbox', array( $this, 'sanitize_checkbox' ), 10, 2 );
		add_filter( 'fp5_settings_sanitize_text', array( $this, 'sanitize_text' ), 10, 2 );
		add_filter( 'fp5_settings_sanitize_password', array( $this, 'sanitize_password' ), 10, 2 );
		add_filter( 'fp5_settings_sanitize_select', array( $this, 'sanitize_select' ), 10, 2 );
		add_filter( 'fp5_settings_sanitize_upload', array( $this, 'sanitize_upload' ), 10, 2 );
	}

	/**
	 * Sanitize checkbox settings
	 *
	 * @since 2.0
	 * @param array $args Arguments passed by the setting
	 * @return void
	 */
	function sanitize_checkbox( $value, $key ) {

		if ( 1 == $value ) {
			$value = 1;
		} else {
			$value = false;
		}
		return $value;
	}

	/**
	 * Sanitize Text settings
	 *
	 * @since 2.0
	 * @param array $args Arguments passed by the setting
	 * @return void
	 */
	function sanitize_text( $value, $key ) {

		switch ( $key ) {
			case 'key':
				$value = preg_match('/\\$\\d{15}/', $value) ? $value : false;
				break;
			case 'directory':
			case 'library':
			case 'script':
			case 'skin':
			case 'swf':
				$value = esc_url_raw( $value );
				break;
			default:
				$value = sanitize_text_field( $value );
				break;
		}

		return $value;

	}

	/**
	 * Sanitize Password settings
	 *
	 * @since 2.0
	 * @param array $args Arguments passed by the setting
	 * @global $this->options Array of all the Flowplayer5 Options
	 * @return void
	 */
	function sanitize_password( $value, $key ) {

		// protect password by hashing it immediately
		if ( ! empty( $value ) ) {
			$value = sha1( esc_html( $value ) );
		} elseif ( ! empty( $this->options['password'] ) ) {
			$value = $this->options['password'];
		} else {
			$value = false;
		}

		return $value;
	}

	/**
	 * Select Callback
	 *
	 * @since 2.0
	 * @param array $args Arguments passed by the setting
	 * @return void
	 */
	function sanitize_select( $value, $key ) {

		switch ( $key ) {
			case 'fp_version':
				if ( ! in_array( $value, array( 'fp5', 'fp6' ), true ) ) {
					return false;
				}
				break;
			default:
				$value = esc_attr( $value );
				break;
		}

		return $value;
	}

	/**
	 * Upload Callback
	 *
	 * @since 2.0
	 * @param array $args Arguements passed by the setting
	 * @return void
	 */
	function sanitize_upload( $value, $key ) {

		$value = esc_url_raw( $value );
		return $value;
	}

}
