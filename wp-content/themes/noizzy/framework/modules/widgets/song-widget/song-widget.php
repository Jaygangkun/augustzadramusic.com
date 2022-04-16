<?php

class NoizzyEdgeSongWidget extends NoizzyEdgeWidget {
	
	public function __construct() {
		parent::__construct(
			'edge_song_widget',
			esc_html__( 'Noizzy Song Widget', 'noizzy' ),
			array( 'description' => esc_html__( 'Add audio play button to widget areas', 'noizzy' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'song_text',
				'title' => esc_html__( 'Song Text', 'noizzy' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'song_file_url',
				'title'   => esc_html__( 'Audio File Link', 'noizzy' ),
			)
		);
	}
	
	public function widget( $args, $instance ) {

		if ( ! empty( $instance['song_file_url'] ) ) {

		
		?>

			<a class="edge-song-widget-holder">
	            <audio src="<?php echo esc_url($instance['song_file_url']); ?>"></audio> 

	            <?php if ( ! empty( $instance['song_file_url'] ) ) { ?>

		            <div class="edge-song-widget-text-holder">
			        	<span class="edge-song-widget-text"><?php echo esc_html( $instance['song_text'] );?></span>
					</div>

				<?php } ?>

	            <div class="edge-song-widget-icon-holder">
		            <svg class="edge-song-widget-icon edge-song-widget-icon-play" x="0px" y="0px" width="12px" height="14.083px" viewBox="0 0 12 14.083" enable-background="new 0 0 12 14.083" xml:space="preserve">
						<polygon fill="#000" points="12,6.999 0.001,13.998 0.001,0 12,6.999 "/>
					</svg>
					<svg class="edge-song-widget-icon edge-song-widget-icon-pause" x="0px" y="0px" width="11.042px" height="14.083px" viewBox="0 0 11.042 14.083" enable-background="new 0 0 11.042 14.083" xml:space="preserve">
						<rect x="7.042" y="0.042" fill="#000" width="4" height="14.041"/>
						<rect y="0.042" fill="#000" width="4" height="14.041"/>
					</svg>
				</div>
	        </a>

        <?php 
        }
	}
}