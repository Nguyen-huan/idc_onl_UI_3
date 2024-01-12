<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
    <?php do_action( 'vw_hosting_services_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_hosting_services_slider_hide_show',false) == 1) { ?>
    <section id="banner" class="wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="banner-caption">
          <div class="inner_carousel wow slideInRight delay-1000" data-wow-duration="2s">
            <?php if( get_theme_mod('vw_hosting_services_slider_small_title') != '' ){ ?>
              <span class="mb-lg-0 mb-md-0 mb-4 slider-small-text"><?php echo esc_html(get_theme_mod('vw_hosting_services_slider_small_title',''));?></span>
            <?php }?>
            <?php if(get_theme_mod('vw_hosting_services_banner_tagline_title') != '') {?>
              <h1 class="mb-lg-0 mb-md-0 mb-4"><?php echo esc_html(get_theme_mod('vw_hosting_services_banner_tagline_title')) ?></h1>
            <?php }?>
            <?php if(get_theme_mod('vw_hosting_services_banner_para_text') != '') {?>
              <p class="mb-lg-0 mb-md-0 mb-4"><?php echo esc_html(get_theme_mod('vw_hosting_services_banner_para_text')) ?></p>
            <?php }?>
            <?php if( get_theme_mod('vw_hosting_services_slider_button_text','Read More') != ''){ ?>
                <div class="more-btn my-3 my-lg-4 my-md-4 wow slideInRight delay-1000" data-wow-duration="2s">
                  <a><?php echo esc_html(get_theme_mod('vw_hosting_services_slider_button_text',__('Read More','vw-hosting-services')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_hosting_services_slider_button_text',__('Read More','vw-hosting-services')));?></span></a>
                </div>
              <?php } ?>
              <!-- product page -->
               <?php if ( class_exists( 'WooCommerce' ) ) {
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('vw_hosting_services_product_time_category'),
                    'order' => 'ASC',
                    'posts_per_page' => '1'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box wow slideInRight delay-1000" data-wow-duration="2s">
                      <div class="product-box-content">
                        <span><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></span>
                          <p class="product-rating mb-lg-3 mb-0 d-3 mb-5 <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                          <div class="main-product-section"><p class="the_timer" data-date="<?php echo $vw_hosting_services_end_date_?>"></p></div>
                          <div class="countdowntimer">
                            <p id="timer" class="countdown2 d-flex mb-0">
                              <?php
                              $vw_hosting_services_dateday = get_theme_mod('vw_hosting_services_product_clock_timer_end'); ?>
                              <input type="hidden" class="date2" value="<?php echo esc_attr($vw_hosting_services_dateday); ?>">
                            </p>
                          </div> 
                        <?php if(get_theme_mod('vw_hosting_services_time_btn_link') != '' || get_theme_mod('vw_hosting_services_product_button_text') != ''){ ?>
                          <div class="time-btn">
                            <a href="<?php echo esc_url(get_theme_mod('vw_hosting_services_time_btn_link')); ?>"><?php echo esc_html(get_theme_mod('vw_hosting_services_product_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_hosting_services_product_button_text')) ?></span></a>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                  <?php endwhile; wp_reset_query(); ?>
                <?php } ?>
              <!-- end -->
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php do_action( 'vw_hosting_services_after_slider' ); ?>

<!-- product section -->
  <section id="main-product" class="wow bounceInRight delay-1000 mt-md-5 mt-3" data-wow-duration="3s"> 
    <div class="container">
      <div class="heding-title">
        <?php if( get_theme_mod('vw_hosting_services_product_heading_product') != ''){ ?>
          <h2 class="text-center"><?php echo esc_html(get_theme_mod('vw_hosting_services_product_heading_product'));?></h2>
        <?php }?>
        <p class=" text-center"><?php echo esc_html(get_theme_mod('vw_hosting_services_product_title',''));?></p>
      </div> 
      <div class="tab-section position-relative">
        <div class="tab">
          <?php
            $vw_hosting_services_featured_post = get_theme_mod('vw_hosting_services_services_number', '');
            for ( $vw_hosting_services_j = 1; $vw_hosting_services_j <= $vw_hosting_services_featured_post; $vw_hosting_services_j++ ){ ?>
            <button class="tablinks" onclick="vw_hosting_services_services_tab(event, '<?php $main_id = get_theme_mod('vw_hosting_services_services_text'.$vw_hosting_services_j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
            <?php echo esc_html(get_theme_mod('vw_hosting_services_services_text'.$vw_hosting_services_j)); ?></button>
          <?php }?>
        </div>
      </div>
      <?php for ( $vw_hosting_services_j = 1; $vw_hosting_services_j <= $vw_hosting_services_featured_post; $vw_hosting_services_j++ ){ ?>
        <div id="<?php $main_id = get_theme_mod('vw_hosting_services_services_text'.$vw_hosting_services_j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent"> 
          <div class="owl-carousel"> 
            <?php if ( class_exists( 'WooCommerce' )) {?>
              <?php $args = array( 
                'post_type' => 'product',
                'order' => 'ASC',
                'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat', // <-- NO! Does not work.
                                'field'    => 'slug',
                                'terms'    => get_theme_mod('vw_hosting_services_product_settings'.$vw_hosting_services_j)
                            )
                        )
              );
              $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
             $vw_hosting_services_hcr_fields_arr = get_post_meta( $post->ID, 'hcr_fields', true );

             $vw_hosting_services_features           = isset( $vw_hosting_services_hcr_fields_arr['features'] ) ? $vw_hosting_services_hcr_fields_arr['features'] : [];
             $vw_hosting_services_security           = isset( $vw_hosting_services_hcr_fields_arr['security'] ) ? $vw_hosting_services_hcr_fields_arr['security'] : [];
             $vw_hosting_services_wesbite_builder    = isset( $vw_hosting_services_hcr_fields_arr['wesbite_builder'] ) ? $vw_hosting_services_hcr_fields_arr['wesbite_builder'] : [];
             $vw_hosting_services_support            = isset( $vw_hosting_services_hcr_fields_arr['support'] ) ? $vw_hosting_services_hcr_fields_arr['support'] : [];
             $vw_hosting_services_managed_wordpress  = isset( $vw_hosting_services_hcr_fields_arr['managed_wordpress'] ) ? $vw_hosting_services_hcr_fields_arr['managed_wordpress'] : [];
              ?>
                <div class="box">
                  <div class="box-content">
                    <h3 class="text-center"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                    <p class="product-para-text text-center" data-wow-duration="2s"><?php $vw_hosting_services_excerpt = get_the_excerpt(); echo esc_html( vw_hosting_services_string_limit_words( $vw_hosting_services_excerpt, esc_attr(get_theme_mod('vw_hosting_services_product_excerpt_number','5')))); ?></p>
                    <div class="domain-search-page-imag-path" style="height: 310px;overflow: hidden;position: absolute;top: 0;left: 0;z-index: -1;border-radius: 19px;" >
                        <svg viewBox="0 0 460 180" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                        <path d="M-44.68,116.08 C52.81,0.10 419.68,144.09 504.05,69.09 L500.00,0.00 L-7.81,-5.89 Z" style="stroke: none; fill: #000"></path></svg>
                    </div>
                    <?php if( get_post_meta($post->ID, 'vw_hosting_services_per_month_text', true) ) {?>
                      <div class="price-month-save-box">
                        <div class="price-per-month mb-2">
                          <div class="per-month-meta-fields">
                            <span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></span>
                            <?php if( get_post_meta($post->ID, 'vw_hosting_services_per_month_text', true) ) {?>
                              <span class="per-month"><?php echo esc_html(get_post_meta($post->ID,'vw_hosting_services_per_month_text',true)); ?></span>
                            <?php }?>
                          </div>
                        <?php }?>
                        </div>
                        <div class="save-free-month d-flex ">
                          <?php if( get_post_meta($post->ID, 'vw_hosting_services_technology', true) ) {?>
                            <div class="technology-meta-fields">
                              <?php if( get_post_meta($post->ID, 'vw_hosting_services_technology', true) ) {?>
                                <span class="technology"><?php echo esc_html(get_post_meta($post->ID,'vw_hosting_services_technology',true)); ?></span>
                              <?php }?>
                            </div>
                          <?php }?>
                          <?php if( get_post_meta($post->ID, 'vw_hosting_services_save_text', true) ) {?>
                            <div class="save-meta-fields">
                              <?php if( get_post_meta($post->ID, 'vw_hosting_services_save_text', true) ) {?>
                                <span class="save"><?php echo esc_html(get_post_meta($post->ID,'vw_hosting_services_save_text',true)); ?></span>
                              <?php }?>
                            </div>
                        </div>
                      </div> 
                    <?php }?>
                    <!-- product multiple repeator -->
                    <div class="features-top-content-box">
                      <h6><?php esc_html_e( 'Top Features','vw-hosting-services' );?></h6>
                        <?php foreach ($vw_hosting_services_features as $vw_hosting_services_feature) { ?>
                         <div class="hosting-plan-contents pb-2 d-flex">
                           <div class="d-flex align-items-center">
                             <i class="<?php echo esc_html(isset($vw_hosting_services_feature['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                             <p><?php echo isset($vw_hosting_services_feature['text']) ? $vw_hosting_services_feature['text'] : ''; ?></p>
                           </div>
                           <?php if (isset($vw_hosting_services_feature['infotext']) && $vw_hosting_services_feature['infotext'] != '' ){ ?>
                             <div class="tooltip"><i class="fa fa-info"> </i>
                               <span class="tooltiptext"><?php echo $vw_hosting_services_feature['infotext'].""; ?></span>
                             </div>
                           <?php } ?>
                         </div>
                        <?php } ?>
                    </div>
                   <nav class="navbar navbar-expand-lg navbar-dark">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <ul class="dropdown-menu" id="myDropdown" class="dropdown-content">
                            <li>
                              <a class="dropdown-item">
                                <div class="security-top-content-box">
                                  <h6><?php esc_html_e( 'Security','vw-hosting-services' );?></h6>
                                  <?php
                                   foreach ($vw_hosting_services_security as $vw_hosting_services_securities) { ?>
                                     <div class="hosting-plan-contents pb-2 d-flex">
                                       <div class="d-flex align-items-center">
                                         <i class="<?php echo esc_html(isset($vw_hosting_services_securities['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                                         <p><?php echo isset($vw_hosting_services_securities['text']) ? $vw_hosting_services_securities['text'] : ''; ?></p>
                                       </div>
                                       <div>
                                         <?php if (isset($vw_hosting_services_securities['infotext']) && $vw_hosting_services_securities['infotext'] != '' ){ ?>
                                         <div class="tooltip"><i class="fa fa-info"> </i>
                                           <span class="tooltiptext"><?php echo $vw_hosting_services_securities['infotext'].""; ?></span>
                                         </div>
                                         <?php } ?>
                                        </div>
                                     </div>
                                  <?php } ?>
                                </div>
                              </a>
                              <a class="dropdown-item">
                                <div class="wesbite-builder-top-content-box">
                                  <h6><?php esc_html_e( 'Wesbite Builder','vw-hosting-services' );?></h6>
                                   <?php
                                     foreach ($vw_hosting_services_support as $vw_hosting_services_supporter) { ?>
                                       <div class="hosting-plan-contents pb-2 d-flex">
                                         <div class="d-flex align-items-center">
                                           <i class="<?php echo esc_html(isset($vw_hosting_services_supporter['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                                           <p><?php echo isset($vw_hosting_services_supporter['text']) ? $vw_hosting_services_supporter['text'] : ''; ?></p>
                                         </div>
                                       <?php if (isset($vw_hosting_services_supporter['infotext']) && $vw_hosting_services_supporter['infotext'] != '' ){ ?>
                                         <div class="tooltip"><i class="fa fa-info"> </i>
                                           <span class="tooltiptext"><?php echo $vw_hosting_services_supporter['infotext'].""; ?></span>
                                         </div>
                                       <?php } ?>
                                       </div>
                                     <?php } ?>
                                  </div>
                              </a>
                              <a class="dropdown-item">
                                <div class="supporter-top-content-box">
                                  <h6><?php esc_html_e( 'Service Support','vw-hosting-services' );?></h6>
                                  <?php
                                   foreach ($vw_hosting_services_managed_wordpress as $vw_hosting_services_wordpress_managed) { ?>
                                     <div class="hosting-plan-contents pb-2 d-flex">
                                       <div class="d-flex align-items-center">
                                         <i class="<?php echo esc_html(isset($vw_hosting_services_wordpress_managed['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                                         <p><?php echo isset($vw_hosting_services_wordpress_managed['text']) ? $vw_hosting_services_wordpress_managed['text'] : ''; ?></p>
                                       </div>
                                       <?php if (isset($vw_hosting_services_wordpress_managed['infotext']) && $vw_hosting_services_wordpress_managed['infotext'] != '' ){ ?>
                                       <div class="tooltip"><i class="fa fa-info"> </i>
                                         <span class="tooltiptext"><?php echo $vw_hosting_services_wordpress_managed['infotext'].""; ?></span>
                                       </div>
                                       <?php } ?>
                                     </div>
                                    <?php } ?>
                                  </div>
                              </a>
                              <a class="dropdown-item">
                                <div class="supporter-top-content-box">
                                  <h6><?php esc_html_e( 'Service Support','vw-hosting-services' );?></h6>
                                  <?php
                                   foreach ($vw_hosting_services_managed_wordpress as $vw_hosting_services_wordpress_managed) { ?>
                                     <div class="hosting-plan-contents pb-2 d-flex">
                                       <div class="d-flex align-items-center">
                                         <i class="<?php echo esc_html(isset($vw_hosting_services_wordpress_managed['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                                         <p><?php echo isset($vw_hosting_services_wordpress_managed['text']) ? $vw_hosting_services_wordpress_managed['text'] : ''; ?></p>
                                       </div>
                                       <?php if (isset($vw_hosting_services_wordpress_managed['infotext']) && $vw_hosting_services_wordpress_managed['infotext'] != '' ){ ?>
                                       <div class="tooltip"><i class="fa fa-info"> </i>
                                         <span class="tooltiptext"><?php echo $vw_hosting_services_wordpress_managed['infotext'].""; ?></span>
                                       </div>
                                       <?php } ?>
                                     </div>
                                    <?php } ?>
                                  </div>
                              </a>
                              <a class="dropdown-item">
                                <div class="managed-wordpress-top-content-box">
                                  <h6><?php esc_html_e( 'Managed WordPress','vw-hosting-services' );?></h6>
                                  <?php
                                  foreach ($vw_hosting_services_managed_wordpress as $vw_hosting_services_wordpress_managed) { ?>
                                    <div class="hosting-plan-contents pb-2 d-flex">
                                      <div class="d-flex align-items-center">
                                        <i class="<?php echo esc_html(isset($vw_hosting_services_wordpress_managed['hasfeature']) ? 'fa fa-check' : 'fas fa-times-circle'); ?> me-2" aria-hidden="true"></i>
                                        <p><?php echo isset($vw_hosting_services_wordpress_managed['text']) ? $vw_hosting_services_wordpress_managed['text'] : ''; ?></p>
                                      </div>
                                      <?php if (isset($vw_hosting_services_wordpress_managed['infotext']) && $vw_hosting_services_wordpress_managed['infotext'] != '' ){ ?>
                                      <div class="tooltip"><i class="fa fa-info"> </i>
                                        <span class="tooltiptext"><?php echo $vw_hosting_services_wordpress_managed['infotext'].""; ?></span>
                                      </div>
                                      <?php } ?>
                                    </div>
                                  <?php } ?>
                                </div>
                              </a>
                            </li>
                          </ul>   
                          <div class="see-more-btn">                       
                            <button class="btn dropbtn features-clicked">
                              <a class="features-read">
                                <?php if( get_post_meta($post->ID, 'vw_hosting_services_button_text', true) ) {?>
                                  <div class="technology-meta-fields">
                                    <?php if( get_post_meta($post->ID, 'vw_hosting_services_button_text', true) ) {?>
                                      <i class="fa fa-angle-down"></i>
                                      <span class="technology"><?php echo esc_html(get_post_meta($post->ID,'vw_hosting_services_button_text',true)); ?></span>
                                    <?php }?>
                                  </div>
                                <?php }?>
                              </a>
                           </button>
                         </div>
                       </li>
                     </ul>
                 </nav>
                <!-- end -->
                <div class="plan-btn text-center py-3"><a class="pro-button" href="<?php the_permalink(); ?>">  <?php echo esc_html('Buy Now','vw-hosting-services');?><span class="screen-reader-text"><?php echo esc_html('Buy Now','vw-hosting-services');?></span></a>
                </div>
                <?php if( get_post_meta($post->ID, 'vw_hosting_services_renew_text', true) ) {?>
                  <div class="renew-meta-fields text-center">
                    <?php if( get_post_meta($post->ID, 'vw_hosting_services_renew_text', true) ) {?>
                      <span class="renew"><?php echo esc_html(get_post_meta($post->ID,'vw_hosting_services_renew_text',true)); ?></span>
                    <?php }?>
                  </div>
                <?php }?>
                </div>
              </div>
              <?php endwhile; wp_reset_query(); ?> 
              <?php } ?> 
          </div>
        </div>
        <?php }?> 
      </div> 
  </section>
<?php do_action( 'vw_hosting_services_after_product_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>