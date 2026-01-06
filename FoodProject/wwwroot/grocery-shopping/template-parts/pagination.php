<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'grocery-shopping' ),
		'next_text' => esc_html__( 'Next page', 'grocery-shopping' ),
	) );