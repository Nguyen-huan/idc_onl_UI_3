<?php
/**
 * The Secondary Sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package software_it_company
 */

?>
<?php $default_sidebar = apply_filters( 'software_it_company_filter_default_sidebar_id', 'sidebar-2', 'secondary' ); ?>
<div id="sidebar-secondary" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar ) ) : ?>
		<?php dynamic_sidebar( $default_sidebar ); ?>
	<?php else : ?>
		<?php
			do_action( 'software_it_company_action_default_sidebar', $default_sidebar, 'secondary' );
		?>
	<?php endif ?>
</div>

<?php $default_sidebar1 = apply_filters( 'software_it_company_filter_default_sidebar_id1', 'sidebar-3', 'secondary' ); ?>
<div id="sidebar-secondary1" class="widget-area sidebar" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar1 ) ) : ?>
		<?php dynamic_sidebar( $default_sidebar1 ); ?>
	<?php else : ?>
		<?php
			do_action( 'software_it_company_action_default_sidebar1', $default_sidebar1, 'secondary' );
		?>
	<?php endif ?>
</div>