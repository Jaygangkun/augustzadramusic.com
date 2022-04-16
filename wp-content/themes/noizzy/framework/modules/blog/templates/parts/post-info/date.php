<?php
$month = get_the_time('m');
$year = get_the_time('Y');
$title = get_the_title();
$override_default_date_format = noizzy_edge_options()->getOptionValue('override_default_date_format');
$default_date_format_class = '';
$default_date_format_class = ($override_default_date_format === 'yes') ? 'edge-custom-date-format' : 'edge-default-date-format';
?>
<div itemprop="dateCreated" class="edge-post-info-date entry-date published updated <?php echo esc_attr($default_date_format_class); ?>">
    <?php if(empty($title) && noizzy_edge_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
        <a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
    <?php } ?>
        <?php if ( $override_default_date_format === 'yes' ) { ?>
        <span class="edge-bl-date-wrap">
            <span class="edge-day"><?php echo get_the_date('d'); ?></span>
            <span class="edge-month"><?php echo get_the_date('M'); ?></span>
        </span>
        <?php } else { ?>
            <span class="edge-bl-date-wrap">
            <?php the_time(get_option('date_format')); ?>
            </span>
        <?php } ?>

        </a>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(noizzy_edge_get_page_id()); ?>"/>
</div>