<?php
// WP_Query arguments
$args = array (
	'post_type'              => array( 'leadership_members' ),
    'post_status'            => array( 'publish' ),
	// 'nopaging'               => true,
	// 'order'                  => 'ASC',
	// 'orderby'                => 'menu_order',
);

// The Query
$staff = new WP_Query( $args );

// The Loop
if ( $staff->have_posts() ) {
	while ( $staff->have_posts() ) {
		$staff->the_post();
        // do something
        $post_id = get_the_ID();
		$fields  = get_fields($post_id);
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();