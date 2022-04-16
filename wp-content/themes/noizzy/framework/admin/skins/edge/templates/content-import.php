<div class="edge-tabs-content">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="import">
            <div class="edge-tab-content">
                <h2 class="edge-page-title"><?php esc_html_e('Import', 'noizzy'); ?></h2>
                <form method="post" class="edge_ajax_form edge-import-page-holder" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'noizzy'); ?>">
                    <div class="edge-page-form">
                        <div class="edge-page-form-section-holder">
                            <h3 class="edge-page-section-title"><?php esc_html_e('Import Demo Content', 'noizzy'); ?></h3>
                            <div class="edge-page-form-section">
                                <div class="edge-field-desc">
                                    <h4><?php esc_html_e('Import', 'noizzy'); ?></h4>
                                    <p><?php esc_html_e('Choose demo content you want to import', 'noizzy'); ?></p>
                                </div>
                                <div class="edge-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_example" id="import_example" class="form-control edge-form-element dependence">
                                                    <option value="noizzy"><?php esc_html_e('Noizzy Demo', 'noizzy'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edge-page-form-section">
                                <div class="edge-field-desc">
                                    <h4><?php esc_html_e('Import Type', 'noizzy'); ?></h4>
	                                <p><?php esc_html_e('Import Type', 'noizzy'); ?></p>
                                </div>
                                <div class="edge-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_option" id="import_option" class="form-control edge-form-element">
                                                    <option value=""><?php esc_html_e('Please Select', 'noizzy'); ?></option>
                                                    <option value="complete_content"><?php esc_html_e('All', 'noizzy'); ?></option>
                                                    <option value="content"><?php esc_html_e('Content', 'noizzy'); ?></option>
                                                    <option value="widgets"><?php esc_html_e('Widgets', 'noizzy'); ?></option>
                                                    <option value="options"><?php esc_html_e('Options', 'noizzy'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edge-page-form-section">
                                <div class="edge-field-desc">
                                    <h4><?php esc_html_e('Import attachments', 'noizzy'); ?></h4>
                                    <p><?php esc_html_e('Do you want to import media files?', 'noizzy'); ?></p>
                                </div>
                                <div class="edge-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="field switch">
                                                    <label class="cb-enable dependence"><span><?php esc_html_e('Yes', 'noizzy'); ?></span></label>
                                                    <label class="cb-disable selected dependence"><span><?php esc_html_e('No', 'noizzy'); ?></span></label>
                                                    <input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edge-page-form-section">
                                <div class="edge-field-desc">
                                    <input type="submit" class="btn btn-primary btn-sm " value="<?php esc_attr_e('Import', 'noizzy'); ?>" name="import" id="edge-import-demo-data" />
                                </div>
                                <div class="edge-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="edge-import-load"><span><?php esc_html_e('The import process may take some time. Please be patient.', 'noizzy') ?> </span><br />
                                                    <div class="edge-progress-bar-wrapper html5-progress-bar">
                                                        <div class="progress-bar-wrapper">
                                                            <progress id="progressbar" value="0" max="100"></progress>
                                                        </div>
                                                        <div class="progress-value">0%</div>
                                                        <div class="progress-bar-message">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edge-page-form-section edge-import-button-wrapper">
                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'noizzy') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'noizzy'); ?></li>
                                        <li> <?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'noizzy')?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>