<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Roboto:300,400,500,700,300italic,400italic,500italic,700italic');
    queue_css_url('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    queue_css_file(array('iconfonts', 'normalize', 'style'), 'screen');
    queue_css_file('print', 'print');
    $gt_css = '
        .goog-te-gadget{font-size: 19px !important;}
        .goog-te-gadget-simple{background-color: transparent !important; border: none !important; float:right; padding: 0 0 24px 0; margin: 0; display: block;}
        .goog-te-gadget-simple span{color: #ccc; text-decoration: none; font-size: 16px; font-weight: 300;}
        .goog-te-gadget-icon{display:none !important;}
    ';
    queue_css_string($gt_css);
    queue_css_string('.fa { padding: 5px; font-size: 30px; width: 40px; text-align: right; text-decoration: none; border-radius: 50%;}');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php 
    queue_js_file(array(
        'vendor/selectivizr',
        'vendor/jquery-accessibleMegaMenu',
        'vendor/respond',
        'jquery-extra-selectors',
        'seasons',
        'globals'
    )); 
    ?>

    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">
        <header role="banner">
            <div id="site-title">
                <?php echo link_to_home_page(theme_logo()); ?>
            </div>
            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?Php echo search_form(); ?>
                <?php endif; ?>
            </div>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
        </header>

        <div style="float:right; display: block; padding-top:5px; padding-right:6.77966%;">
            <a href="https://twitter.com/HarveyMemories" class="fa fa-twitter"></a>
            <a href="https://www.facebook.com/harveymemoriesproject/" class="fa fa-facebook"></a>
        </div>

        <nav id="top-nav" class="top" role="navigation">
            <?php echo public_nav_main(); ?>
        </nav>

        <div id="content" role="main" tabindex="-1">
            <?php
                if(! is_current_url(WEB_ROOT)) {
                  fire_plugin_hook('public_content_top', array('view'=>$this));
                }
            ?>
