<?php

	$theme->display('header');

	?>

		<div id="posts" itemprop="blogPosts">
			<?php
				echo $theme->content( $posts );
			?>
		</div>

	<?php

	$theme->display('footer');

?>