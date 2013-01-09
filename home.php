<?php

	$theme->display('header');

	?>

		<div id="posts">
			<?php
				echo $theme->content( $posts );
			?>
		</div>

	<?php

	$theme->display('footer');

?>
