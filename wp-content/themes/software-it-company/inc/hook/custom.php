<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package software_it_company
 */

if ( ! function_exists( 'software_it_company_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function software_it_company_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'software-it-company' ); ?></a><?php
	}
endif;

add_action( 'software_it_company_action_before', 'software_it_company_skip_to_content', 15 );

// Middle Header

if ( ! function_exists( 'software_it_company_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function software_it_company_site_branding() {
		$header_top_phone_text = software_it_company_get_option( 'header_top_phone_text' );
		$header_top_phone_number = software_it_company_get_option( 'header_top_phone_number' );

		$header_top_hiring_head = software_it_company_get_option( 'header_top_hiring_head' );

		$header_top_hiring = software_it_company_get_option( 'header_top_hiring' );

		$header_top_hiring_url = software_it_company_get_option( 'header_top_hiring_url' );

		$header_top_hiring_text = software_it_company_get_option( 'header_top_hiring_text' );

		$header_top_location = software_it_company_get_option( 'header_top_location' );

		$social_media_facebook = software_it_company_get_option( 'social_media_facebook' );
		$social_media_twitter = software_it_company_get_option( 'social_media_twitter' );
		$social_media_instagram = software_it_company_get_option( 'social_media_instagram' );
		$social_media_linkdin = software_it_company_get_option( 'social_media_linkdin' );
		$social_media_youtube = software_it_company_get_option( 'social_media_youtube' );
		$data_sticky = software_it_company_get_option( 'show_data_sticky_setting' );

		?>

		<div class="topheader">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
						<?php if( !empty($header_top_hiring_head) || !empty($header_top_hiring) || !empty($header_top_hiring_url) || !empty($header_top_hiring_text) ):?>
							<p class="mb-0 hiring-text"><span><?php echo esc_html($header_top_hiring_head);?></span> <?php echo esc_html($header_top_hiring);?> <a href="<?php echo esc_url($header_top_hiring_url);?>"><?php echo esc_html($header_top_hiring_text);?></a></p>
						<?php endif; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 text-md-right text-center align-self-center">
						<?php if( !empty($header_top_location) ):?>
							<span><span class="dashicons dashicons-location me-2"></span><?php echo esc_html($header_top_location);?></span>
						<?php endif; ?>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 align-self-center">
						<div class="social-links text-center text-md-right">
							<?php if( !empty($social_media_facebook) ):?>
								<a href="<?php echo esc_url($social_media_facebook);?>"><span class="dashicons dashicons-facebook-alt"></span></a>
							<?php endif; ?>
							<?php if( !empty($social_media_twitter) ):?>
								<a href="<?php echo esc_url($social_media_twitter);?>"><span class="dashicons dashicons-twitter"></span></a>
							<?php endif; ?>
							<?php if( !empty($social_media_instagram) ):?>
								<a href="<?php echo esc_url($social_media_instagram);?>"><span class="dashicons dashicons-instagram"></span></a>
							<?php endif; ?>
							<?php if( !empty($social_media_linkdin) ):?>
								<a href="<?php echo esc_url($social_media_linkdin);?>"><span class="dashicons dashicons-linkedin"></span></a>
							<?php endif; ?>
							<?php if( !empty($social_media_youtube) ):?>
								<a href="<?php echo esc_url($social_media_youtube);?>"><span class="dashicons dashicons-youtube"></span></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="middle-header" data-sticky= "<?php echo esc_attr($data_sticky); ?>">
			<div class="container">
				<div class="row">
				    <div class="col-xl-3 col-lg-12 col-md-4 align-self-center">
					    <div class="site-branding mb-3 mb-lg-0">
							<?php software_it_company_the_custom_logo(); ?>
							<?php $show_title = software_it_company_get_option( 'show_title' ); ?>
							<?php $show_tagline = software_it_company_get_option( 'show_tagline' ); ?>
							<?php if ( true === $show_title || true === $show_tagline ) :  ?>
								<div id="site-identity">
									<?php if ( true === $show_title ) :  ?>
										<?php if ( is_front_page() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( true === $show_tagline ) :  ?>
										<p class="site-description"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-6 align-self-center">
						<?php if(has_nav_menu('primary-menu')){?>
							<div class="toggle-menu gb_menu text-md-start">
								<button onclick="software_it_company_gb_Menu_open()" class="gb_toggle p-2"><?php esc_html_e('Menu','software-it-company'); ?></button>
							</div>
						<?php }?>
						<div id="gb_responsive" class="nav side_gb_nav">
							<nav id="top_gb_menu" class="gb_nav_menu" role="navigation" aria-label="<?php esc_attr_e( 'Menu', 'software-it-company' ); ?>">
								<?php 
								    wp_nav_menu( array( 
										'theme_location' => 'primary-menu',
										'container_class' => 'gb_navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav mb-0 px-0">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
								    ) ); 
								?>
								<a href="javascript:void(0)" class="closebtn gb_menu" onclick="software_it_company_gb_Menu_close()">x<span class="screen-reader-text"><?php esc_html_e('Close Menu','software-it-company'); ?></span></a>
							</nav>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-6 align-self-center text-md-end text-center info-wrap">
						<?php if( !empty($header_top_phone_text) || !empty($header_top_phone_number) ):?>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-3 align-self-center">
									<span class="dashicons dashicons-phone"></span>
								</div>
								<div class="col-lg-9 col-md-9 col-9 align-self-center">
									<p class="mb-0"><?php echo esc_html($header_top_phone_text);?></p>
									<span class="mb-0"><?php echo esc_html($header_top_phone_number);?></span>
								</div>
							</div>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>

	    <?php
	}

endif;

add_action( 'software_it_company_action_header', 'software_it_company_site_branding' );


/////////////////////////////////// copyright start /////////////////////////////

if ( ! function_exists( 'software_it_company_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function software_it_company_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'software_it_company_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = software_it_company_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'software_it_company_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

		// Powered by content.
		$powered_by_text = sprintf( __( 'Software IT Company by %s', 'software-it-company' ), '<span>' . __( 'Mizan Themes', 'software-it-company' ) . '</span>' );
		?>

		<div class="colophon-inner">
		    <?php if ( ! empty( $copyright_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
			    		<a href="<?php echo esc_url('https://www.mizanthemes.com/elementor/free-it-company-wordpress-theme/','software-it-company'); ?>"><?php echo $powered_by_text; ?></a>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		</div><!-- .colophon-inner -->

	    <?php
	}

endif;

add_action( 'software_it_company_action_footer', 'software_it_company_footer_copyright', 10 );

// /////////////////////////////////sidebar//////////////////


if ( ! function_exists( 'software_it_company_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function software_it_company_add_sidebar() {

		global $post;

		$global_layout = software_it_company_get_option( 'global_layout' );
		$global_layout = apply_filters( 'software_it_company_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'software_it_company_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}
		// Include Secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

		// Include Secondary sidebar 1.
		switch ( $global_layout ) {
			case 'four-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'software_it_company_action_sidebar', 'software_it_company_add_sidebar' );

//////////////////////////////////////// single page


if ( ! function_exists( 'software_it_company_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function software_it_company_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'software_it_company_theme_settings', true );
			$software_it_company_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $software_it_company_theme_settings_single_image ) {
				$software_it_company_theme_settings_single_image = software_it_company_get_option( 'single_image' );
			}

			if ( 'disable' !== $software_it_company_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $software_it_company_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'software_it_company_single_image', 'software_it_company_add_image_in_single_display' );

if ( ! function_exists( 'software_it_company_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function software_it_company_footer_goto_top() {
        
        $show_scroll_to_top = software_it_company_get_option( 'show_scroll_to_top' );
        if ( true === $show_scroll_to_top ) :
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'software-it-company' ) . '</span></i></a>';
		endif;

	}

endif;

add_action( 'software_it_company_action_after', 'software_it_company_footer_goto_top', 20 );