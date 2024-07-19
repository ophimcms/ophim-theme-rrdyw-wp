<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
        <div class="swiper-slide">
            <a class="dymrslide banner"  href="<?php the_permalink(); ?>"
               style="background: url(<?= op_get_poster_url() ?>) center no-repeat; background-size: cover;">
                <div class="focus_leftshode focusleftshode"></div>
                <div class="focus_rightshode focusrightshode"></div>
                <div class="focus_topshode focustopshode"></div>
                <div class="focus_bottomshode focusbottomshode"></div>
                <div class="txt-info">
                    <p class="name"><?php the_title(); ?></p>
                    <p class="info"><?= op_get_original_title() ?></p></div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>