<?php
/**
 * Start Elementor.
 *
 */
?>
<!-- Start Elementor -->
<div id="start-panel" class="panel-left visible">
    <div id="software-it-company-importer" class="tabcontent open">
        <?php if(!class_exists('Mizan_Importer_ThemeWhizzie')){
            $plugin_ins = Software_IT_Company_Plugin_Activation_Mizan_Demo_Importor::get_instance();
            $software_it_company_actions = $plugin_ins->recommended_actions;
            ?>
            <div class="software-it-company-recommended-plugins ">
                    <div class="software-it-company-action-list">
                        <?php if ($software_it_company_actions): foreach ($software_it_company_actions as $key => $software_it_company_actionValue): ?>
                                <div class="software-it-company-action" id="<?php echo esc_attr($software_it_company_actionValue['id']);?>">
                                    <div class="action-inner plugin-activation-redirect">
                                        <h3 class="action-title"><?php echo esc_html($software_it_company_actionValue['title']); ?></h3>
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
                <h3><?php esc_html_e('Welcome to Mizan Themes', 'software-it-company'); ?></h3>
                <p class="start-text"><?php esc_html_e('The demo will import after you click the Start Quickly button.', 'software-it-company'); ?></p>
                <div class="info-link">
                    <a class="button button-primary" href="<?php echo esc_url( admin_url('admin.php?page=mizandemoimporter-wizard') ); ?>"><?php esc_html_e('Start Quickly', 'software-it-company'); ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
