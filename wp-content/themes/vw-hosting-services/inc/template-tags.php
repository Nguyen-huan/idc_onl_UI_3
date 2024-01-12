<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package VW Hosting Services 
 */

if ( ! function_exists( 'vw_hosting_services_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function vw_hosting_services_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'vw_hosting_services_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function vw_hosting_services_categorized_blog() {
	if ( false === ( $vw_hosting_services_all_the_cool_cats = get_transient( 'vw_hosting_services_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$vw_hosting_services_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$vw_hosting_services_all_the_cool_cats = count( $vw_hosting_services_all_the_cool_cats );

		set_transient( 'vw_hosting_services_all_the_cool_cats', $vw_hosting_services_all_the_cool_cats );
	}

	if ( '1' != $vw_hosting_services_all_the_cool_cats ) {
		// This blog has more than 1 category so vw_hosting_services_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so vw_hosting_services_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'vw_hosting_services_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since vw-hosting-services
 */
function vw_hosting_services_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in vw_hosting_services_categorized_blog
 */
function vw_hosting_services_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'vw_hosting_services_all_the_cool_cats' );
}
add_action( 'edit_category', 'vw_hosting_services_category_transient_flusher' );
add_action( 'save_post',     'vw_hosting_services_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'vw_hosting_services_my_admin_bar_css') );
function vw_hosting_services_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}
/**
 * Posts pagination.
 */
if ( ! function_exists( 'vw_hosting_services_blog_posts_pagination' ) ) {
	function vw_hosting_services_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'vw_hosting_services_blog_pagination_type', 'blog-page-numbers' );
		if ( $pagination_type == 'blog-page-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}



/*-- Custom metafield --*/
function vw_hosting_services_custom_job_field() {
  	add_meta_box( 'bn_meta', __( 'VW Hosting Services Meta Fields', 'vw-hosting-services' ), 'vw_hosting_services_meta_technology_callback', 'product', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'vw_hosting_services_custom_job_field');
}

function vw_hosting_services_meta_technology_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'vw_hosting_services_technology_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$vw_hosting_services_per_month_text = get_post_meta( $post->ID, 'vw_hosting_services_per_month_text', true );
  	$vw_hosting_services_technology = get_post_meta( $post->ID, 'vw_hosting_services_technology', true );
  	$vw_hosting_services_save_text = get_post_meta( $post->ID, 'vw_hosting_services_save_text', true );
  	$vw_hosting_services_renew_text = get_post_meta( $post->ID, 'vw_hosting_services_renew_text', true );
  	$vw_hosting_services_button_text = get_post_meta( $post->ID, 'vw_hosting_services_button_text', true );
  	?>

  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
	      		<tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Per Month Text :', 'vw-hosting-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="vw_hosting_services_per_month_text" id="vw_hosting_services_per_month_text" value="<?php echo esc_attr($vw_hosting_services_per_month_text); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Month Duration :', 'vw-hosting-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="vw_hosting_services_technology" id="vw_hosting_services_technology" value="<?php echo esc_attr($vw_hosting_services_technology); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Discount Text :', 'vw-hosting-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="vw_hosting_services_save_text" id="vw_hosting_services_save_text" value="<?php echo esc_attr($vw_hosting_services_save_text); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Renew Text :', 'vw-hosting-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="vw_hosting_services_renew_text" id="vw_hosting_services_renew_text" value="<?php echo esc_attr($vw_hosting_services_renew_text); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Feature Button Text :', 'vw-hosting-services' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="vw_hosting_services_button_text" id="vw_hosting_services_button_text" value="<?php echo esc_attr($vw_hosting_services_button_text); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function vw_hosting_services_save( $post_id ) {
  	if (!isset($_POST['vw_hosting_services_technology_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['vw_hosting_services_technology_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'vw_hosting_services_per_month_text' ] ) ) {
    	update_post_meta( $post_id, 'vw_hosting_services_per_month_text', strip_tags( wp_unslash( $_POST[ 'vw_hosting_services_per_month_text' ]) ) );
  	}
  	if( isset( $_POST[ 'vw_hosting_services_technology' ] ) ) {
    	update_post_meta( $post_id, 'vw_hosting_services_technology', strip_tags( wp_unslash( $_POST[ 'vw_hosting_services_technology' ]) ) );
  	}
  	if( isset( $_POST[ 'vw_hosting_services_save_text' ] ) ) {
    	update_post_meta( $post_id, 'vw_hosting_services_save_text', strip_tags( wp_unslash( $_POST[ 'vw_hosting_services_save_text' ]) ) );
  	}
  	if( isset( $_POST[ 'vw_hosting_services_renew_text' ] ) ) {
    	update_post_meta( $post_id, 'vw_hosting_services_renew_text', strip_tags( wp_unslash( $_POST[ 'vw_hosting_services_renew_text' ]) ) );
  	}
  	if( isset( $_POST[ 'vw_hosting_services_button_text' ] ) ) {
    	update_post_meta( $post_id, 'vw_hosting_services_button_text', strip_tags( wp_unslash( $_POST[ 'vw_hosting_services_button_text' ]) ) );
  	}
}
add_action( 'save_post', 'vw_hosting_services_save' );



function hcr_custom_meta_box() {
    add_meta_box(
        'custom-meta-box',
        'Hosting Repeater Meta Box',
        'hcr_render_custom_meta_box',
        'product',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'hcr_custom_meta_box');

function hcr_render_custom_meta_box($product){

    $product_id = $product->ID;

    wp_nonce_field( 'hcr_repeatable_meta_box_nonce', 'hcr_repeatable_meta_box_nonce' );

    $vw_hosting_services_hcr_fields_arr = get_post_meta( $product_id, 'hcr_fields', true );

    include get_template_directory() . '/page-template/repeater.php';
}

add_action('save_post', 'custom_repeatable_meta_box_save');
function custom_repeatable_meta_box_save($post_id) {

    if ( ! isset( $_POST['hcr_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['hcr_repeatable_meta_box_nonce'], 'hcr_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if ($_POST["features"]["rand_no"]) {
        unset($_POST["features"]["rand_no"]);
    }

    if ($_POST["security"]["rand_no"]) {
        unset($_POST["security"]["rand_no"]);
    }

    if ($_POST["wesbite_builder"]["rand_no"]) {
        unset($_POST["wesbite_builder"]["rand_no"]);
    }

    if ($_POST["support"]["rand_no"]) {
        unset($_POST["support"]["rand_no"]);
    }

    if ($_POST["managed_wordpress"]["rand_no"]) {
        unset($_POST["managed_wordpress"]["rand_no"]);
    }

    $vw_hosting_services_hcr_fields['features']             = isset($_POST["features"]) ? $_POST["features"] : [];
    $vw_hosting_services_hcr_fields['security']             = isset($_POST["security"]) ? $_POST["security"] : [];
    $vw_hosting_services_hcr_fields['wesbite_builder']      = isset($_POST["wesbite_builder"]) ? $_POST["wesbite_builder"] : [];
    $vw_hosting_services_hcr_fields['support']              = isset($_POST["support"]) ? $_POST["support"] : [];
    $vw_hosting_services_hcr_fields['managed_wordpress']    = isset($_POST["managed_wordpress"]) ? $_POST["managed_wordpress"] : [];

    if (isset($vw_hosting_services_hcr_fields)) {
        
        update_post_meta( $post_id, 'hcr_fields', $vw_hosting_services_hcr_fields );
    }
}




