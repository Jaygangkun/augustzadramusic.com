<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if (noizzy_edge_options()->getOptionValue('enable_social_share') === 'yes' && noizzy_edge_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="edge-blog-share">
        <?php
        if (noizzy_edge_core_plugin_installed()) { ?>
            <span class="edge-blog-share-label"><?php esc_html_e('Share:', 'noizzy') ?></span>
            <?php
            echo noizzy_edge_get_social_share_html(array('type' => $share_type));
        }
        ?>
    </div>
<?php } ?>