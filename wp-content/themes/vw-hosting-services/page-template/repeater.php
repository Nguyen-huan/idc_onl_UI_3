<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$features           = isset( $vw_hosting_services_hcr_fields_arr['features'] ) ? $vw_hosting_services_hcr_fields_arr['features'] : [];
$security           = isset( $vw_hosting_services_hcr_fields_arr['security'] ) ? $vw_hosting_services_hcr_fields_arr['security'] : [];
$wesbite_builder    = isset( $vw_hosting_services_hcr_fields_arr['wesbite_builder'] ) ? $vw_hosting_services_hcr_fields_arr['wesbite_builder'] : [];
$support            = isset( $vw_hosting_services_hcr_fields_arr['support'] ) ? $vw_hosting_services_hcr_fields_arr['support'] : [];
$managed_wordpress  = isset( $vw_hosting_services_hcr_fields_arr['managed_wordpress'] ) ? $vw_hosting_services_hcr_fields_arr['managed_wordpress'] : [];

?>
<div class="hcr-fields-meta-box">
    <h2><?php esc_html_e( 'Top Features','vw-hosting-services' );?></h2>
    <div class="hcr-features-fields repeater-wrap">
        <table id="hcr-features-fields" width="100%">
            <?php
            if ($features) {
                foreach( $features as $key => $feature ) { ?>
                    <tr class="repeater-table-row">
                        <td width="10%">
                            <input type="checkbox" name="features[<?php echo $key; ?>][hasfeature]" <?php echo isset($feature['hasfeature']) ? 'checked' : ''; ?> />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="text" name="features[<?php echo $key; ?>][text]" value="<?php if($feature['text'] != '') echo esc_attr( $feature['text'] ); ?>" />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="info text" name="features[<?php echo $key; ?>][infotext]" value="<?php if($feature['infotext'] != '') echo esc_attr( $feature['infotext'] ); ?>" />
                        </td>
                        <td width="30%">
                            <a class="button remove-row" href="#1"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr class="repeater-table-row">
                    <td>
                        <input type="checkbox" name="features[0][hasfeature]" />
                    </td>
                    <td>
                        <input type="text" placeholder="text" title="text" name="features[0][text]" />
                    </td>
                    <td>
                        <input type="text" placeholder="info text" title="info text" name="features[0][infotext]" />
                    </td>
                    <td>
                        <a class="button cmb-remove-row-button button-disabled" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                    </td>
                </tr>
            <?php } ?>
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text" style="display: none;">
                <td>
                    <input type="checkbox" name="features[rand_no][hasfeature]" />
                </td>
                <td>
                    <input type="text" placeholder="text" name="features[rand_no][text]" />
                </td>
                <td>
                    <input type="text" placeholder="info text" name="features[rand_no][infotext]" />
                </td>
                <td>
                <a class="button remove-row" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                </td>
            </tr>
        </table>
        <p><a class="button add-row" href="#"><?php esc_html_e( 'Add Another','vw-hosting-services' );?></a></p>
    </div>
    <h2><?php esc_html_e( 'Security','vw-hosting-services' );?></h2>
    <div class="hcr-security-fields repeater-wrap">
        <table id="hcr-security-fields" width="100%">
            <?php 
            if ($security) {
                foreach( $security as $key => $security_obj ) { ?>
                    <tr class="repeater-table-row">
                        <td width="10%">
                            <input type="checkbox" name="security[<?php echo $key; ?>][hasfeature]" <?php echo isset($security_obj['hasfeature']) ? 'checked' : ''; ?> />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="text" name="security[<?php echo $key; ?>][text]" value="<?php if($security_obj['text'] != '') echo esc_attr( $security_obj['text'] ); ?>" />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="info text" name="security[<?php echo $key; ?>][infotext]" value="<?php if($security_obj['infotext'] != '') echo esc_attr( $security_obj['infotext'] ); ?>" />
                        </td>
                        <td width="30%">
                            <a class="button remove-row" href="#1"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr class="repeater-table-row">
                    <td>
                        <input type="checkbox" name="security[0][hasfeature]" />
                    </td>
                    <td>
                        <input type="text" placeholder="text" title="text" name="security[0][text]" />
                    </td>
                    <td>
                        <input type="text" placeholder="info text" title="info text" name="security[0][infotext]" />
                    </td>
                    <td>
                        <a class="button cmb-remove-row-button button-disabled" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                    </td>
                </tr>
            <?php } ?>
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text" style="display: none;">
                <td>
                    <input type="checkbox" name="security[rand_no][hasfeature]" />
                </td>
                <td>
                    <input type="text" placeholder="text" name="security[rand_no][text]" />
                </td>
                <td>
                    <input type="text" placeholder="info text" name="security[rand_no][infotext]" />
                </td>
                <td>
                <a class="button remove-row" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                </td>
            </tr>
        </table>
        <p><a class="button add-row" href="#"><?php esc_html_e( 'Add Another','vw-hosting-services' );?></a></p>
    </div>
    <h2><?php esc_html_e( 'No-Code Webiste Builder','vw-hosting-services' );?></h2>
    <div class="hcr-wesbite-builder-fields repeater-wrap">
        <table id="hcr-wesbite-builder-fields" width="100%">
            <?php 
            if ($wesbite_builder) {
                foreach( $wesbite_builder as $key => $wesbite_builder_obj ) { ?>
                    <tr class="repeater-table-row">
                        <td width="10%">
                            <input type="checkbox" name="wesbite_builder[<?php echo $key; ?>][hasfeature]" <?php echo isset($wesbite_builder_obj['hasfeature']) ? 'checked' : ''; ?> />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="text" name="wesbite_builder[<?php echo $key; ?>][text]" value="<?php if($wesbite_builder_obj['text'] != '') echo esc_attr( $wesbite_builder_obj['text'] ); ?>" />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="info text" name="wesbite_builder[<?php echo $key; ?>][infotext]" value="<?php if($wesbite_builder_obj['infotext'] != '') echo esc_attr( $wesbite_builder_obj['infotext'] ); ?>" />
                        </td>
                        <td width="30%">
                            <a class="button remove-row" href="#1"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr class="repeater-table-row">
                    <td>
                        <input type="checkbox" name="wesbite_builder[0][hasfeature]" />
                    </td>
                    <td>
                        <input type="text" placeholder="text" title="text" name="wesbite_builder[0][text]" />
                    </td>
                    <td>
                        <input type="text" placeholder="info text" title="info text" name="wesbite_builder[0][infotext]" />
                    </td>
                    <td>
                        <a class="button cmb-remove-row-button button-disabled" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                    </td>
                </tr>
            <?php } ?>
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text" style="display: none;">
                <td>
                    <input type="checkbox" name="wesbite_builder[rand_no][hasfeature]" />
                </td>
                <td>
                    <input type="text" placeholder="text" name="wesbite_builder[rand_no][text]" />
                </td>
                <td>
                    <input type="text" placeholder="info text" name="wesbite_builder[rand_no][infotext]" />
                </td>
                <td>
                <a class="button remove-row" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                </td>
            </tr>
        </table>
        <p><a class="button add-row" href="#"><?php esc_html_e( 'Add Another','vw-hosting-services' );?></a></p>
    </div>
    <h2><?php esc_html_e( 'Service And Support','vw-hosting-services' );?></h2>
    <div class="hcr-service-support-fields repeater-wrap">
        <table id="hcr-service-support-fields" width="100%">
            <?php 
            if ($support) {
                foreach( $support as $key => $support_obj ) { ?>
                    <tr class="repeater-table-row">
                        <td width="10%">
                            <input type="checkbox" name="support[<?php echo $key; ?>][hasfeature]" <?php echo isset($support_obj['hasfeature']) ? 'checked' : ''; ?> />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="text" name="support[<?php echo $key; ?>][text]" value="<?php if($support_obj['text'] != '') echo esc_attr( $support_obj['text'] ); ?>" />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="info text" name="support[<?php echo $key; ?>][infotext]" value="<?php if($support_obj['infotext'] != '') echo esc_attr( $support_obj['infotext'] ); ?>" />
                        </td>
                        <td width="30%">
                            <a class="button remove-row" href="#1"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr class="repeater-table-row">
                    <td>
                        <input type="checkbox" name="support[0][hasfeature]" />
                    </td>
                    <td>
                        <input type="text" placeholder="text" title="text" name="support[0][text]" />
                    </td>
                    <td>
                        <input type="text" placeholder="info text" title="info text" name="support[0][infotext]" />
                    </td>
                    <td>
                        <a class="button cmb-remove-row-button button-disabled" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                    </td>
                </tr>
            <?php } ?>
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text" style="display: none;">
                <td>
                    <input type="checkbox" name="support[rand_no][hasfeature]" />
                </td>
                <td>
                    <input type="text" placeholder="text" name="support[rand_no][text]" />
                </td>
                <td>
                    <input type="text" placeholder="info text" name="support[rand_no][infotext]" />
                </td>
                <td>
                <a class="button remove-row" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                </td>
            </tr>
        </table>
        <p><a class="button add-row" href="#"><?php esc_html_e( 'Add Another','vw-hosting-services' );?></a></p>
    </div>
    <h2><?php esc_html_e( 'Managed WordPress','vw-hosting-services' );?></h2>
    <div class="hcr-managed-wordpress-fields repeater-wrap">
        <table id="hcr-managed-wordpress-fields" width="100%">
            <?php 
            if ($managed_wordpress) {
                foreach( $managed_wordpress as $key => $managed_wordpress_obj ) { ?>
                    <tr class="repeater-table-row">
                        <td width="10%">
                            <input type="checkbox" name="managed_wordpress[<?php echo $key; ?>][hasfeature]" <?php echo isset($managed_wordpress_obj['hasfeature']) ? 'checked' : ''; ?> />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="text" name="managed_wordpress[<?php echo $key; ?>][text]" value="<?php if($managed_wordpress_obj['text'] != '') echo esc_attr( $managed_wordpress_obj['text'] ); ?>" />
                        </td>
                        <td width="30%">
                            <input type="text"  placeholder="info text" name="managed_wordpress[<?php echo $key; ?>][infotext]" value="<?php if($managed_wordpress_obj['infotext'] != '') echo esc_attr( $managed_wordpress_obj['infotext'] ); ?>" />
                        </td>
                        <td width="30%">
                            <a class="button remove-row" href="#1"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr class="repeater-table-row">
                    <td>
                        <input type="checkbox" name="managed_wordpress[0][hasfeature]" />
                    </td>
                    <td>
                        <input type="text" placeholder="text" title="text" name="managed_wordpress[0][text]" />
                    </td>
                    <td>
                        <input type="text" placeholder="info text" title="info text" name="managed_wordpress[0][infotext]" />
                    </td>
                    <td>
                        <a class="button cmb-remove-row-button button-disabled" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                    </td>
                </tr>
            <?php } ?>
            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text" style="display: none;">
                <td>
                    <input type="checkbox" name="managed_wordpress[rand_no][hasfeature]" />
                </td>
                <td>
                    <input type="text" placeholder="text" name="managed_wordpress[rand_no][text]" />
                </td>
                <td>
                    <input type="text" placeholder="info text" name="managed_wordpress[rand_no][infotext]" />
                </td>
                <td>
                <a class="button remove-row" href="#"><?php esc_html_e( 'Remove','vw-hosting-services' );?></a>
                </td>
            </tr>
        </table>
        <p><a class="button add-row" href="#"><?php esc_html_e( 'Add Another','vw-hosting-services' );?></a></p>
    </div>
</div>