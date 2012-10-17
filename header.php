<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $locale; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php echo $locale; ?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//netdna.bootstrapcdn.com">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="http://www.google-analytics.com">
	<link rel="dns-prefetch" href="https://ssl.google-analytics.com">

	<title><?php echo $title; ?></title>

	<link rel="shortcut icon" href="<?php echo Site::get_url( 'site' ) . '/favicon.ico'; ?>">
	<link rel="icon" type="image/png" href="<?php echo $theme->get_url( 'assets/img/favicon.png' ); ?>">

	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://microformats.org/profile/hcard">

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">

	<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap.no-icons.min.css">-->
	<link rel="stylesheet" href="//d18pg74lwgn60w.cloudfront.net/v2.1.1/full/css/bootstrap.combined.min.css">
	<link rel="stylesheet" href="<?php echo $theme->get_url( 'assets/css/style.css' ); ?>">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/js/bootstrap.min.js"></script>
	<script src="<?php echo $theme->get_url( 'assets/js/index.js' ); ?>"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js"></script>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js"></script>
	<![endif]-->

	<?php
		echo $theme->header();
	?>
</head>
<body class="<?php echo $theme->body_class(); ?>" itemscope itemtype="http://schema.org/Blog">
	<!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience the internet better!</p><![endif]-->
	<div id="border"></div>


	<div id="page" class="container-fluid">

		<div class="row">

			<div id="left" class="span4">

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
						<h2 id="tagline" itemprop="description">Awesome Coder. Unashamed PHP Lover. Dot Net Dabbler. Mac User. nGinx Enthusiast. Open Data Addict. <a href="https://twitter.com/habariproject">@habari</a> Cabal Member. System Admin. Newly-settled <span class="adr"><abbr title="Austin - That's Texas, man!" class="locality" rel="tooltip">Austin<span class="hide">, <span class="region">TX</span></span></abbr></span> Resident. <a href="http://youshouldhirechris.com" title="You really should... Take my word for it." rel="tooltip">Hire Me</a>!</h2>
					</hgroup>
					<div class="navbar">
						<ul class="social nav links">
							<li><a href="https://chrismeller.com" title="Chris Meller" class="icon blog" rel="tooltip">Chris Meller</a></li>
							<li><a href="https://github.com/chrismeller" title="GitHub" class="icon github" rel="tooltip">Github</a></li>
							<li><a href="https://twitter.com/chrismeller" title="Twitter" class="icon twitter" rel="tooltip">Twitter</a></li>
							<li><a href="http://flickr.com/mellertime" title="Flickr" class="icon flickr" rel="tooltip">Flickr</a></li>
							<li><a href="https://www.google.com/search?q=mooses&amp;tbm=isch" title="Mooses!" class="icon mooses" rel="tooltip">Mooses</a></li>
						</ul>
					</div>
				</header>

			</div>

			<section id="content" class="span8">
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
									foreach ( $errors as $error ) {
										?>
											<p><?php echo $error; ?></p>
										<?php
									}
								?>
							</div>

						<?php

					}

				?>