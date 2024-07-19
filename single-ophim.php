<?php
function add_body_class() {
    $classes[] = 'view';
    $classes[] = 'page';
    return $classes;
}
add_filter('body_class', 'add_body_class');
get_header();
op_set_post_view();
if (isEpisode()) {
    get_template_part('templates/episode');
} else {
    get_template_part('templates/single');
}
get_footer();
?>

