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
    <div class="title-and-menu">
        <h1 class="site-title-text"><a href="<?php echo site_url(); ?>">Vermont Suitcase Company</a></h1>
        <nav class="site-nav">
        <ul>
            <li><a href="<?php echo site_url() ?>">Schedule</a></li>
            <li><a href="<?php echo site_url('about') ?>">About</a></li>
            <li><a href="<?php echo site_url('contact') ?>">Contact</a></li>
        </ul>
    </nav>
    </div>
    <div class="menu"><i class="fa-solid fa-bars secondary-color menu-bars"></i></div>
    
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
