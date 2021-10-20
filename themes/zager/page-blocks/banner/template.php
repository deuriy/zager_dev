<?php
$banner = $field['banner_type'] === 'default_banner' ? get_field('default_page_banner', 'option') : $field;
get_template_part( 'block-templates/page-banner' );
?>