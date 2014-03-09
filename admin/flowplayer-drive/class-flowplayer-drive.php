<?php
/**
 * Flowplayer 5 for WordPress
 *
 * @package   Flowplayer_Drive
 * @author    Ulrich Pogson <ulrich@pogson.ch>
 * @license   GPL-2.0+
 * @link      http://flowplayer.org/
 * @copyright 2013 Flowplayer Ltd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Flowplayer Drive Class
 *
 * @package Flowplayer_Drive
 * @author  Ulrich Pogson <ulrich@pogson.ch>
 */
class Flowplayer_Drive {

	/**
	 * Flowplayer Account API URL
	 *
	 * @since    1.2.0
	 *
	 * @var      string
	 */
	protected $account_api_url = 'http://account.api.flowplayer.org/auth?_format=json';

	/**
	 * Flowplayer Video API URL
	 *
	 * @since    1.2.0
	 *
	 * @var      string
	 */
	protected $video_api_url = 'http://videos.api.flowplayer.org/account';

	/**
	 * Initialize Flowplayer Drive
	 *
	 * @since    1.2.0
	 */
	public function run() {
		// Add content to footer bottom
		add_action( 'admin_footer', array( $this, 'fp5_drive_content' ) );
	}

	/**
	 * Fetch Flowplayer Drive API authentication seed
	 *
	 * @since    1.2.0
	 */
	protected function make_auth_seed_request() {

		$response = wp_remote_get( esc_url_raw( $this->account_api_url ) );

		if ( 200 != wp_remote_retrieve_response_code( $response ) ) {
			Flowplayer_Drive_Error::showAuthenticationSeedApiError();
			return;
		}

		$seed = $this->json_decode_body( $response );

		return $seed->result;
	}

	/**
	 * Fetch Flowplayer Drive API authentication code
	 *
	 * @since    1.2.0
	 */
	protected function make_auth_request() {

		// get the login info
		$options   = get_option( 'fp5_settings_general' );
		$user_name = ( isset( $options['user_name'] ) ) ? $options['user_name'] : '';
		$password  = ( isset( $options['password'] ) ) ? $options['password'] : '';

		if ( ! $user_name || ! $password ) {
			Flowplayer_Drive_Error::showLoginError();
			return;
		}

		$seed = $this->make_auth_seed_request();

		$auth_api_url = esc_url_raw(
			add_query_arg(
				array(
					'callback' => '?',
					'username' => $user_name,
					'hash'     => sha1( $user_name . $seed . $password ),
					'seed'     => $seed
				),
				esc_url_raw( $this->account_api_url )
			)
		);

		$response = wp_remote_get( $auth_api_url );

		if ( 200 != wp_remote_retrieve_response_code( $response ) ) {
			Flowplayer_Drive_Error::showAuthenticationApiError();
			return;
		}

		$auth = $this->json_decode_body( $response );

		if ( ! $auth->success ) {
			Flowplayer_Drive_Error::showUsernamePasswordError();
			return;
		}

		return $auth->result->authcode;
	}

	/**
	 * Fetch Flowplayer Drive Videos
	 *
	 * @since    1.2.0
	 */
	protected function make_video_request() {

		$json_cache = get_transient( 'flowplayer_drive_json_cache' );

		if ( false !== $json_cache ) {
			return $json_cache;
		}

		$authcode = $this->make_auth_request();

		$query_args = array(
			'videos'   => 'true',
			'authcode' => $authcode
		);

		$verified_video_api_url = add_query_arg( $query_args, $this->video_api_url );

		$response = wp_remote_get( esc_url_raw( $verified_video_api_url ) );

		$json = $this->json_decode_body( $response );

		if ( 200 == wp_remote_retrieve_response_code( $response ) ) {

			set_transient( 'flowplayer_drive_json_cache', $json, 15 * MINUTE_IN_SECONDS );

			return $json;
		}

		if ( 'Cannot find account' == $json ) {
			Flowplayer_Drive_Error::showNewUserError();
			return;
		}

		if ( $json != 'authcode missing' ) {
			Flowplayer_Drive_Error::showVideoApiError();
			return;
		}
	}

	/**
	 * Structure Flowplayer Drive Videos
	 *
	 * @since    1.2.0
	 */
	public function get_videos() {

		$json        = $this->make_video_request();
		$json_videos = $json->videos;

		if ( ! is_array( $json_videos ) ) {
			return;
		}

		$rtmp = isset( $json->rtmpUrl ) ? $json->rtmpUrl : '';

		foreach ( $json_videos as $video ) {

			foreach ( $video->encodings as $encoding ) {
				if ( 'done' !== $encoding->status ) {
					continue;
				}

				if ( 'webm' === $encoding->format ) {
					$webm  = $encoding->url;
				} elseif ( 'mp4' === $encoding->format) {
					$mp4   = $encoding->url;
					$flash = $encoding->filename;
				}

				if ( in_array( $encoding->format, array( 'mp4', 'webm' ) ) ) {
					$duration = gmdate( "H:i:s", $encoding->duration );
				}
			}

			$return = '<div class="video">';
				$return .= '<a href="#" class="choose-video" data-rtmp="' . $rtmp . '" data-user-id="' . $video->userId . '" data-video-id="' . $video->id . '" data-video-name="' . $video->title . '" data-webm="' . $webm .'" data-mp4="' . $mp4 . '" data-flash="mp4:' . $video->userId . '/' . $flash . '" data-img="' . $video->snapshotUrl . '">';
					$return .= '<h2 class="video-title">' . $video->title . '</h2>';
					$return .= '<div class="thumb" style="background-image: url(' . $video->thumbnailUrl . ');">';
						$return .= '<em class="duration">' . $duration . '</em>';
					$return .= '</div>';
				$return .= '</a>';
			$return .= '</div>';

			echo $return;

		}

	}

	/**
	 * Content for Flowplayer Drive colorbox modal
	 *
	 * @since    1.2.0
	 */
	public function fp5_drive_content() {

		$screen = get_current_screen();

		// Only run in post/page creation and edit screens
		if ( 'post' != $screen->base || 'flowplayer5' != $screen->post_type  ) {
			return;
		}
		// @todo Use a <button> or two, not links with # hrefs.
		?>
		<div style="display: none;">
			<div id="flowplayer-drive">
				<?php $this->get_videos(); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Retrieve body from json
	 *
	 * @since    1.7.0
	 */
	public function json_decode_body( $response ) {
		$body = wp_remote_retrieve_body( $response );

		return json_decode( $body );
	}

}
