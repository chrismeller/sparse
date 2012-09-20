<?php

	class Sparse extends Theme {

		public function add_template_vars ( ) {

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