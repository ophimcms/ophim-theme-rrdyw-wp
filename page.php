<?php
get_header();
?>
    <div class="row">
        <div class="stui-pannel stui-pannel-bg clearfix" style="padding: 20px">
            <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="group-film">
                    <h1><?php the_title(); ?></h1>
                    <div class="content">
                        <?php  the_content(); ?>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
<?php get_footer() ?>