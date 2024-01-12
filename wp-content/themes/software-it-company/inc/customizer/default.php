<?php
/**
 * Default theme options.
 *
 * @package software_it_company
 */

if ( ! function_exists( 'software_it_company_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function software_it_company_get_default_theme_options() {

		$defaults = array();

		//General Option
        $defaults['show_scroll_to_top']          = true;
        $defaults['show_preloader_setting']      = false;
        $defaults['show_data_sticky_setting']    = false;

        //Post Option
        $defaults['show_post_date_setting']           = true;
        $defaults['show_post_heading_setting']        = true;
        $defaults['show_post_content_setting']        = true;

		// Header.
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = false;
		$defaults['show_social_in_header'] = false;
		$defaults['search_in_header']      = true;

		// Layout.
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';
		$defaults['single_image']            = 'large';

		// Home Page.
		$defaults['home_content_status'] = true;
		
		// Footer.
		$defaults['copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'software-it-company' );
		
		// Pass through filter.
		$defaults = apply_filters( 'software_it_company_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
