<?php
get_header();
?>

<?php
$regions = oIsset($_GET,'regions');
$genres = oIsset($_GET,'genres');
$years = oIsset($_GET,'years');
$categories = oIsset($_GET,'categories');
?>
<div class="row">
    <div class="stui-pannel stui-pannel-bg clearfix">
        <div class="stui-pannel-box">
            <div class="stui-pannel_hd">
                <div class="stui-pannel__head active bottom-line clearfix">
                    <h3 class="title"><img src="<?= get_template_directory_uri() ?>/assets/statics/icon/dIYNSKsIQLBx.png">Tất cả
                    </h3>
                    <ul class="nav nav-page pull-right">
                    </ul>

                </div>
                <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                    <li><span class="text-muted">Danh mục</span></li>
                    <?php $slug = get_option('ophim_slug_categories') ? get_option('ophim_slug_categories') : 'genres';
                    foreach (get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,)) as $categorie) : ?>
                        <li><a class="<?php if ($categorie->slug == $categories) : ?> active <?php endif ?>"
                               href="<?= home_url("/?s=" . $s . "&genres=" . $genres . "&regions=" . $regions . "&years=" . $years . "&categories=" . $categorie->slug) ?>"><?= $categorie->name ?></a>
                        </li>
                    <?php endforeach; ?>


                </ul>
                <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                    <li><span class="text-muted">Thể loại</span></li>
                    <?php $slug = get_option('ophim_slug_genres') ? get_option('ophim_slug_genres') : 'genres';
                    foreach (get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,)) as $genre) : ?>
                        <li><a class=" <?php if ($genre->slug == $genres) : ?> active <?php endif ?>"
                               href="<?= home_url("/?s=" . $s . "&genres=" . $genre->slug . "&regions=" . $regions . "&years=" . $years . "&categories=" . $categories) ?>"><?= $genre->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="stui-screen__list type-slide clearfix">
                    <li><span class="text-muted">Quốc gia</span></li>

                    <?php $slug = get_option('ophim_slug_regions') ? get_option('ophim_slug_regions') : 'regions';
                    foreach (get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,)) as $region) : ?>
                        <li><a class=" <?php if ($region->slug == $regions) : ?> active <?php endif ?>"
                               href="<?= home_url("/?s=" . $s . "&genres=" . $genres . "&regions=" . $region->slug . "&years=" . $years . "&categories=" . $categories) ?>"><?= $region->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="stui-screen__list type-slide clearfix">
                    <li><span class="text-muted">Năm</span></li>
                    <?php $slug = get_option('ophim_slug_years') ? get_option('ophim_slug_years') : 'years';
                    foreach (get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,)) as $year) : ?>
                        <li><a class=" <?php if ($year->slug == $years) : ?> active <?php endif ?>"
                               href="<?= home_url("/?s=" . $s . "&genres=" . $genres . "&regions=" . $regions . "&years=" . $year->slug . "&categories=" . $categories) ?>"><?= $year->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="stui-pannel_bd">
                <ul class="stui-vodlist clearfix">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            echo ' <li class="col-md-6 col-sm-4 col-xs-3">';
                            get_template_part('templates/section/section_thumb_item');
                            echo '</li>';
                        }
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
