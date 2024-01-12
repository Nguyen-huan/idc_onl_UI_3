<?php
/**
 * Plugin Panel.
 *
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left">
    <div id="Mizan_Demo_Importor_editor" class="tabcontent">
        <?php if(!class_exists('Mizan_Importer_ThemeWhizzie')){
            $plugin_ins = Software_IT_Company_Plugin_Activation_Mizan_Demo_Importor::get_instance();
            $software_it_company_actions = $plugin_ins->recommended_actions;
            ?>
            <div class="software-it-company-recommended-plugins ">
                    <div class="software-it-company-action-list">
                        <?php if ($software_it_company_actions): foreach ($software_it_company_actions as $key => $software_it_company_actionValue): ?>
                                <div class="software-it-company-action" id="<?php echo esc_attr($software_it_company_actionValue['id']);?>">
                                    <div class="action-inner plugin-activation-redirect">
                                        <h4 class="action-title"><?php echo esc_html($software_it_company_actionValue['title']); ?></h4>
                                        <div class="action-desc"><?php echo esc_html($software_it_company_actionValue['desc']); ?></div>
                                        <?php echo wp_kses_post($software_it_company_actionValue['link']); ?>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif; ?>
                    </div>
            </div>
        <?php }else{ ?>
            <div class="tab-outer-box">
                <h2><?php esc_html_e( 'Welcome to Mizan Theme!', 'software-it-company' ); ?></h2>
                <p><?php esc_html_e( 'For setup the theme, First you need to click on the Begin activating plugins', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '1. Install Mizan Demo Importor', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '>> Then click to Return to Required Plugins Installer ', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '2. Activate Mizan Demo Importor ', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '>> Click on the start now button', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '>> Click install plugins', 'software-it-company' ); ?></p>
                <p><?php esc_html_e( '>> Click import demo button to setup the theme and click visit your site button', 'software-it-company' ); ?></p>
            </div>
        <?php } ?>
    </div>
</div><!-- .panel-left -->