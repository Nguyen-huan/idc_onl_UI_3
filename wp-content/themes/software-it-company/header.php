<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package software_it_company
 */

?>
<?php
	/**
	 * Hook - software_it_company_action_doctype.
	 *
	 * @hooked software_it_company_doctype -  10
	 */
	do_action( 'software_it_company_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - software_it_company_action_head.
	 *
	 * @hooked software_it_company_head -  10
	 */
	do_action( 'software_it_company_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wp_body_open' ); ?>

	<?php 
	$show_preloader = software_it_company_get_option( 'show_preloader_setting' );
        if ( true === $show_preloader ) : ?>
			<div id="preloader" class="loader-head">
				<div class="preloader">
				    <div class="spinner"></div>
				    <div class="spinner-2"></div>
				</div>
			</div>
	<?php endif; ?>

	<?php
	/**
	 * Hook - software_it_company_action_before.
	 *
	 * @hooked software_it_company_page_start - 10
	 * @hooked software_it_company_skip_to_content - 15
	 */
	do_action( 'software_it_company_action_before' );
	?>

    <?php
	  /**
	   * Hook - software_it_company_action_before_header.
	   *
	   * @hooked software_it_company_header_start - 10
	   */
	  do_action( 'software_it_company_action_before_header' );
	?>
		<?php
		/**
		 * Hook - software_it_company_action_header.
		 *
		 * @hooked software_it_company_site_branding - 10
		 */
		do_action( 'software_it_company_action_header' );
		?>
    <?php
	  /**
	   * Hook - software_it_company_action_after_header.
	   *
	   * @hooked software_it_company_header_end - 10
	   */
	  do_action( 'software_it_company_action_after_header' );
	?>

	<?php
	/**
	 * Hook - software_it_company_action_before_content.
	 *
	 * @hooked software_it_company_content_start - 10
	 */
	do_action( 'software_it_company_action_before_content' );
	?>

	<!-- <?php
	  /**
	   * Hook - software_it_company_action_content.
	   */
	  do_action( 'software_it_company_action_content' );
	?> -->