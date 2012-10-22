<article id="post-<?php echo $content->id; ?>" class="<?php echo $content->css_class(); ?>" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="metadata">
		<h1 class="post-title" itemprop="name">
			<a href="<?php echo $content->permalink; ?>" itemprop="url"><?php echo $content->title_out; ?></a>
		</h1>
		<div class="pubdata">
			<span class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
				<span itemprop="name"><?php echo $content->author->displayname; ?></span>
			</span>
			<time title="<?php echo $content->pubdate->format( 'l, F jS, Y \a\t g:m a' ); ?>" datetime="<?php echo MultiByte::ucfirst( $content->pubdate->format( 'Y-m-d\TH:i:s\Z' ) ); ?>" itemprop="datePublished" rel="tooltip"><?php echo $content->pubdate->fuzzy; ?></time>
			<meta itemprop="dateModified" content="<?php echo $content->updated->format( 'Y-m-d\TH:i:s\Z' ); ?>">
			<!--
			<span> &middot; </span>
			<a href="<?php echo $content->permalink; ?>#comments" class="comments" itemprop="discussionUrl"><?php echo $content->comments->moderated->count == 0 ? 'No Comments' : $content->comments->moderated->count . _n( 'Comment', 'Comments', $content->comments->moderated->count ); ?></a>
			-->
			<?php

				if ( count( $content->tags ) > 0 ) {
					?>
						<span> &middot; Supposedly about </span>
						<span itemprop="keywords" class="tags">
							<?php echo Format::tag_and_list( $content->tags, ', ', ', and ', true, ' and ' ); ?>.
						</span>
					<?php
				}

			?>
		</div>
	</header>
	<section class="content" itemprop="articleBody">
		<?php echo $content->content_out; ?>
	</section>

	<?php

		if ( $request->display_entry ) {
			// comments here
		}

	?>
</article>

<?php

	// if we're displaying a single post, include next and previous post links
	if ( $request->display_entry ) {

		$next = $post->ascend();        // next is higher in the list because we are in reverse chron order - so newer
		$previous = $post->descend();   // previous is lower in the list because we are in reverse chron order - older

		?>

			<div class="pagination row">
				<div class="span4">
					<?php
						if ( $previous ) {
							?>
								<a class="older" href="<?php echo $previous->permalink; ?>">Last Post <span class="section"><?php echo $previous->title_out; ?></span></a>
							<?php
						}
					?>
				</div>
				<div class="span4 pull-right">
					<?php
						if ( $next ) {
							?>
								<a class="newer" href="<?php echo $next->permalink; ?>">Next Post <span class="section"><?php echo $next->title_out; ?></span></a>
							<?php
						}
					?>
				</div>
			</div>

		<?php
	}

?>