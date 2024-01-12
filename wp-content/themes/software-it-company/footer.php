<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package software_it_company
 */

	/**
	 * Hook - software_it_company_action_after_content.
	 *
	 * @hooked software_it_company_content_end - 10
	 */
	do_action( 'software_it_company_action_after_content' );
?>

	<?php
	/**
	 * Hook - software_it_company_action_before_footer.
	 *
	 * @hooked software_it_company_add_footer_bottom_widget_area - 5
	 * @hooked software_it_company_footer_start - 10
	 */
	do_action( 'software_it_company_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - software_it_company_action_footer.
	   *
	   * @hooked software_it_company_footer_copyright - 10
	   */
	  do_action( 'software_it_company_action_footer' );
	?>
	<?php
	/**
	 * Hook - software_it_company_action_after_footer.
	 *
	 * @hooked software_it_company_footer_end - 10
	 */
	do_action( 'software_it_company_action_after_footer' );
	?>

<?php
	/**
	 * Hook - software_it_company_action_after.
	 *
	 * @hooked software_it_company_page_end - 10
	 * @hooked software_it_company_footer_goto_top - 20
	 */
	do_action( 'software_it_company_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
