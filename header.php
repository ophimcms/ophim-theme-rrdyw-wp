<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/statics/font/iconfont.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/statics/css/stui_block.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/statics/css/stui_default.css" type="text/css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/statics/css/stui_custom.css" type="text/css">
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/statics/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/statics/js/stui_default.js"></script>
    <script>
        var SitePath = '<?= get_template_directory_uri() ?>/assets/',
            SiteAid = '10',
            SiteTid = '',
            SiteId = '';
    </script>
</head>
<body>
<?php get_template_part('templates/header') ?>
<?php if(get_option('ophim_is_ads') == 'on') { ?>
<div id=top_addd></div>
<?php } ?>
<div class="container">


