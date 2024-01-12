<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package software_it_company
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
				<?php  ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content' ); ?>
				<?php endwhile; ?>
			<?php
			/**
			 * Hook - software_it_company_action_posts_navigation.
			 *
			 * @hooked: software_it_company_custom_posts_navigation - 10
			 */
			do_action( 'software_it_company_action_posts_navigation' ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</main>
	</div>
	<?php
		/**
		 * Hook - software_it_company_action_sidebar.
		 *
		 * @hooked: software_it_company_add_sidebar - 10
		 */
		do_action( 'software_it_company_action_sidebar' );
	?>
<?php get_footer(); ?>
