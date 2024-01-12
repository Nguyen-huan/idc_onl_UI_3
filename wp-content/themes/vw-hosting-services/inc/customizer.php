<?php
/**
 * VW Hosting Services Theme Customizer
 *
 * @package VW Hosting Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_hosting_services_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_hosting_services_custom_controls' );

function vw_hosting_services_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_hosting_services_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_hosting_services_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_hosting_services_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'vw-hosting-services' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('vw_hosting_services_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-hosting-services'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_hosting_services_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-hosting-services'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-hosting-services' ),
			'center top'   => esc_html__( 'Top', 'vw-hosting-services' ),
			'right top'   => esc_html__( 'Top Right', 'vw-hosting-services' ),
			'left center'   => esc_html__( 'Left', 'vw-hosting-services' ),
			'center center'   => esc_html__( 'Center', 'vw-hosting-services' ),
			'right center'   => esc_html__( 'Right', 'vw-hosting-services' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-hosting-services' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-hosting-services' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-hosting-services' ),
		),
		));

	//Topbar
	$wp_customize->add_section('vw_hosting_services_topbar_section' , array(
  		'title' => __( 'Topbar Section', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_panel_id'
	) );

	$wp_customize->add_setting( 'vw_hosting_services_header_topbar',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_header_topbar',array(
      	'label' => esc_html__( 'Show / Hide Topbar','vw-hosting-services' ),
      	'section' => 'vw_hosting_services_topbar_section'
    )));

	$wp_customize->add_setting('vw_hosting_services_offer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_offer_text',array(
		'label'	=> esc_html__('Add Offer Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '"Unbelievable Deal: Get 70% OFF on Select Items - Limited Time Offer!"', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_topbar_section',
		'type'=> 'text'
	));

	//Banner
	$wp_customize->add_section( 'vw_hosting_services_slidersettings' , array(
  		'title'      => __( 'Banner Settings', 'vw-hosting-services' ),
  		'description' => __('For more options of banner section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/hosting-wordpress-theme/">GO PRO</a>','vw-hosting-services'),
			'panel' => 'vw_hosting_services_panel_id'
	) );

	$wp_customize->add_setting( 'vw_hosting_services_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ));
 	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_slider_hide_show',array(
	    'label' => esc_html__( 'Show / Hide Banner','vw-hosting-services' ),
	    'section' => 'vw_hosting_services_slidersettings'
  	)));

	$wp_customize->add_setting('vw_hosting_services_banner_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_hosting_services_banner_image',array(
        'label' => __('Banner Background Image','vw-hosting-services'),
        'description' => __('Image size (1400px x 750px)','vw-hosting-services'),
        'section' => 'vw_hosting_services_slidersettings'
	)));

	$wp_customize->add_setting( 'vw_hosting_services_slider_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_hosting_services_slider_small_title', array(
		'label'    => __( 'Add Section Text', 'vw-hosting-services' ),
		'section'  => 'vw_hosting_services_slidersettings',
		'input_attrs' => array(
            'placeholder' => esc_html__( 'MEET HOSTING', 'vw-hosting-services' ),
        ),
		'type'     => 'text'
	) );

   $wp_customize->add_setting('vw_hosting_services_banner_tagline_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hosting_services_banner_tagline_title',array(
		'label'	=> __('Banner Title','vw-hosting-services'),
		'section'	=> 'vw_hosting_services_slidersettings',
		'input_attrs' => array(
            'placeholder' => __( 'Security, reliability and speed every where', 'vw-hosting-services' ),
        ),
		'type'		=> 'text'
	));

	 $wp_customize->add_setting('vw_hosting_services_banner_para_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_hosting_services_banner_para_text',array(
		'label'	=> __('Banner Small Text','vw-hosting-services'),
		'section'	=> 'vw_hosting_services_slidersettings',
		'type'		=> 'text',
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing', 'vw-hosting-services' ),
        ),
	));

	$wp_customize->add_setting('vw_hosting_services_slider_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-hosting-services'),
		'input_attrs' => array(
    'placeholder' => __( 'READ MORE', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_slidersettings',
		'type'=> 'text',
	));

	$args = array(
       	'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_hosting_services_product_time_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_hosting_services_sanitize_choices',
	));
	$wp_customize->add_control('vw_hosting_services_product_time_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Product Time Category','vw-hosting-services'),
		'section' => 'vw_hosting_services_slidersettings',
	));

	$wp_customize->add_setting('vw_hosting_services_product_clock_timer_end', array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_hosting_services_product_clock_timer_end', array(
		'label' => __('Enter End Date of Timer','vw-hosting-services'),
		'section' => 'vw_hosting_services_slidersettings',
		'description' => __('Timer get the current date and time. So you just need to add the end date. Please Use the following format to add the date "Month date year hours:minutes:seconds" example "November 30 2023 11:00:00".','vw-hosting-services'),
		'type'=> 'text',
	));

	$wp_customize->add_setting('vw_hosting_services_product_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_product_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Claim Deal', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_time_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_hosting_services_time_btn_link',array(
		'label'	=> esc_html__('Add Button Link','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example.com', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_slidersettings',
		'type'=> 'url'
	));

	//domain-serach Section
	$wp_customize->add_section('vw_hosting_services_domain_serach_section', array(
		'title'       => __('Domain Serach Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_domain_serach_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_domain_serach_text',array(
		'description' => __('<p>1. More options for domain serach section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for domain serach section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_domain_serach_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_domain_serach_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_domain_serach_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_domain_serach_section',
		'type'=> 'hidden'
	));

	// Products Section
	$wp_customize->add_section( 'vw_hosting_services_product_section' , array(
    	'title'      => __( 'Products Section', 'vw-hosting-services' ),
		'priority'   => null,
		'description' => __('For more options of product section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/hosting-wordpress-theme/">GO PRO</a>','vw-hosting-services'),
		'panel' => 'vw_hosting_services_panel_id'
	) );

	$wp_customize->add_setting( 'vw_hosting_services_product_hide_show',array(
	    'default' => 0,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_product_hide_show',array(
		'label' => esc_html__( 'Show / Hide Product Section','vw-hosting-services' ),
		'section' => 'vw_hosting_services_product_section'
	)));

	$wp_customize->add_setting('vw_hosting_services_product_heading_product',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_product_heading_product',array(
		'label'	=> __('Add Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Choose Your Hosting Plan', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_product_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_product_title',array(
		'label'	=> __('Add Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_services_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_services_number',array(
		'label'	=> esc_html__('No of Tabs to show','vw-hosting-services'),
		'section'=> 'vw_hosting_services_product_section',
		'type'=> 'number'
	));

	$vw_hosting_services_featured_post = get_theme_mod('vw_hosting_services_services_number','');
    for ( $vw_hosting_services_j = 1; $vw_hosting_services_j <= $vw_hosting_services_featured_post; $vw_hosting_services_j++ ) {
		$wp_customize->add_setting('vw_hosting_services_services_text'.$vw_hosting_services_j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_hosting_services_services_text'.$vw_hosting_services_j,array(
			'label'	=> esc_html__('Tab ','vw-hosting-services').$vw_hosting_services_j,
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'All', 'vw-hosting-services' ),
	        ),
			'section'=> 'vw_hosting_services_product_section',
			'type'=> 'text'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
	$cat_posts = array();
	$i = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_hosting_services_product_settings'.$vw_hosting_services_j,array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_hosting_services_sanitize_choices',
	));
	$wp_customize->add_control('vw_hosting_services_product_settings'.$vw_hosting_services_j,array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Products','vw-hosting-services'),
		'section' => 'vw_hosting_services_product_section',
	));
	}

	$wp_customize->add_setting( 'vw_hosting_services_product_excerpt_number', array(
		'default'              => 5,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_product_excerpt_number', array(
		'label'       => esc_html__( 'Product Excerpt length','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_product_section',
		'type'        => 'range',
		'settings'    => 'vw_hosting_services_product_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//world Map Section
	$wp_customize->add_section('vw_hosting_services_world_Map_section', array(
		'title'       => __('World Map Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_world_Map_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_world_Map_text',array(
		'description' => __('<p>1. More options for world Map section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for world Map section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_world_Map_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_world_Map_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_world_Map_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_world_Map_section',
		'type'=> 'hidden'
	));

	//Our Services Section
	$wp_customize->add_section('vw_hosting_services_ourServices_section', array(
		'title'       => __('Our Services Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_ourServices_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_ourServices_text',array(
		'description' => __('<p>1. More options for our services section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our services section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_ourServices_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_ourServices_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_ourServices_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_ourServices_section',
		'type'=> 'hidden'
	));

	//security featuress Section
	$wp_customize->add_section('vw_hosting_services_security_featuress_section', array(
		'title'       => __('Security Featuress Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_security_featuress_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_security_featuress_text',array(
		'description' => __('<p>1. More options for security featuress section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for security featuress section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_security_featuress_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_security_featuress_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_security_featuress_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_security_featuress_section',
		'type'=> 'hidden'
	));

	//server-performance Section
	$wp_customize->add_section('vw_hosting_services_server_performance_section', array(
		'title'       => __('Server Performance Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_server_performance_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_server_performance_text',array(
		'description' => __('<p>1. More options for server performance section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for server performance section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_server_performance_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_server_performance_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_server_performance_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_server_performance_section',
		'type'=> 'hidden'
	));

	//Client Stories Section
	$wp_customize->add_section('vw_hosting_services_client_stories_section', array(
		'title'       => __('Client Stories Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_client_stories_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_client_stories_text',array(
		'description' => __('<p>1. More options for client stories section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for client stories section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_client_stories_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_client_stories_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_client_stories_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_client_stories_section',
		'type'=> 'hidden'
	));

	//Our Blogs Section
	$wp_customize->add_section('vw_hosting_services_our_blogs_section', array(
		'title'       => __('Our Blogs Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_our_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_our_blogs_text',array(
		'description' => __('<p>1. More options for our blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our blogs section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_our_blogs_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_our_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_our_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_our_blogs_section',
		'type'=> 'hidden'
	));

	//partner Section
	$wp_customize->add_section('vw_hosting_services_partner_section', array(
		'title'       => __('Partner Section', 'vw-hosting-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-hosting-services'),
		'priority'    => null,
		'panel'       => 'vw_hosting_services_panel_id',
	));

	$wp_customize->add_setting('vw_hosting_services_partner_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_partner_text',array(
		'description' => __('<p>1. More options for partner section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner section.</p>','vw-hosting-services'),
		'section'=> 'vw_hosting_services_partner_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_hosting_services_partner_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_partner_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_hosting_services_guide') ." '>More Info</a>",
		'section'=> 'vw_hosting_services_partner_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_hosting_services_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-hosting-services'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/hosting-wordpress-theme/">GO PRO</a>','vw-hosting-services'),
		'panel' => 'vw_hosting_services_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_hosting_services_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_hosting_services_Customize_partial_vw_hosting_services_footer_text',
	));

  $wp_customize->add_setting( 'vw_hosting_services_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_footer_hide_show',array(
    'label' => esc_html__( 'Show / Hide Footer','vw-hosting-services' ),
    'section' => 'vw_hosting_services_footer'
  )));

	$wp_customize->add_setting('vw_hosting_services_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-hosting-services'),
		'section'  => 'vw_hosting_services_footer',
	)));

	$wp_customize->add_setting('vw_hosting_services_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_hosting_services_footer_background_image',array(
      'label' => __('Footer Background Image','vw-hosting-services'),
      'section' => 'vw_hosting_services_footer'
	)));

	$wp_customize->add_setting('vw_hosting_services_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-hosting-services'),
		'section' => 'vw_hosting_services_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-hosting-services' ),
			'center top'   => esc_html__( 'Top', 'vw-hosting-services' ),
			'right top'   => esc_html__( 'Top Right', 'vw-hosting-services' ),
			'left center'   => esc_html__( 'Left', 'vw-hosting-services' ),
			'center center'   => esc_html__( 'Center', 'vw-hosting-services' ),
			'right center'   => esc_html__( 'Right', 'vw-hosting-services' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-hosting-services' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-hosting-services' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-hosting-services' ),
		),
	));

  // Footer
  $wp_customize->add_setting('vw_hosting_services_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_hosting_services_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','vw-hosting-services'),
    'choices' => array(
      'fixed' => __('fixed','vw-hosting-services'),
      'scroll' => __('scroll','vw-hosting-services'),
    ),
    'section'=> 'vw_hosting_services_footer',
  ));

  // footer padding
  $wp_customize->add_setting('vw_hosting_services_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_hosting_services_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','vw-hosting-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-hosting-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
    'section'=> 'vw_hosting_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_hosting_services_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_hosting_services_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','vw-hosting-services'),
    'section' => 'vw_hosting_services_footer',
    'choices' => array(
      'Left' => __('Left','vw-hosting-services'),
      'Center' => __('Center','vw-hosting-services'),
      'Right' => __('Right','vw-hosting-services')
    ),
  ) );

  $wp_customize->add_setting('vw_hosting_services_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_hosting_services_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','vw-hosting-services'),
    'section' => 'vw_hosting_services_footer',
    'choices' => array(
      'Left' => __('Left','vw-hosting-services'),
      'Center' => __('Center','vw-hosting-services'),
      'Right' => __('Right','vw-hosting-services')
    ),
  	) );

	$wp_customize->add_setting('vw_hosting_services_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_hosting_services_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','vw-hosting-services' ),
		'section' => 'vw_hosting_services_footer'
	)));

	$wp_customize->add_setting('vw_hosting_services_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Image_Radio_Control($wp_customize, 'vw_hosting_services_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-hosting-services'),
        'section' => 'vw_hosting_services_footer',
        'settings' => 'vw_hosting_services_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting('vw_hosting_services_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-hosting-services'),
		'section'  => 'vw_hosting_services_footer',
	)));

	$wp_customize->add_setting('vw_hosting_services_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_copyright_font_size',array(
		'label' => __('Copyright Font Size','vw-hosting-services'),
		'description' => __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'vw-hosting-services' ),
		    ),
		'section'=> 'vw_hosting_services_footer',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_hosting_services_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-hosting-services' ),
      	'section' => 'vw_hosting_services_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_hosting_services_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_hosting_services_Customize_partial_vw_hosting_services_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_hosting_services_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Image_Radio_Control($wp_customize, 'vw_hosting_services_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-hosting-services'),
        'section' => 'vw_hosting_services_footer',
        'settings' => 'vw_hosting_services_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

     $wp_customize->add_setting('vw_hosting_services_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser($wp_customize,'vw_hosting_services_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-hosting-services'),
    'transport' => 'refresh',
    'section' => 'vw_hosting_services_footer',
    'setting' => 'vw_hosting_services_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_hosting_services_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_hosting_services_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-hosting-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-hosting-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
    'section'=> 'vw_hosting_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_hosting_services_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_hosting_services_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-hosting-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-hosting-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
    'section'=> 'vw_hosting_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_hosting_services_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_hosting_services_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-hosting-services'),
    'description' => __('Enter a value in pixels Example:20px','vw-hosting-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
  ),
  'section'=> 'vw_hosting_services_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_hosting_services_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_hosting_services_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-hosting-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-hosting-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
    'section'=> 'vw_hosting_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_hosting_services_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_hosting_services_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-hosting-services' ),
    'section'     => 'vw_hosting_services_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

   	//Blog Post
	$wp_customize->add_panel( 'vw_hosting_services_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_hosting_services_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_hosting_services_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_hosting_services_Customize_partial_vw_hosting_services_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('vw_hosting_services_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Hosting_Services_Image_Radio_Control($wp_customize, 'vw_hosting_services_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','vw-hosting-services'),
    'section' => 'vw_hosting_services_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('vw_hosting_services_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-hosting-services'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-hosting-services'),
        'section' => 'vw_hosting_services_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-hosting-services'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-hosting-services'),
            'One Column' => esc_html__('One Column','vw-hosting-services'),
            'Grid Layout' => esc_html__('Grid Layout','vw-hosting-services')
        ),
	) );

 	$wp_customize->add_setting('vw_hosting_services_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-hosting-services'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-hosting-services'),
    'section' => 'vw_hosting_services_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-hosting-services'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-hosting-services'),
        'One Column' => esc_html__('One Column','vw-hosting-services'),
        'Grid Layout' => esc_html__('Grid Layout','vw-hosting-services')
        ),
	) );

	$wp_customize->add_setting('vw_hosting_services_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-hosting-services'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-hosting-services'),
    'section' => 'vw_hosting_services_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-hosting-services'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-hosting-services'),
        'One Column' => esc_html__('One Column','vw-hosting-services'),
        'Grid Layout' => esc_html__('Grid Layout','vw-hosting-services')
        ),
	) );

  	$wp_customize->add_setting('vw_hosting_services_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_post_settings',
		'setting'	=> 'vw_hosting_services_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'vw_hosting_services_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-hosting-services' ),
    'section' => 'vw_hosting_services_post_settings'
  )));

	$wp_customize->add_setting('vw_hosting_services_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_post_settings',
		'setting'	=> 'vw_hosting_services_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_hosting_services_blog_toggle_author',array(
	'default' => 1,
	'transport' => 'refresh',
	'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_blog_toggle_author',array(
	'label' => esc_html__( 'Show / Hide Author','vw-hosting-services' ),
	'section' => 'vw_hosting_services_post_settings'
  )));

  $wp_customize->add_setting('vw_hosting_services_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_post_settings',
		'setting'	=> 'vw_hosting_services_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_hosting_services_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-hosting-services' ),
		'section' => 'vw_hosting_services_post_settings'
  )));

  $wp_customize->add_setting('vw_hosting_services_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_post_settings',
		'setting'	=> 'vw_hosting_services_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_hosting_services_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-hosting-services' ),
		'section' => 'vw_hosting_services_post_settings'
  )));

  $wp_customize->add_setting( 'vw_hosting_services_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-hosting-services' ),
		'section' => 'vw_hosting_services_post_settings'
  )));

  $wp_customize->add_setting( 'vw_hosting_services_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_hosting_services_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_hosting_services_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-hosting-services'),
		'section'	=> 'vw_hosting_services_post_settings',
		'choices' => array(
		'default' => __('Default','vw-hosting-services'),
		'custom' => __('Custom Image Size','vw-hosting-services'),
      ),
	));

	$wp_customize->add_setting('vw_hosting_services_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_hosting_services_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-hosting-services' ),),
		'section'=> 'vw_hosting_services_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_hosting_services_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_hosting_services_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-hosting-services' ),),
		'section'=> 'vw_hosting_services_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_hosting_services_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'vw_hosting_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_hosting_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_hosting_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_hosting_services_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-hosting-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-hosting-services'),
		'section'=> 'vw_hosting_services_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_hosting_services_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','vw-hosting-services'),
    'section' => 'vw_hosting_services_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-hosting-services'),
        'Excerpt' => esc_html__('Excerpt','vw-hosting-services'),
        'No Content' => esc_html__('No Content','vw-hosting-services')
        ),
	) );

  $wp_customize->add_setting('vw_hosting_services_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','vw-hosting-services'),
    'section' => 'vw_hosting_services_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-hosting-services'),
        'Without Blocks' => __('Without Blocks','vw-hosting-services')
        ),
	) );

	$wp_customize->add_setting( 'vw_hosting_services_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','vw-hosting-services' ),
		'section' => 'vw_hosting_services_post_settings'
  )));

	$wp_customize->add_setting('vw_hosting_services_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_hosting_services_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'vw_hosting_services_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_hosting_services_blog_pagination_type', array(
    'section' => 'vw_hosting_services_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'vw-hosting-services' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'vw-hosting-services' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'vw-hosting-services' ),
  )));

    // Button Settings
	$wp_customize->add_section( 'vw_hosting_services_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_hosting_services_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_hosting_services_Customize_partial_vw_hosting_services_button_text',
	));

  $wp_customize->add_setting('vw_hosting_services_button_text',array(
		'default'=> esc_html__('Read More','vw-hosting-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-hosting-services'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_hosting_services_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_button_font_size',array(
		'label'	=> __('Button Font Size','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_hosting_services_button_settings',
	));


	$wp_customize->add_setting( 'vw_hosting_services_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_hosting_services_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('vw_hosting_services_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
		'section'=> 'vw_hosting_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-hosting-services' ),
    ),
		'section'=> 'vw_hosting_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-hosting-services' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_hosting_services_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_hosting_services_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-hosting-services'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-hosting-services'),
      'Capitalize' => __('Capitalize','vw-hosting-services'),
      'Lowercase' => __('Lowercase','vw-hosting-services'),
    ),
		'section'=> 'vw_hosting_services_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_hosting_services_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_hosting_services_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_hosting_services_Customize_partial_vw_hosting_services_related_post_title',
	));

  $wp_customize->add_setting( 'vw_hosting_services_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_related_post',array(
		'label' => esc_html__( 'Related Post','vw-hosting-services' ),
		'section' => 'vw_hosting_services_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_hosting_services_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('vw_hosting_services_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_hosting_services_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_hosting_services_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_hosting_services_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_hosting_services_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_hosting_services_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_hosting_services_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_single_blog_settings',
		'setting'	=> 'vw_hosting_services_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_hosting_services_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_postdate',array(
	   'label' => esc_html__( 'Show / Hide Date','vw-hosting-services' ),
	   'section' => 'vw_hosting_services_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_hosting_services_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_single_blog_settings',
		'setting'	=> 'vw_hosting_services_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_hosting_services_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-hosting-services' ),
	    'section' => 'vw_hosting_services_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_hosting_services_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_single_blog_settings',
		'setting'	=> 'vw_hosting_services_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_hosting_services_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-hosting-services' ),
	    'section' => 'vw_hosting_services_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_hosting_services_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_single_blog_settings',
		'setting'	=> 'vw_hosting_services_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_hosting_services_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-hosting-services' ),
	    'section' => 'vw_hosting_services_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_hosting_services_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-hosting-services' ),
		'section' => 'vw_hosting_services_single_blog_settings'
  )));

	$wp_customize->add_setting( 'vw_hosting_services_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-hosting-services' ),
		'section' => 'vw_hosting_services_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'vw_hosting_services_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-hosting-services' ),
		'section' => 'vw_hosting_services_single_blog_settings'
    )));

	$wp_customize->add_setting('vw_hosting_services_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-hosting-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-hosting-services'),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_hosting_services_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','vw-hosting-services' ),
		  'section' => 'vw_hosting_services_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('vw_hosting_services_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-hosting-services'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'vw-hosting-services' ),
    	),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-hosting-services'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-hosting-services'),
		'description'	=> __('Enter a value in %. Example:50%','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_hosting_services_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_hosting_services_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_grid_layout_settings',
		'setting'	=> 'vw_hosting_services_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_hosting_services_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-hosting-services' ),
    'section' => 'vw_hosting_services_grid_layout_settings'
  )));

	$wp_customize->add_setting('vw_hosting_services_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_grid_layout_settings',
		'setting'	=> 'vw_hosting_services_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_hosting_services_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-hosting-services' ),
		'section' => 'vw_hosting_services_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_hosting_services_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_grid_layout_settings',
		'setting'	=> 'vw_hosting_services_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_hosting_services_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-hosting-services' ),
		'section' => 'vw_hosting_services_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_hosting_services_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_grid_time_icon',array(
		'label'	=> __('Add Time Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_grid_layout_settings',
		'setting'	=> 'vw_hosting_services_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_hosting_services_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-hosting-services' ),
		'section' => 'vw_hosting_services_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_hosting_services_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-hosting-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-hosting-services'),
		'section'=> 'vw_hosting_services_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_hosting_services_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','vw-hosting-services'),
    'section' => 'vw_hosting_services_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-hosting-services'),
      'Without Blocks' => __('Without Blocks','vw-hosting-services')
      ),
	) );

	//Other
	$wp_customize->add_panel( 'vw_hosting_services_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'vw-hosting-services' ),
		'panel' => 'vw_hosting_services_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_hosting_services_left_right', array(
    	'title' => esc_html__('General Settings', 'vw-hosting-services'),
		'panel' => 'vw_hosting_services_other_parent_panel'
	) );

	$wp_customize->add_setting('vw_hosting_services_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Hosting_Services_Image_Radio_Control($wp_customize, 'vw_hosting_services_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-hosting-services'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-hosting-services'),
        'section' => 'vw_hosting_services_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_hosting_services_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-hosting-services'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-hosting-services'),
        'section' => 'vw_hosting_services_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-hosting-services'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-hosting-services'),
            'One_Column' => esc_html__('One Column','vw-hosting-services')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_hosting_services_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_hosting_services_customize_partial_vw_hosting_services_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_hosting_services_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-hosting-services' ),
		'section' => 'vw_hosting_services_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_hosting_services_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_hosting_services_customize_partial_vw_hosting_services_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_hosting_services_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-hosting-services' ),
		'section' => 'vw_hosting_services_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'vw_hosting_services_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-hosting-services' ),
        'section' => 'vw_hosting_services_left_right'
    )));

	$wp_customize->add_setting('vw_hosting_services_preloader_bg_color', array(
		'default'           => '#103DBE',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-hosting-services'),
		'section'  => 'vw_hosting_services_left_right',
	)));

	$wp_customize->add_setting('vw_hosting_services_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-hosting-services'),
		'section'  => 'vw_hosting_services_left_right',
	)));

	$wp_customize->add_setting('vw_hosting_services_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_hosting_services_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-hosting-services'),
        'section' => 'vw_hosting_services_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_hosting_services_404_page',array(
		'title'	=> __('404 Page Settings','vw-hosting-services'),
		'panel' => 'vw_hosting_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_hosting_services_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_404_page_title',array(
		'label'	=> __('Add Title','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_404_page_content',array(
		'label'	=> __('Add Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_hosting_services_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-hosting-services'),
		'panel' => 'vw_hosting_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_hosting_services_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_no_results_page_title',array(
		'label'	=> __('Add Title','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_hosting_services_no_results_page_content',array(
		'label'	=> __('Add Text','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_hosting_services_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-hosting-services'),
		'panel' => 'vw_hosting_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_hosting_services_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_social_icon_width',array(
		'label'	=> __('Icon Width','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_social_icon_height',array(
		'label'	=> __('Icon Height','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_hosting_services_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-hosting-services'),
		'panel' => 'vw_hosting_services_other_parent_panel',
	));

    $wp_customize->add_setting( 'vw_hosting_services_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Hosting_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-hosting-services' ),
      	'section' => 'vw_hosting_services_responsive_media'
    )));

    $wp_customize->add_setting('vw_hosting_services_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_hosting_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_responsive_media',
		'setting'	=> 'vw_hosting_services_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_hosting_services_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_hosting_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_hosting_services_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-hosting-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_hosting_services_responsive_media',
		'setting'	=> 'vw_hosting_services_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_hosting_services_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#103dbe',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_hosting_services_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-hosting-services'),
		'section'  => 'vw_hosting_services_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('vw_hosting_services_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-hosting-services'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_hosting_services_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_hosting_services_customize_partial_vw_hosting_services_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_hosting_services_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_hosting_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-hosting-services' ),
		'section' => 'vw_hosting_services_woocommerce_section'
    )));

   $wp_customize->add_setting('vw_hosting_services_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-hosting-services'),
        'section' => 'vw_hosting_services_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-hosting-services'),
            'Right Sidebar' => __('Right Sidebar','vw-hosting-services'),
        ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_hosting_services_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_hosting_services_customize_partial_vw_hosting_services_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_hosting_services_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
   ) );
   $wp_customize->add_control( new vw_hosting_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-hosting-services' ),
		'section' => 'vw_hosting_services_woocommerce_section'
    )));

   $wp_customize->add_setting('vw_hosting_services_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-hosting-services'),
        'section' => 'vw_hosting_services_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-hosting-services'),
            'Right Sidebar' => __('Right Sidebar','vw-hosting-services'),
        ),
	) );

	//Products padding
	$wp_customize->add_setting('vw_hosting_services_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_hosting_services_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_hosting_services_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_hosting_services_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_hosting_services_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('vw_hosting_services_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_hosting_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_hosting_services_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-hosting-services'),
        'section' => 'vw_hosting_services_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-hosting-services'),
            'right' => __('Right','vw-hosting-services'),
        ),
	) );

	$wp_customize->add_setting('vw_hosting_services_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_hosting_services_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_hosting_services_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-hosting-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-hosting-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-hosting-services' ),
        ),
		'section'=> 'vw_hosting_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_hosting_services_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_hosting_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_hosting_services_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-hosting-services' ),
		'section'     => 'vw_hosting_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_hosting_services_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_hosting_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_hosting_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_hosting_services_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-hosting-services' ),
        'section' => 'vw_hosting_services_woocommerce_section'
    )));

}

add_action( 'customize_register', 'vw_hosting_services_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Hosting_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Hosting_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Hosting_Services_Customize_Section_Pro( $manager,'vw_hosting_services_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'HOSTING SERVICES PRO', 'vw-hosting-services' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-hosting-services' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/hosting-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new VW_Hosting_Services_Customize_Section_Pro($manager,'vw_hosting_services_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-hosting-services' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-hosting-services' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-hosting-services/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-hosting-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-hosting-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Hosting_Services_Customize::get_instance();
