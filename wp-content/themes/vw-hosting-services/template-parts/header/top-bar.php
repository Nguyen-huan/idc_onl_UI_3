<?php
/**
 * The template part for Top Header
 *
 * @package VW Hosting Services 
 * @subpackage vw-hosting-services
 * @since vw-hosting-services 1.0
 */
?>
<!-- Top Header -->
<?php if( get_theme_mod( 'vw_hosting_services_header_topbar',false) == 1) { ?>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 align-self-center text-lg-start text-md-start text-center" >
          <?php if(get_theme_mod('vw_hosting_services_offer_text') != ''){ ?>
            <p class="topbar-text mb-lg-0 mb-md-0 mt-2 mt-md-0"><?php echo esc_html(get_theme_mod('vw_hosting_services_offer_text')); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-6 align-self-center text-lg-end text-md-end text-center" >
          <?php if( class_exists( 'GTranslate' ) ) { ?>
            <div class="translate-lang position-relative d-md-inline-block me-3">
              <?php echo do_shortcode( '[gtranslate]' );?>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
<?php }?>