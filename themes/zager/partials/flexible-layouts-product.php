<?php
$layouts = get_field('product_page_blocks');

if ($layouts) {
    foreach ($layouts as $layout) {
        $layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
        $template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
        if ($template) {
                $field = $layout; // Change layout to a friendly name.
                include($template); // if locate_template returns false, include(false) will throw an error
            }
        }
    }
?>