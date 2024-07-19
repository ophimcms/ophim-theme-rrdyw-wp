<div class="stui-pannel stui-pannel-bg clearfix">
    <div class="stui-pannel-box clearfix">
        <div class="col-lg-wide-75 col-xs-1 padding-0">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head clearfix"><a class="more text-muted pull-right"
                                                           href="<?= $slug; ?>">Xem thêm <i
                                class="icon iconfont icon-more"></i></a>
                    <h3 class="title"><img src="<?= get_template_directory_uri() ?>/assets/statics/icon/icon_1.png"><a
                                href="<?= $slug; ?>"><?= $title; ?></a></h3>
                </div>
            </div>
            <div class="stui-pannel_bd clearfix">
                <ul class="stui-vodlist clearfix">
                    <?php $key = 0;
                    while ($query->have_posts()) : $query->the_post();
                        $key++;
                        echo '<li class="col-md-5 col-sm-4 col-xs-3">';
                        get_template_part('templates/section/section_thumb_item');
                        echo '</li>';
                    endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head clearfix">
                    <h3 class="title"><img src="<?= get_template_directory_uri() ?>/assets/statics/icon/icon_23.png">Xem
                        nhiều</h3></div>
            </div>
            <div class="stui-pannel_bd">
                <ul class="stui-vodlist__media active col-pd clearfix">
                    <?php $key = 0;
                    while ($query->have_posts()) : $query->the_post();
                        $key++;
                        ?>
                        <?php if ($key < 4) : ?>
                            <li>
                                <div class="thumb"><a class="m-thumb stui-vodlist__thumb lazyload"
                                                      href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                                      data-original="<?= op_get_thumb_url() ?>"><span
                                                class="pic-tag pic-tag-h"><?= $key ?></span></a></div>
                                <div class="detail detail-side">
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><i
                                                    class="icon iconfont icon-more text-muted pull-right"></i> <?php the_title(); ?></a>
                                    </h4>
                                    <p class="font-12">
                                        <span class="text-muted">Thể loại：</span>
                                        <?= op_get_genres(',') ?>
                                    </p>
                                    <p class="font-12 margin-0">
                                        <span class="text-muted">Diễn viên：</span>
                                        <?= op_get_actors(1,' ,...') ?>
                                    </p>
                                </div>
                            </li>
                        <?php endif ?>
                        <?php if ($key > 3) : ?>
                            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span
                                            class="text-muted pull-right"><?= op_get_quality() ?></span><span class="badge"><?= $key ?></span><?php the_title(); ?></a>
                            </li>
                        <?php endif ?>
                    <?php endwhile; ?>
                </ul>

            </div>
        </div>
    </div>
</div>