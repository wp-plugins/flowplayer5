<div id="jsplaylist<?php echo esc_attr( $playlist_id ); ?>" class="flowplayer-playlist flowplayer-playlist-<?php echo esc_attr( $playlist_id . ' ' . $playlist_options['fp5-select-skin'] ); ?>">
	<a class="fp-prev"><?php _e( '&lt; Prev', 'flowplayer5' ); ?></a><a class="fp-next"><?php _e( 'Next &gt;', 'flowplayer5' ); ?></a>
</div>
<script>
(function($) {
	var Playlist<?php echo esc_attr( $playlist_id ); ?> = [
		<?php
		// WP_Query arguments
		$args = array(
			'post_type'      => 'flowplayer5',
			'post_status'    => 'publish',
			'orderby'        => 'meta_value_num',
			'posts_per_page' => '-1',
			'meta_key'       => 'playlist_order_' . esc_attr( $playlist_id ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'playlist',
					'field'    => 'id',
					'terms'    => esc_attr( $playlist_id ),
				),
			),
			'cache_results'          => true,
			'update_post_meta_cache' => true,
			'update_post_term_cache' => true,
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
				[
					{webm: "<?php echo esc_url( get_post_meta( get_the_ID(), 'fp5-webm-video', true ) ); ?>"},
					{mp4: "<?php echo esc_url( get_post_meta( get_the_ID(), 'fp5-mp4-video', true ) ); ?>"},
					{ogg: "<?php echo esc_url( get_post_meta( get_the_ID(), 'fp5-ogg-video', true ) ); ?>"},
					{flash: "<?php echo esc_html( get_post_meta( get_the_ID(), 'fp5-flash-video', true ) ); ?>"}
				],
		<?php }
		}

		// Restore original Post Data
		wp_reset_postdata();
		?>
	];
	$("#jsplaylist<?php echo esc_attr( $playlist_id ); ?>").flowplayer({
		rtmp: "<?php echo esc_attr( $playlist_options['fp5-rtmp-url'] ); ?>",
		playlist: Playlist<?php echo esc_attr( $playlist_id ); ?>
	});
})(jQuery);
</script>
