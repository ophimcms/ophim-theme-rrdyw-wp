<div class="container">
    <?php
    if ( is_active_sidebar('widget-footer') ) {
        dynamic_sidebar( 'widget-footer' );
    } else {
        _e('This is widget footer. Go to Appearance -> Widgets to add some widgets.', 'ophim');
    }
    ?>
</div>
</div>
</body>
<?php wp_footer(); ?>
</html>