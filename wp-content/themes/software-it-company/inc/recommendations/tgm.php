<?php
	
require get_template_directory() . '/inc/recommendations/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function software_it_company_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Mizan Demo Importor', 'software-it-company' ),
			'slug'             => 'mizan-demo-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Royal Elementor Addons and Templates', 'software-it-company' ),
			'slug'             => 'royal-elementor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Prime Slider – Addons For Elementor (Revolution of a slider, Hero Slider, Media Slider, Drag Drop Slider, Video Slider, Product Slider, Ecommerce Slider)', 'software-it-company' ),
			'slug'             => 'bdthemes-prime-slider-lite',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	software_it_company_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'software_it_company_register_recommended_plugins' );