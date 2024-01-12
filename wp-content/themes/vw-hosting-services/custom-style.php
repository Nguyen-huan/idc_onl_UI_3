<?php

	$vw_hosting_services_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$vw_hosting_services_first_color = get_theme_mod('vw_hosting_services_first_color');

	if($vw_hosting_services_first_color != false){
		$vw_hosting_services_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar .widget_block h3, #sidebar h2, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.bradcrumbs a, .post-categories li a,.bradcrumbs span,.wp-block-button__link,#sidebar .wp-block-tag-cloud a:hover,#footer .wp-block-tag-cloud a:hover,#footer-2,.read-more a,#banner .slider-nav .slick-slide.slick-current.slick-active,.compare-btn a, .compare-btn-banner a,.more-btn a:hover, #comments a.comment-reply-link:hover, .pagination a:hover, #footer .tagcloud a:hover, .pro-button a:hover{';
			$vw_hosting_services_custom_css .='background: '.esc_attr($vw_hosting_services_first_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	if($vw_hosting_services_first_color != false){
		$vw_hosting_services_custom_css .='#sidebar ul li::before,#footer-2{';
			$vw_hosting_services_custom_css .='background: '.esc_attr($vw_hosting_services_first_color).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	if($vw_hosting_services_first_color != false){
		$vw_hosting_services_custom_css .='a, .main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item, .main-navigation li a:hover,.main-navigation ul li.current_page_item a, .main-navigation li a:hover, .main-navigation ul ul li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover,p.site-title a:hover, .logo h1 a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a,#best-product-section .product-box:hover .product-box-content h3 a{';
			$vw_hosting_services_custom_css .='color: '.esc_attr($vw_hosting_services_first_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	if($vw_hosting_services_first_color != false){
		$vw_hosting_services_custom_css .='.home-page-header,.main-navigation ul ul{';
			$vw_hosting_services_custom_css .='border-color: '.esc_attr($vw_hosting_services_first_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	if($vw_hosting_services_first_color != false){
		$vw_hosting_services_custom_css .='.main-navigation ul ul, .main-navigation ul li.current_page_item a{';
			$vw_hosting_services_custom_css .='border-bottom:2px solid '.esc_attr($vw_hosting_services_first_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_custom_css .='}';
	/*---------------------------Width Layout -------------------*/

	$vw_hosting_services_theme_lay = get_theme_mod( 'vw_hosting_services_width_option','Full Width');
    if($vw_hosting_services_theme_lay == 'Boxed'){
		$vw_hosting_services_custom_css .='body{';
			$vw_hosting_services_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='right: 100px;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.row.outer-logo{';
			$vw_hosting_services_custom_css .='margin-left: 0px;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_theme_lay == 'Wide Width'){
		$vw_hosting_services_custom_css .='body{';
			$vw_hosting_services_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='right: 30px;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.row.outer-logo{';
			$vw_hosting_services_custom_css .='margin-left: 0px;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_theme_lay == 'Full Width'){
		$vw_hosting_services_custom_css .='body{';
			$vw_hosting_services_custom_css .='max-width: 100%;';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_hosting_services_resp_slider = get_theme_mod( 'vw_hosting_services_resp_slider_hide_show',true);
	if($vw_hosting_services_resp_slider == true && get_theme_mod( 'vw_hosting_services_slider_hide_show', false) == false){
    	$vw_hosting_services_custom_css .='#slider{';
			$vw_hosting_services_custom_css .='display:none;';
		$vw_hosting_services_custom_css .='} ';
	}
    if($vw_hosting_services_resp_slider == true){
    	$vw_hosting_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_hosting_services_custom_css .='#slider{';
			$vw_hosting_services_custom_css .='display:block;';
		$vw_hosting_services_custom_css .='} }';
	}else if($vw_hosting_services_resp_slider == false){
		$vw_hosting_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_hosting_services_custom_css .='#slider{';
			$vw_hosting_services_custom_css .='display:none;';
		$vw_hosting_services_custom_css .='} }';
		$vw_hosting_services_custom_css .='@media screen and (max-width:575px){';
		$vw_hosting_services_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_hosting_services_custom_css .='margin-top: 45px;';
		$vw_hosting_services_custom_css .='} }';
	}

	$vw_hosting_services_resp_sidebar = get_theme_mod( 'vw_hosting_services_sidebar_hide_show',true);
    if($vw_hosting_services_resp_sidebar == true){
    	$vw_hosting_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_hosting_services_custom_css .='#sidebar{';
			$vw_hosting_services_custom_css .='display:block;';
		$vw_hosting_services_custom_css .='} }';
	}else if($vw_hosting_services_resp_sidebar == false){
		$vw_hosting_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_hosting_services_custom_css .='#sidebar{';
			$vw_hosting_services_custom_css .='display:none;';
		$vw_hosting_services_custom_css .='} }';
	}

	$vw_hosting_services_resp_scroll_top = get_theme_mod( 'vw_hosting_services_resp_scroll_top_hide_show',true);
	if($vw_hosting_services_resp_scroll_top == true && get_theme_mod( 'vw_hosting_services_hide_show_scroll',true) == false){
    	$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='visibility:hidden !important;';
		$vw_hosting_services_custom_css .='} ';
	}
    if($vw_hosting_services_resp_scroll_top == true){
    	$vw_hosting_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='visibility:visible !important;';
		$vw_hosting_services_custom_css .='} }';
	}else if($vw_hosting_services_resp_scroll_top == false){
		$vw_hosting_services_custom_css .='@media screen and (max-width:575px){';
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='visibility:hidden !important;';
		$vw_hosting_services_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_hosting_services_copyright_alingment = get_theme_mod('vw_hosting_services_copyright_alingment');
	if($vw_hosting_services_copyright_alingment != false){
		$vw_hosting_services_custom_css .='.copyright p{';
			$vw_hosting_services_custom_css .='text-align: '.esc_attr($vw_hosting_services_copyright_alingment).';';
		$vw_hosting_services_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$vw_hosting_services_preloader_bg_color = get_theme_mod('vw_hosting_services_preloader_bg_color');
	if($vw_hosting_services_preloader_bg_color != false){
		$vw_hosting_services_custom_css .='#preloader{';
			$vw_hosting_services_custom_css .='background-color: '.esc_attr($vw_hosting_services_preloader_bg_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_preloader_border_color = get_theme_mod('vw_hosting_services_preloader_border_color');
	if($vw_hosting_services_preloader_border_color != false){
		$vw_hosting_services_custom_css .='.loader-line{';
			$vw_hosting_services_custom_css .='border-color: '.esc_attr($vw_hosting_services_preloader_border_color).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	// banner background img

	$vw_hosting_services_banner_image = get_theme_mod('vw_hosting_services_banner_image');
	if($vw_hosting_services_banner_image != false){
		$vw_hosting_services_custom_css .='#banner{';
			$vw_hosting_services_custom_css .='background: url('.esc_url($vw_hosting_services_banner_image).');';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------- Banner -----------------*/

	$vw_hosting_services_show_hide_banner = get_theme_mod('vw_hosting_services_show_hide_banner');
	if($vw_hosting_services_show_hide_banner == false){
		$vw_hosting_services_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_hosting_services_custom_css .='position: static;box-shadow: #00000029 0 4px 12px; background-color: #fff; padding: 30px 0 0 0;margin-top:0;';
		$vw_hosting_services_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_hosting_services_copyright_alingment = get_theme_mod('vw_hosting_services_copyright_alingment');
	if($vw_hosting_services_copyright_alingment != false){
		$vw_hosting_services_custom_css .='.copyright p{';
			$vw_hosting_services_custom_css .='text-align: '.esc_attr($vw_hosting_services_copyright_alingment).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_copyright_background_color = get_theme_mod('vw_hosting_services_copyright_background_color');
	if($vw_hosting_services_copyright_background_color != false){
		$vw_hosting_services_custom_css .='#footer-2{';
			$vw_hosting_services_custom_css .='background-color: '.esc_attr($vw_hosting_services_copyright_background_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_background_color = get_theme_mod('vw_hosting_services_footer_background_color');
	if($vw_hosting_services_footer_background_color != false){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='background-color: '.esc_attr($vw_hosting_services_footer_background_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_widgets_heading = get_theme_mod( 'vw_hosting_services_footer_widgets_heading','Left');
    if($vw_hosting_services_footer_widgets_heading == 'Left'){
		$vw_hosting_services_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_hosting_services_custom_css .='text-align: left;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_footer_widgets_heading == 'Center'){
		$vw_hosting_services_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_hosting_services_custom_css .='text-align: center;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_footer_widgets_heading == 'Right'){
		$vw_hosting_services_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_hosting_services_custom_css .='text-align: right;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_widgets_content = get_theme_mod( 'vw_hosting_services_footer_widgets_content','Left');
    if($vw_hosting_services_footer_widgets_content == 'Left'){
		$vw_hosting_services_custom_css .='#footer .widget{';
		$vw_hosting_services_custom_css .='text-align: left;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_footer_widgets_content == 'Center'){
		$vw_hosting_services_custom_css .='#footer .widget{';
			$vw_hosting_services_custom_css .='text-align: center;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_footer_widgets_content == 'Right'){
		$vw_hosting_services_custom_css .='#footer .widget{';
			$vw_hosting_services_custom_css .='text-align: right;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_copyright_font_size = get_theme_mod('vw_hosting_services_copyright_font_size');
	if($vw_hosting_services_copyright_font_size != false){
		$vw_hosting_services_custom_css .='#footer-2 a, #footer-2 p{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_copyright_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_copyright_alingment = get_theme_mod('vw_hosting_services_copyright_alingment');
	if($vw_hosting_services_copyright_alingment != false){
		$vw_hosting_services_custom_css .='#footer-2 p{';
			$vw_hosting_services_custom_css .='text-align: '.esc_attr($vw_hosting_services_copyright_alingment).';';
		$vw_hosting_services_custom_css .='}';
	}
	$vw_hosting_services_copyright_padding_top_bottom = get_theme_mod('vw_hosting_services_copyright_padding_top_bottom');
	if($vw_hosting_services_copyright_padding_top_bottom != false){
		$vw_hosting_services_custom_css .='#footer-2{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_hosting_services_copyright_padding_top_bottom).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_padding = get_theme_mod('vw_hosting_services_footer_padding');
	if($vw_hosting_services_footer_padding != false){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='padding: '.esc_attr($vw_hosting_services_footer_padding).' 0;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_icon = get_theme_mod('vw_hosting_services_footer_icon');
	if($vw_hosting_services_footer_icon == false){
		$vw_hosting_services_custom_css .='#footer-2 p{';
			$vw_hosting_services_custom_css .='width:100%; text-align:center; float:none;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_background_image = get_theme_mod('vw_hosting_services_footer_background_image');
	if($vw_hosting_services_footer_background_image != false){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='background: url('.esc_attr($vw_hosting_services_footer_background_image).');';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_theme_lay = get_theme_mod( 'vw_hosting_services_img_footer','scroll');
	if($vw_hosting_services_theme_lay == 'fixed'){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$vw_hosting_services_custom_css .='}';
	}elseif ($vw_hosting_services_theme_lay == 'scroll'){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_footer_img_position = get_theme_mod('vw_hosting_services_footer_img_position','center center');
	if($vw_hosting_services_footer_img_position != false){
		$vw_hosting_services_custom_css .='#footer{';
			$vw_hosting_services_custom_css .='background-position: '.esc_attr($vw_hosting_services_footer_img_position).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_hosting_services_scroll_to_top_font_size = get_theme_mod('vw_hosting_services_scroll_to_top_font_size');
	if($vw_hosting_services_scroll_to_top_font_size != false){
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_scroll_to_top_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_scroll_to_top_padding = get_theme_mod('vw_hosting_services_scroll_to_top_padding');
	$vw_hosting_services_scroll_to_top_padding = get_theme_mod('vw_hosting_services_scroll_to_top_padding');
	if($vw_hosting_services_scroll_to_top_padding != false){
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_hosting_services_scroll_to_top_padding).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_scroll_to_top_width = get_theme_mod('vw_hosting_services_scroll_to_top_width');
	if($vw_hosting_services_scroll_to_top_width != false){
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='width: '.esc_attr($vw_hosting_services_scroll_to_top_width).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_scroll_to_top_height = get_theme_mod('vw_hosting_services_scroll_to_top_height');
	if($vw_hosting_services_scroll_to_top_height != false){
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='height: '.esc_attr($vw_hosting_services_scroll_to_top_height).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_scroll_to_top_border_radius = get_theme_mod('vw_hosting_services_scroll_to_top_border_radius');
	if($vw_hosting_services_scroll_to_top_border_radius != false){
		$vw_hosting_services_custom_css .='.scrollup i{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_scroll_to_top_border_radius).'px;';
		$vw_hosting_services_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_hosting_services_logo_padding = get_theme_mod('vw_hosting_services_logo_padding');
	if($vw_hosting_services_logo_padding != false){
		$vw_hosting_services_custom_css .='.logo{';
			$vw_hosting_services_custom_css .='padding: '.esc_attr($vw_hosting_services_logo_padding).' !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_logo_margin = get_theme_mod('vw_hosting_services_logo_margin');
	if($vw_hosting_services_logo_margin != false){
		$vw_hosting_services_custom_css .='.logo{';
			$vw_hosting_services_custom_css .='margin: '.esc_attr($vw_hosting_services_logo_margin).';';
		$vw_hosting_services_custom_css .='}';
	}

	// Site title Font Size
	$vw_hosting_services_site_title_font_size = get_theme_mod('vw_hosting_services_site_title_font_size');
	if($vw_hosting_services_site_title_font_size != false){
		$vw_hosting_services_custom_css .='.logo p.site-title, .logo h1{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_site_title_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_hosting_services_site_tagline_font_size = get_theme_mod('vw_hosting_services_site_tagline_font_size');
	if($vw_hosting_services_site_tagline_font_size != false){
		$vw_hosting_services_custom_css .='.logo p.site-description{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_site_tagline_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_site_title_color = get_theme_mod('vw_hosting_services_site_title_color');
	if($vw_hosting_services_site_title_color != false){
		$vw_hosting_services_custom_css .='p.site-title a, .logo h1 a{';
			$vw_hosting_services_custom_css .='color: '.esc_attr($vw_hosting_services_site_title_color).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_site_tagline_color = get_theme_mod('vw_hosting_services_site_tagline_color');
	if($vw_hosting_services_site_tagline_color != false){
		$vw_hosting_services_custom_css .='.logo p.site-description{';
			$vw_hosting_services_custom_css .='color: '.esc_attr($vw_hosting_services_site_tagline_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_logo_width = get_theme_mod('vw_hosting_services_logo_width');
	if($vw_hosting_services_logo_width != false){
		$vw_hosting_services_custom_css .='.logo img{';
			$vw_hosting_services_custom_css .='width: '.esc_attr($vw_hosting_services_logo_width).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_logo_height = get_theme_mod('vw_hosting_services_logo_height');
	if($vw_hosting_services_logo_height != false){
		$vw_hosting_services_custom_css .='.logo img{';
			$vw_hosting_services_custom_css .='height: '.esc_attr($vw_hosting_services_logo_height).';';
		$vw_hosting_services_custom_css .='}';
	}

	// Header Background Color
	$vw_hosting_services_header_background_color = get_theme_mod('vw_hosting_services_header_background_color');
	if($vw_hosting_services_header_background_color != false){
		$vw_hosting_services_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_hosting_services_custom_css .='background-color: '.esc_attr($vw_hosting_services_header_background_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_header_img_position = get_theme_mod('vw_hosting_services_header_img_position','center top');
	if($vw_hosting_services_header_img_position != false){
		$vw_hosting_services_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_hosting_services_custom_css .='background-position: '.esc_attr($vw_hosting_services_header_img_position).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_hosting_services_theme_lay = get_theme_mod( 'vw_hosting_services_blog_layout_option','Default');
    if($vw_hosting_services_theme_lay == 'Default'){
		$vw_hosting_services_custom_css .='.post-main-box{';
			$vw_hosting_services_custom_css .='';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_theme_lay == 'Center'){
		$vw_hosting_services_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_hosting_services_custom_css .='text-align:center;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.post-info{';
			$vw_hosting_services_custom_css .='margin-top:10px;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.post-info hr{';
			$vw_hosting_services_custom_css .='margin:15px auto;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_theme_lay == 'Left'){
		$vw_hosting_services_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_hosting_services_custom_css .='text-align:Left;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.post-info hr{';
			$vw_hosting_services_custom_css .='margin-bottom:10px;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.post-main-box h2{';
			$vw_hosting_services_custom_css .='margin-top:10px;';
		$vw_hosting_services_custom_css .='}';
		$vw_hosting_services_custom_css .='.service-text .more-btn{';
			$vw_hosting_services_custom_css .='display:inline-block;';
		$vw_hosting_services_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_hosting_services_blog_page_posts_settings = get_theme_mod( 'vw_hosting_services_blog_page_posts_settings','Into Blocks');
    if($vw_hosting_services_blog_page_posts_settings == 'Without Blocks'){
		$vw_hosting_services_custom_css .='.post-main-box{';
			$vw_hosting_services_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_hosting_services_custom_css .='}';
	}

	// featured image dimention
	$vw_hosting_services_blog_post_featured_image_dimension = get_theme_mod('vw_hosting_services_blog_post_featured_image_dimension', 'default');
	$vw_hosting_services_blog_post_featured_image_custom_width = get_theme_mod('vw_hosting_services_blog_post_featured_image_custom_width',250);
	$vw_hosting_services_blog_post_featured_image_custom_height = get_theme_mod('vw_hosting_services_blog_post_featured_image_custom_height',250);
	if($vw_hosting_services_blog_post_featured_image_dimension == 'custom'){
		$vw_hosting_services_custom_css .='.post-main-box img{';
			$vw_hosting_services_custom_css .='width: '.esc_attr($vw_hosting_services_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($vw_hosting_services_blog_post_featured_image_custom_height).';';
		$vw_hosting_services_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$vw_hosting_services_featured_image_border_radius = get_theme_mod('vw_hosting_services_featured_image_border_radius', 0);
	if($vw_hosting_services_featured_image_border_radius != false){
		$vw_hosting_services_custom_css .='.box-image img, .feature-box img{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_featured_image_border_radius).'px;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_featured_image_box_shadow = get_theme_mod('vw_hosting_services_featured_image_box_shadow',0);
	if($vw_hosting_services_featured_image_box_shadow != false){
		$vw_hosting_services_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_hosting_services_custom_css .='box-shadow: '.esc_attr($vw_hosting_services_featured_image_box_shadow).'px '.esc_attr($vw_hosting_services_featured_image_box_shadow).'px '.esc_attr($vw_hosting_services_featured_image_box_shadow).'px #cccccc;';
		$vw_hosting_services_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_hosting_services_button_letter_spacing = get_theme_mod('vw_hosting_services_button_letter_spacing',14);
	$vw_hosting_services_custom_css .='.post-main-box .more-btn{';
		$vw_hosting_services_custom_css .='letter-spacing: '.esc_attr($vw_hosting_services_button_letter_spacing).';';
	$vw_hosting_services_custom_css .='}';

	$vw_hosting_services_button_border_radius = get_theme_mod('vw_hosting_services_button_border_radius');
	if($vw_hosting_services_button_border_radius != false){
		$vw_hosting_services_custom_css .='.post-main-box .more-btn a{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_button_border_radius).'px !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_button_top_bottom_padding = get_theme_mod('vw_hosting_services_button_top_bottom_padding');
	$vw_hosting_services_button_left_right_padding = get_theme_mod('vw_hosting_services_button_left_right_padding');
	if($vw_hosting_services_button_top_bottom_padding != false || $vw_hosting_services_button_left_right_padding != false){
		$vw_hosting_services_custom_css .='.post-main-box .more-btn{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($vw_hosting_services_button_top_bottom_padding).'!important;padding-left: '.esc_attr($vw_hosting_services_button_left_right_padding).'!important;padding-right: '.esc_attr($vw_hosting_services_button_left_right_padding).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_button_font_size = get_theme_mod('vw_hosting_services_button_font_size',14);
	$vw_hosting_services_custom_css .='.post-main-box .more-btn a{';
		$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_button_font_size).';';
	$vw_hosting_services_custom_css .='}';

	$vw_hosting_services_theme_lay = get_theme_mod( 'vw_hosting_services_button_text_transform','Capitalize');
	if($vw_hosting_services_theme_lay == 'Capitalize'){
		$vw_hosting_services_custom_css .='.post-main-box .more-btn a{';
			$vw_hosting_services_custom_css .='text-transform:Capitalize;';
		$vw_hosting_services_custom_css .='}';
	}
	if($vw_hosting_services_theme_lay == 'Lowercase'){
		$vw_hosting_services_custom_css .='.post-main-box .more-btn a{';
			$vw_hosting_services_custom_css .='text-transform:Lowercase;';
		$vw_hosting_services_custom_css .='}';
	}
	if($vw_hosting_services_theme_lay == 'Uppercase'){
		$vw_hosting_services_custom_css .='.post-main-box .more-btn a{';
			$vw_hosting_services_custom_css .='text-transform:Uppercase;';
		$vw_hosting_services_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$vw_hosting_services_single_blog_comment_button_text = get_theme_mod('vw_hosting_services_single_blog_comment_button_text', 'Post Comment');
	if($vw_hosting_services_single_blog_comment_button_text == ''){
		$vw_hosting_services_custom_css .='#comments p.form-submit {';
			$vw_hosting_services_custom_css .='display: none;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_comment_width = get_theme_mod('vw_hosting_services_single_blog_comment_width');
	if($vw_hosting_services_comment_width != false){
		$vw_hosting_services_custom_css .='#comments textarea{';
			$vw_hosting_services_custom_css .='width: '.esc_attr($vw_hosting_services_comment_width).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_single_blog_post_navigation_show_hide = get_theme_mod('vw_hosting_services_single_blog_post_navigation_show_hide',true);
	if($vw_hosting_services_single_blog_post_navigation_show_hide != true){
		$vw_hosting_services_custom_css .='.post-navigation{';
			$vw_hosting_services_custom_css .='display: none;';
		$vw_hosting_services_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_hosting_services_display_grid_posts_settings = get_theme_mod( 'vw_hosting_services_display_grid_posts_settings','Into Blocks');
    if($vw_hosting_services_display_grid_posts_settings == 'Without Blocks'){
		$vw_hosting_services_custom_css .='.grid-post-main-box{';
			$vw_hosting_services_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_hosting_services_custom_css .='}';
	}

	// banner background img

	$vw_hosting_services_banner_image = get_theme_mod('vw_hosting_services_banner_image');
	if($vw_hosting_services_banner_image != false){
		$vw_hosting_services_custom_css .='#banner{';
			$vw_hosting_services_custom_css .='background: url('.esc_url($vw_hosting_services_banner_image).');';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_preloader_bg_img = get_theme_mod('vw_hosting_services_preloader_bg_img');
	if($vw_hosting_services_preloader_bg_img != false){
		$vw_hosting_services_custom_css .='#preloader{';
			$vw_hosting_services_custom_css .='background: url('.esc_attr($vw_hosting_services_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_hosting_services_social_icon_font_size = get_theme_mod('vw_hosting_services_social_icon_font_size');
	if($vw_hosting_services_social_icon_font_size != false){
		$vw_hosting_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_social_icon_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_social_icon_padding = get_theme_mod('vw_hosting_services_social_icon_padding');
	if($vw_hosting_services_social_icon_padding != false){
		$vw_hosting_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_hosting_services_custom_css .='padding: '.esc_attr($vw_hosting_services_social_icon_padding).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_social_icon_width = get_theme_mod('vw_hosting_services_social_icon_width');
	if($vw_hosting_services_social_icon_width != false){
		$vw_hosting_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_hosting_services_custom_css .='width: '.esc_attr($vw_hosting_services_social_icon_width).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_social_icon_height = get_theme_mod('vw_hosting_services_social_icon_height');
	if($vw_hosting_services_social_icon_height != false){
		$vw_hosting_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_hosting_services_custom_css .='height: '.esc_attr($vw_hosting_services_social_icon_height).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_social_icon_border_radius = get_theme_mod('vw_hosting_services_social_icon_border_radius');
	if($vw_hosting_services_social_icon_border_radius != false){
		$vw_hosting_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_social_icon_border_radius).'px;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_hosting_services_resp_menu_toggle_btn_bg_color');
	if($vw_hosting_services_resp_menu_toggle_btn_bg_color != false){
		$vw_hosting_services_custom_css .='.toggle-nav i{';
			$vw_hosting_services_custom_css .='background: '.esc_attr($vw_hosting_services_resp_menu_toggle_btn_bg_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_grid_featured_image_box_shadow = get_theme_mod('vw_hosting_services_grid_featured_image_box_shadow',0);
	if($vw_hosting_services_grid_featured_image_box_shadow != false){
		$vw_hosting_services_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$vw_hosting_services_custom_css .='box-shadow: '.esc_attr($vw_hosting_services_grid_featured_image_box_shadow).'px '.esc_attr($vw_hosting_services_grid_featured_image_box_shadow).'px '.esc_attr($vw_hosting_services_grid_featured_image_box_shadow).'px #cccccc;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_hosting_services_resp_menu_toggle_btn_bg_color');
	if($vw_hosting_services_resp_menu_toggle_btn_bg_color != false){
		$vw_hosting_services_custom_css .='.toggle-nav i{';
			$vw_hosting_services_custom_css .='background: '.esc_attr($vw_hosting_services_resp_menu_toggle_btn_bg_color).';';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_hosting_services_related_product_show_hide = get_theme_mod('vw_hosting_services_related_product_show_hide',true);
	if($vw_hosting_services_related_product_show_hide != true){
		$vw_hosting_services_custom_css .='.related.products{';
			$vw_hosting_services_custom_css .='display: none;';
		$vw_hosting_services_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_hosting_services_products_padding_top_bottom = get_theme_mod('vw_hosting_services_products_padding_top_bottom');
	if($vw_hosting_services_products_padding_top_bottom != false){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_hosting_services_products_padding_top_bottom).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_padding_left_right = get_theme_mod('vw_hosting_services_products_padding_left_right');
	if($vw_hosting_services_products_padding_left_right != false){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_hosting_services_custom_css .='padding-left: '.esc_attr($vw_hosting_services_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_hosting_services_products_padding_left_right).'!important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_box_shadow = get_theme_mod('vw_hosting_services_products_box_shadow');
	if($vw_hosting_services_products_box_shadow != false){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_hosting_services_custom_css .='box-shadow: '.esc_attr($vw_hosting_services_products_box_shadow).'px '.esc_attr($vw_hosting_services_products_box_shadow).'px '.esc_attr($vw_hosting_services_products_box_shadow).'px #ddd;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_border_radius = get_theme_mod('vw_hosting_services_products_border_radius');
	if($vw_hosting_services_products_border_radius != false){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_products_border_radius).'px;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_btn_padding_top_bottom = get_theme_mod('vw_hosting_services_products_btn_padding_top_bottom');
	if($vw_hosting_services_products_btn_padding_top_bottom != false){
		$vw_hosting_services_custom_css .='.woocommerce a.button{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_hosting_services_products_btn_padding_top_bottom).' !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_btn_padding_left_right = get_theme_mod('vw_hosting_services_products_btn_padding_left_right');
	if($vw_hosting_services_products_btn_padding_left_right != false){
		$vw_hosting_services_custom_css .='.woocommerce a.button{';
			$vw_hosting_services_custom_css .='padding-left: '.esc_attr($vw_hosting_services_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_hosting_services_products_btn_padding_left_right).' !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_products_button_border_radius = get_theme_mod('vw_hosting_services_products_button_border_radius', 0);
	if($vw_hosting_services_products_button_border_radius != false){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_products_button_border_radius).'px !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_woocommerce_sale_position = get_theme_mod( 'vw_hosting_services_woocommerce_sale_position','right');
    if($vw_hosting_services_woocommerce_sale_position == 'left'){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_hosting_services_custom_css .='left: 12px !important; right: auto !important;';
		$vw_hosting_services_custom_css .='}';
	}else if($vw_hosting_services_woocommerce_sale_position == 'right'){
		$vw_hosting_services_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_hosting_services_custom_css .='left: auto!important; right: 0 !important;';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_woocommerce_sale_font_size = get_theme_mod('vw_hosting_services_woocommerce_sale_font_size');
	if($vw_hosting_services_woocommerce_sale_font_size != false){
		$vw_hosting_services_custom_css .='.woocommerce span.onsale{';
			$vw_hosting_services_custom_css .='font-size: '.esc_attr($vw_hosting_services_woocommerce_sale_font_size).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_hosting_services_woocommerce_sale_padding_top_bottom');
	if($vw_hosting_services_woocommerce_sale_padding_top_bottom != false){
		$vw_hosting_services_custom_css .='.woocommerce span.onsale{';
			$vw_hosting_services_custom_css .='padding-top: '.esc_attr($vw_hosting_services_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_hosting_services_woocommerce_sale_padding_top_bottom).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_woocommerce_sale_padding_left_right = get_theme_mod('vw_hosting_services_woocommerce_sale_padding_left_right');
	if($vw_hosting_services_woocommerce_sale_padding_left_right != false){
		$vw_hosting_services_custom_css .='.woocommerce span.onsale{';
			$vw_hosting_services_custom_css .='padding-left: '.esc_attr($vw_hosting_services_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_hosting_services_woocommerce_sale_padding_left_right).';';
		$vw_hosting_services_custom_css .='}';
	}

	$vw_hosting_services_woocommerce_sale_border_radius = get_theme_mod('vw_hosting_services_woocommerce_sale_border_radius', 0);
	if($vw_hosting_services_woocommerce_sale_border_radius != false){
		$vw_hosting_services_custom_css .='.woocommerce span.onsale{';
			$vw_hosting_services_custom_css .='border-radius: '.esc_attr($vw_hosting_services_woocommerce_sale_border_radius).'px;';
		$vw_hosting_services_custom_css .='}';
	}
