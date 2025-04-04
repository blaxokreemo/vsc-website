<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<header class="site-header" style="background-image: url('<?php echo get_theme_file_uri('images/header2.jpg'); ?>')">
    <h1 class="site-title-text"><a href="<?php echo site_url(); ?>">Vermont Suitcase Company</a></h1>
    <!-- <nav class="site-nav">
        <ul>
            <li><a href="<?php echo site_url('x') ?>">About</a></li>
            <li><a href="<?php echo site_url('x') ?>">Shows</a></li>
            <li><a href="<?php echo site_url('x') ?>">Updates</a></li>
        </ul>
    </nav> -->
</header>
<body <?php body_class(); ?>>
