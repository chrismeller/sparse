<?php

	if ( isset( $page_title ) ) {
		?>
			<h1 class="pagehead"><?php echo $page_title; ?></h1>
		<?php
	}

	foreach ( $posts as $post ) {
		echo $theme->content( $post );
	}

	// determine our captions
	if ( $theme->request->display_entries_by_tag ) {
		$older_text = _t( 'Older Posts in <span class="section">%s</span>', array( $this->tag ) );
		$newer_text = _t( 'Newer Posts in <span class="section">%s</span>', array( $this->tag ) );
		$older_title = _t( 'Older Posts in %s', array( $this->tag ) );
		$newer_title = _t( 'Newer Posts in %s', array( $this->tag ) );

		$older_link = $theme->next_page_link( $older_text, array( 'prev-page', 'older', 'previous' ) );
		$newer_link = $theme->prev_page_link( $newer_text, array( 'next-page', 'newer', 'next' ) );

		$older_link = MultiByte::str_replace( 'title="' . $older_text . '"', 'title="' . $older_title . '"', $older_link );
		$newer_link = MultiByte::str_replace( 'title="' . $newer_text . '"', 'title="' . $newer_title . '"', $newer_link );
	}
	else {
		$older = _t( 'Older Posts' );
		$newer = _t( 'Newer Posts' );

		$older_link = $theme->next_page_link( $older, array( 'prev-page', 'older', 'previous' ) );
		$newer_link = $theme->prev_page_link( $newer, array( 'next-page', 'newer', 'next' ) );
	}

	// and what posts are we looking at?
	$pagination = isset( $posts->get_param_cache['limit'] ) ? $posts->get_param_cache['limit'] : Options::get( 'pagination' );
	$from_post_num = ( ( $page - 1 ) * $pagination + 1 );
	$to_post_num = $from_post_num + count( $posts ) - 1;
	$total_posts = $posts->count_all();
	$from_to = _t( '%d - %d of %d', array( $from_post_num, $to_post_num, $total_posts ) );

	?>

		<div class="pagination row-fluid">
			<div class="span4">
				<?php echo $older_link; ?>
			</div>
			<div class="span4"><p class="of"><?php echo $from_to; ?></p></div>
			<div class="span4 pull-right">
				<?php echo $newer_link; ?>
			</div>
		</div>

	<?php

?>