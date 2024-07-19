<?php
get_header();
?>
<div class="row">
    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head active bottom-line clearfix">
                    <h3 class="title"><img
                                src="<?= get_template_directory_uri() ?>/assets/statics/icon/dIYNSKsIQLBx.png"><?= single_tag_title(); ?>
                    </h3>
                </div>
            </div>
            <div class="stui-pannel_bd">
                <ul class="stui-vodlist clearfix">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-12 blogShort">

                                    <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                             alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                    <br>
                                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <article>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p></article>
                                    <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                                </div>

                            </div>
                        <?php }
                        wp_reset_postdata();
                    } ?>

                </ul>
            </div>
        </div>
    </div>
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
        <?php ophim_pagination(); ?>
    </ul>
    <!-- 列表翻页-->
</div>
<?php
get_footer();
?>
