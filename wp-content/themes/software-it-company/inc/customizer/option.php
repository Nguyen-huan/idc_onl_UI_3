<?php
/**
 * Theme Options.
 *
 * @package software_it_company
 */

$default = software_it_company_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// General Option.
$wp_customize->add_section( 'section_general_option',
	array(
	'title'      => __( 'General Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show scroll to top.
$wp_customize->add_setting( 'theme_options[show_scroll_to_top]',
	array(
	'default'           => $default['show_scroll_to_top'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_scroll_to_top]',
	array(
	'label'    => __( 'Show Scroll To Top', 'software-it-company' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Preloader.
$wp_customize->add_setting( 'theme_options[show_preloader_setting]',
	array(
	'default'           => $default['show_preloader_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_preloader_setting]',
	array(
	'label'    => __( 'Show Preloader', 'software-it-company' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Sticky Header.
$wp_customize->add_setting( 'theme_options[show_data_sticky_setting]',
	array(
	'default'           => $default['show_data_sticky_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_data_sticky_setting]',
	array(
	'label'    => __( 'Show Sticky Header', 'software-it-company' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Post Option.
$wp_customize->add_section( 'section_post_option',
	array(
	'title'      => __( 'Post Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show Post date.
$wp_customize->add_setting( 'theme_options[show_post_date_setting]',
	array(
	'default'           => $default['show_post_date_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_date_setting]',
	array(
	'label'    => __( 'Show Post Date', 'software-it-company' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Post Heading.
$wp_customize->add_setting( 'theme_options[show_post_heading_setting]',
	array(
	'default'           => $default['show_post_heading_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_heading_setting]',
	array(
	'label'    => __( 'Show Post Heading', 'software-it-company' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Post Content.
$wp_customize->add_setting( 'theme_options[show_post_content_setting]',
	array(
	'default'           => $default['show_post_content_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_content_setting]',
	array(
	'label'    => __( 'Show Post Full Content', 'software-it-company' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting top header text
$wp_customize->add_setting( 'theme_options[header_top_hiring_head]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_hiring_head]',
	array(
	'label'    => __( 'Add Hiring Heading', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting top header text
$wp_customize->add_setting( 'theme_options[header_top_hiring]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_hiring]',
	array(
	'label'    => __( 'Add Hiring Text', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[header_top_hiring_text]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_hiring_text]',
	array(
	'label'    => __( 'Add Hiring Button Text', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[header_top_hiring_url]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[header_top_hiring_url]',
	array(
	'label'    => __( 'Add Hiring Button Link', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Setting Location Text
$wp_customize->add_setting( 'theme_options[header_top_location]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_location]',
	array(
	'label'    => __( 'Add Location', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting Phone Text
$wp_customize->add_setting( 'theme_options[header_top_phone_text]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_phone_text]',
	array(
	'label'    => __( 'Add Phone Number Text', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting Phone Number
$wp_customize->add_setting( 'theme_options[header_top_phone_number]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[header_top_phone_number]',
	array(
	'label'    => __( 'Add Phone Number', 'software-it-company' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Social Section.
$wp_customize->add_section( 'section_social',
	array(
	'title'      => __( 'Social Media Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[social_media_facebook]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[social_media_facebook]',
	array(
	'label'    => __( 'Add Facebook Link', 'software-it-company' ),
	'section'  => 'section_social',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[social_media_twitter]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[social_media_twitter]',
	array(
	'label'    => __( 'Add Twitter Link', 'software-it-company' ),
	'section'  => 'section_social',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[social_media_instagram]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[social_media_instagram]',
	array(
	'label'    => __( 'Add Instagram Link', 'software-it-company' ),
	'section'  => 'section_social',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[social_media_linkdin]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[social_media_linkdin]',
	array(
	'label'    => __( 'Add Linkdin Link', 'software-it-company' ),
	'section'  => 'section_social',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Setting top header button
$wp_customize->add_setting( 'theme_options[social_media_youtube]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[social_media_youtube]',
	array(
	'label'    => __( 'Add Youbube Link', 'software-it-company' ),
	'section'  => 'section_social',
	'type'     => 'url',
	'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'software-it-company' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => software_it_company_get_global_layout_options(),
	'priority' => 100,
	)
);

// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'software-it-company' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => software_it_company_get_archive_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => __( 'Image in Archive', 'software-it-company' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => software_it_company_get_image_sizes_options( true, array( 'disable', 'thumbnail', 'medium', 'large' ), false ),
	'priority' => 100,
	)
);
// Setting archive_image_alignment.
$wp_customize->add_setting( 'theme_options[archive_image_alignment]',
	array(
	'default'           => $default['archive_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image_alignment]',
	array(
	'label'           => __( 'Image Alignment in Archive', 'software-it-company' ),
	'section'         => 'section_layout',
	'type'            => 'select',
	'choices'         => software_it_company_get_image_alignment_options(),
	'priority'        => 100,
	'active_callback' => 'software_it_company_is_image_in_archive_active',
	)
);
// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => __( 'Image in Single Post/Page', 'software-it-company' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => software_it_company_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'software-it-company' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'software_it_company_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'software-it-company' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);