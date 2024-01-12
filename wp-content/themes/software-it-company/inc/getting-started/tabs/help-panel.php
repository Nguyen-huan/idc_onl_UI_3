<?php
/**
 * Help Panel.
 *
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Theme Customizer', 'software-it-company' ); ?></h4>
        <p><?php esc_html_e( 'To begin customizing your website, start by clicking "Customize"', 'software-it-company' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( admin_url('customize.php') ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'software-it-company' ); ?>" target="_blank">
            <?php esc_html_e( 'Customizing', 'software-it-company' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'software-it-company' ); ?></h4>
        <p><?php esc_html_e( 'Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme', 'software-it-company' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( SOFTWARE_IT_COMPANY_SUPPORT ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'software-it-company' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'software-it-company' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'Reviews & Testimonials', 'software-it-company' ); ?></h4>
        <p><?php esc_html_e( 'All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'software-it-company' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( SOFTWARE_IT_COMPANY_REVIEW ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'software-it-company' ); ?>" target="_blank">
            <?php esc_html_e( 'Review', 'software-it-company' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>
