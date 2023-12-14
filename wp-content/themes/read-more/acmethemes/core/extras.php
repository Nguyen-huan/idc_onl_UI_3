<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Acme Themes
 * @subpackage Read More
 */

/**
 * Adds custom classes to the array of body classes.
 * @package Acme Themes
 * @subpackage Read More
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'read_more_body_classes' ) ) :
	function read_more_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
endif;
add_filter( 'body_class', 'read_more_body_classes' );

if ( ! function_exists( 'diepcd_preload_styles' ) ) :
    function diepcd_preload_styles( $html ) {
//        $html = str_replace('<link rel="stylesheet" id="font-awesome-css" ', '<link rel="preload" crossorigin id="font-awesome-css" ', $html);
        if(strpos($html, 'googleapis-css') != false){
//            var_dump($html);
            $html = '
                <link rel="preload" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:300,400&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
                <noscript>
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:300,400&display=swap">
                </noscript>
                ';
        }

        return $html;
    }
endif;
add_filter( 'style_loader_tag','diepcd_preload_styles');

