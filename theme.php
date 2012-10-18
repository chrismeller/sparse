<?php

	class Sparse extends Theme {

		public function action_init_theme ( $theme ) {

			Format::apply( 'autop', 'post_content_out' );

			Format::apply_with_hook_params( 'more', 'post_content_out', _t( 'Continue reading &rarr;' ), null, 1, false );

			// register all our assets
			StackItem::register( 'source_sans_pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic' );
			StackItem::register( 'bootstrap_css', 'https://b79aa4845dfa0330f3c1-8ab693c01194d150d70d8e544af6f6be.ssl.cf1.rackcdn.com/v2.1.1/full/css/bootstrap.combined.min.css', '2.1.1' );
			StackItem::register( 'theme_css', $theme->get_url( 'assets/css/style.css' ), $theme->version )->add_dependency( 'source_sans_pro' )->add_dependency( 'bootstrap_css' );

			// override the default jquery with a cdn'd version
			StackItem::register( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js', '1.8.2' );
			StackItem::register( 'bootstrap_js', 'https://b79aa4845dfa0330f3c1-8ab693c01194d150d70d8e544af6f6be.ssl.cf1.rackcdn.com/v2.1.1/full/js/bootstrap.min.js' )->add_dependency( 'jquery' );
			StackItem::register( 'theme_js', $theme->get_url( 'assets/js/index.js' ), $theme->version )->add_dependency( 'bootstrap_js' );
			StackItem::register( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', '2.6.2' );
			StackItem::register( 'html5shiv', array( '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js', null, '<!--[if lt IE 9]>%s<![endif]-->' ), '3.6' );

			// now simply add the basic ones to the stack, the dependencies should handle themselves
			Stack::add( 'template_stylesheet', 'theme_css' );

			Stack::add( 'template_header_javascript', 'theme_js' );
			Stack::add( 'template_header_javascript', 'modernizr' );
			Stack::add( 'template_header_javascript', 'html5shiv' );

			// and setup our dns prefetch stack
			Stack::add( 'template_prefetch', '//fonts.googleapis.com', 'google_font' );
			Stack::add( 'template_prefetch', '//cdnjs.cloudflare.com', 'cloudflare' );
			Stack::add( 'template_prefetch', 'https://b79aa4845dfa0330f3c1-8ab693c01194d150d70d8e544af6f6be.ssl.cf1.rackcdn.com', 'bootstrap' );
			Stack::add( 'template_prefetch', 'http://www.google-analytics.com', 'analytics_http' );
			Stack::add( 'template_prefetch', 'https://ssl.google-analytics.com', 'analytics_https' );

		}

		public function theme_header_prefetch ( $theme ) {

			return Stack::get( 'template_prefetch', '<link rel="dns-prefetch" href="%s">' . "\n" );

		}

		public function add_template_vars ( ) {

			// if there is no $request object, we're probably in the admin - this is a dirty dirty hack
			if ( !isset( $this->request ) ) {
				return parent::add_template_vars();
			}

			$site_title = Options::get( 'title' );

			// if a title has been set somewhere else, don't overwrite it
			if ( isset( $this->title ) ) {
				// nothing
			}
			else {

				if ( ( $this->request->display_entry || $this->request->display_page ) && isset( $this->post ) ) {
					$this->title = $this->post->title . ' | ' . $site_title;
				}
				else if ( $this->request->display_entries_by_date ) {

					// year + month + day = daily archives
					if ( isset( $this->year ) && isset( $this->month ) && isset( $this->day ) ) {
						$date = HabariDateTime::date_create()->set_date( $this->year, $this->month, $this->day )->format( 'F jS, Y' );
						if ( $this->page == 1 ) {
							$this->page_title = _t( 'Daily Archives: %s', array( $date ) );
						}
						else {
							$this->page_title = _t( 'Daily Archives: %s - Page %d', array( $date, $this->page ) );
						}
						$this->title = $this->page_title . ' | ' . $site_title;
					}
					else if ( isset( $this->year ) && isset( $this->month ) ) {
						$date = HabariDateTime::date_create()->set_date( $this->year, $this->month, 1 )->format( 'F, Y' );
						if ( $this->page == 1 ) {
							$this->page_title = _t( 'Monthly Archives: %s', array( $date ) );
						}
						else {
							$this->page_title = _t( 'Monthly Archives: %s - Page %d', array( $date, $this->page ) );
						}
						$this->title = $this->page_title . ' | ' . $site_title;
					}
					else if ( isset( $this->year ) ) {
						$date = HabariDateTime::date_create()->set_date( $this->year, 1, 1 )->format( 'Y' );
						if ( $this->page == 1 ) {
							$this->page_title = _t( 'Yearly Archives: %s', array( $date ) );
						}
						else {
							$this->page_title = _t( 'Yearly Archives: %s - Page %d', array( $date, $this->page ) );
						}
						$this->title = $this->page_title . ' | ' . $site_title;;
					}

				}
				else if ( $this->request->display_entries_by_tag ) {
					if ( $this->page == 1 ) {
						$this->page_title = _t( 'Posts tagged with <span class="section">%s</span>', array( $this->tag ) );
						$this->title = _t( 'Posts tagged with %s', array( $this->tag ) ) . ' | ' . $site_title;
					}
					else {
						$this->page_title = _t( 'Posts tagged with <span class="section">%s</span> - Page %d', array( $this->tag, $this->page ) );
						$this->title = _t( 'Posts tagged with %s - Page %d', array( $this->tag, $this->page ) ) . ' | ' . $site_title;
					}
				}
				else if ( $this->request->display_home ) {
					$this->page_title = _t( 'Latest Posts' );
					$this->title = $site_title;
				}
				else if ( $this->request->display_entries ) {
					$this->page_title = _t( 'Latest Posts - Page %d', array( $this->page ) );
					$this->title = $this->page_title . ' | ' . $site_title;
				}
				else {
					// something we don't recognize or don't handle specially
					$this->title = $site_title;
				}

			}

			parent::add_template_vars();

		}

	}

?>