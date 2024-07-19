<div class="stui-pannel-box clearfix">
    <div class="stui-pannel_hd">
        <h3 class="title">
            <img src="<?= get_template_directory_uri() ?>/assets/statics/icon/icon_6.png"><?= $title; ?></h3>
    </div>
    <div class="stui-pannel_bd">
        <ul class="stui-vodlist__bd clearfix">
                <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++;
                echo '<li class="col-md-6 col-sm-4 col-xs-3">';
                    get_template_part('templates/section/section_thumb_item');
                    echo '</li>';
                endwhile; ?>
        </ul>
    </div>
</div>