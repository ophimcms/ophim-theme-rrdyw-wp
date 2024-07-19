<div class="row">
    <?php if (op_get_showtime_movies() || op_get_notify()) : ?>
    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box clearfix">
            <div class="stui-pannel_hd">
                <?php if (op_get_showtime_movies()): ?>
                    <p><strong>Lịch chiếu : </strong> <?= op_get_showtime_movies(); ?></p>
                <?php endif ?>
                <?php if (op_get_notify()) : ?>
                    <p><strong>Thông báo : </strong> <?= op_get_notify() ?></p>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php endif ?>
    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box clearfix">
            <div class="stui-pannel_bd clearfix">
                <div class="col-md-wide-75 col-xs-1">
                    <div class="stui-content clearfix">
                        <div class="stui-content__thumb"><a class="stui-vodlist__thumb v-thumb lazyload"
                                                            href="<?= watchUrl() ?>"
                                                            title="<?php the_title() ?>"
                                                            data-original="<?= op_get_thumb_url() ?>"
                                                            style="background-image: url(<?= op_get_thumb_url() ?>);"><span
                                        class="play active hidden-xs"></span><span
                                        class="pic-text text-right"><?= op_get_status() ?></span></a></div>
                        <div class="stui-content__detail">
                            <h3 class="title"><?php the_title() ?></h3>
                            <p class="data"><span class="text-muted">Năm ：</span><?= op_get_year(' ') ?></p>
                            <p class="data"><span class="text-muted">Đạo diễn ：</span><?= op_get_directors(10, ', ') ?>
                            </p>
                            <p class="data"><span class="text-muted">Diễn viên：</span><?= op_get_actors(10, ', ') ?></p>

                            <p class="data"><span class="text-muted">Quốc gia：</span> <?= op_get_regions(', ') ?></p>
                            <p class="data"><span class="text-muted">Thể loại：</span> <?= op_get_genres(', ') ?></p>
                            <p class="data"><span class="text-muted">Thời lượng ：</span> <?= op_get_runtime() ?></p>
                            <p class="desc detail hidden-xs"><span class="left text-muted">Nội dung：</span><span
                                        class="detail-sketch">　<?php the_content() ?></span></p>
                            <div class="play-btn clearfix">
                                <?php if (watchUrl()) : ?>
                                    <a class="btn btn-primary" href="<?= watchUrl() ?>">Xem phim</a>
                                <?php endif ?>
                                <?php if (op_get_trailer_url()) :
                                    parse_str(parse_url(op_get_trailer_url(), PHP_URL_QUERY), $my_array_of_vars);
                                    $video_id = $my_array_of_vars['v'];
                                    ?>
                                    <a class="btn btn-primary fancybox fancybox.iframe"
                                       href="https://www.youtube.com/embed/<?= $video_id ?>">Trailer</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-wide-25 hidden-md hidden-sm hidden-xs">
                    <div class="text-center" style="padding: 15px;margin-top: 50px">
                        <div class="rating-content">
                            <div id="movies-rating-star" style="height: 18px;"></div>
                            <div style="margin-top: 5px">
                                (<?= op_get_rating(); ?>
                                sao
                                /
                                <?= op_get_rating_count() ?> đánh giá)
                            </div>
                            <div id="movies-rating-msg"></div>
                        </div>
                        <div style="margin-top: 20px">
                            <p class="font-12">Đánh giá</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head bottom-line active clearfix">
                    <h3 class="title"><img src="<?= get_template_directory_uri() ?>/assets/statics/icon/icon_23.png"
                                           alt="404">Bình luận</h3></div>
            </div>
            <div class="stui-pannel_bd col-pd clearfix">
                <div style="width: 100%; background-color: #fff;margin-top: 10px">
                    <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                         data-numposts="5" data-colorscheme="light" data-lazy="true">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 播放列表-->
    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head clearfix">
                    <h3 class="title">
                        <img src="<?= get_template_directory_uri() ?>/assets/statics/icon/icon_6.png">Có thể bạn thích
                    </h3>
                </div>
            </div>
            <div class="stui-pannel_bd">
                <ul class="stui-vodlist__bd clearfix">
                    <?php
                    $postType = 'ophim';
                    $taxonomyName = 'ophim_genres';
                    $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                    if ($taxonomy) {
                        $category_ids = array();
                        foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                        $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                        $my_query = new wp_query($args);

                        if ($my_query->have_posts()):
                            while ($my_query->have_posts()):$my_query->the_post(); ?>
                                <li class="col-md-6 col-sm-4 col-xs-3">
                                    <?php get_template_part('templates/section/section_thumb_item'); ?>
                                </li>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 猜你喜欢-->
</div>
<?php add_action('wp_footer', function () { ?>
    <script src="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.js"></script>
    <link href="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.css" rel="stylesheet"
          type="text/css"/>
    <script>
        var rated = false;
        $('#movies-rating-star').raty({
            score: <?= op_get_rating(); ?>,
            number: 10,
            numberMax: 10,
            hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
                'rất hay', 'siêu phẩm'
            ],
            starOff: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-off.png',
            starOn: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-on.png',
            starHalf: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-half.png',
            click: function (score, evt) {
                if (rated) return
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    type: 'POST',
                    data: {
                        action: "ratemovie",
                        rating: score,
                        postid: '<?php echo get_the_ID(); ?>',
                    },
                }).done(function (data) {
                    $('#movies-rating-msg').html(`Bạn đã đánh giá ${score} sao cho phim này!`);
                });
                rated = true;
                //$('#movies-rating-star').data('raty').readOnly(true);
            }
        });
    </script>
    <script src="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                autoSize: false,
                closeClick: false,
                openEffect: 'none',
                closeEffect: 'none'
            });
        });

    </script>
<?php }) ?>


