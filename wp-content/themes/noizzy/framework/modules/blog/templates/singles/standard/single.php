<?php

noizzy_edge_get_single_post_format_html($blog_single_type);

do_action('noizzy_edge_after_article_content');

noizzy_edge_get_module_template_part('templates/parts/single/author-info', 'blog');

noizzy_edge_get_module_template_part('templates/parts/single/single-navigation', 'blog');

noizzy_edge_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

noizzy_edge_get_module_template_part('templates/parts/single/comments', 'blog');