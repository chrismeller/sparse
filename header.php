<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php echo $locale; ?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<?php

		echo $theme->header_prefetch();

	?>

	<title><?php echo $title; ?></title>

	<link rel="shortcut icon" href="<?php echo Site::get_url( 'site' ) . '/favicon.ico'; ?>">
	<link rel="icon" type="image/png" href="<?php echo $theme->get_url( 'assets/img/favicon.png' ); ?>">

	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://microformats.org/profile/hcard">

	<?php
		echo $theme->header();
	?>
</head>
<body class="<?php echo $theme->body_class(); ?>" itemscope itemtype="http://schema.org/Blog">
	<!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience the internet better!</p><![endif]-->
	<div id="border"></div>


	<div id="page">

		<div class="yui3-g-responsive">

			<div id="left" class="yui3-u-1-3">

				<div class="wrap">

					<header id="header" class="vcard">
						<hgroup>
							<h1 id="name" itemprop="name">
								<a class="url" href="<?php echo Site::get_url( 'habari' ); ?>">
										<span class="fn n hide">
											<span class="given-name">Chris</span> <span class="family-name">Meller</span>
										</span>
									<span class="nickname">@chrismeller</span>
								</a>
							</h1>
							<h2 id="tagline" itemprop="description">Awesome Coder. Unashamed PHP Lover. Dot Net Dabbler. Mac User. nGinx Enthusiast. Open Data Addict. <a href="https://twitter.com/habariproject">@habari</a> Cabal Member. System Admin. Newly-settled <span class="adr"><abbr title="Austin - That's Texas, man!" class="locality" data-rel="tooltip">Austin<span class="hide">, <span class="region">TX</span></span></abbr></span> Resident. <a href="http://youshouldhirechris.com" title="You really should... Take my word for it." data-rel="tooltip">Hire Me</a>!</h2>
						</hgroup>
						<div class="">
							<ul class="social links yui3-g">
								<li class="yui3-u"><a href="https://chrismeller.com" title="Chris Meller" class="icon blog" data-rel="tooltip">Chris Meller</a></li>
								<li class="yui3-u"><a href="https://github.com/chrismeller" title="GitHub" class="icon github" data-rel="tooltip">Github</a></li>
								<li class="yui3-u"><a href="https://twitter.com/chrismeller" title="Twitter" class="icon twitter" data-rel="tooltip">Twitter</a></li>
								<li class="yui3-u"><a href="http://flickr.com/mellertime" title="Flickr" class="icon flickr" data-rel="tooltip">Flickr</a></li>
								<li class="yui3-u"><a href="https://www.google.com/search?q=mooses&amp;tbm=isch" title="Mooses!" class="icon mooses" data-rel="tooltip">Mooses</a></li>
							</ul>
						</div>
					</header>

				</div>

			</div>

			<section id="content" class="yui3-u-2-3">

				<div class="wrap">

					<?php

						// get any session messages we need to display
						$errors = Session::get_errors( true );
						$notices = Session::get_notices( true );

						if ( count( $errors ) > 0 ) {

							?>

								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">x</button>
									<?php
										foreach ( $errors as $error ) {
											?>
												<p><?php echo $error; ?></p>
											<?php
										}
									?>
								</div>

							<?php

						}

						if ( count( $notices ) > 0 ) {

							?>

								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">x</button>
									<?php
										foreach ( $notices as $notice ) {
											?>
												<p><?php echo $notice; ?></p>
											<?php
										}
									?>
								</div>

							<?php

						}

					?>