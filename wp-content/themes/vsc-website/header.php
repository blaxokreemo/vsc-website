<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<header class="site-header" style="background-image: url('<?php echo get_theme_file_uri('images/header2.jpg'); ?>')">
    <div class="logo">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('images/logo.png') ?>" alt="Vermont Suitcase Company Logo" class="logo-image"></a>
    </div>
    <h1 class="site-title-text"><a href="<?php echo site_url(); ?>">Vermont Suitcase Company</a></h1>
    <div class="menu"><i class="fa-solid fa-bars secondary-color menu-bars"></i></div>
    <!-- <nav class="site-nav">
        <ul>
            <li><a href="<?php echo site_url('x') ?>">About</a></li>
            <li><a href="<?php echo site_url('x') ?>">Shows</a></li>
            <li><a href="<?php echo site_url('x') ?>">Updates</a></li>
        </ul>
    </nav> -->
</header>
<body
    <?php
        if (is_front_page()) {
            echo 'class="home"';
        } else {
            echo 'class="page"';
        }

        body_class();
    ?>>
