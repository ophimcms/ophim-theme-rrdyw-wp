<?php
get_header();
?>
    <div class="row">
        <div class="stui-pannel stui-pannel-bg clearfix">
            <?php if (is_active_sidebar('widget-area')) {
                dynamic_sidebar('widget-area');
            } else {
                _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
            }
            ?>
        </div>
    </div>


<?php get_footer() ?>