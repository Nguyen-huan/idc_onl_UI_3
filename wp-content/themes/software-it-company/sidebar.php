<?php
/**
 * The Primary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package software_it_company
 */

?>
<?php $default_sidebar = apply_filters( 'software_it_company_filter_default_sidebar_id', 'sidebar-1', 'primary' ); ?>
<div id="sidebar-primary" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar ) ) : ?>
		<?php dynamic_sidebar( $default_sidebar ); ?>
	<?php else : ?>
		<?php
			do_action( 'software_it_company_action_default_sidebar', $default_sidebar, 'primary' );
		?>
	<?php endif ?>
</div>
