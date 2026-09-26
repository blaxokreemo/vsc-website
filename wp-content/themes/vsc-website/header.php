<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    /*
     * Consent gate — defined before wp_head() so anything hooked into
     * wp_head (like a future Meta Pixel snippet) can check consent
     * before it loads. Usage from a future pixel loader:
     *
     *   if (window.vscConsent.isGranted()) { // load pixel }
     *   window.vscConsent.onChange(function (value) {
     *       if (value === 'granted') { // load pixel }
     *   });
     *
     * The banner itself (markup + Accept/Reject wiring) lives in
     * footer.php and calls vscConsent.grant() / vscConsent.deny().
     */
    window.vscConsent = (function () {
        var STORAGE_KEY = 'vsc_cookie_consent'; // localStorage value: 'granted' | 'denied'
        var listeners = [];

        function get() {
            try {
                return localStorage.getItem(STORAGE_KEY);
            } catch (e) {
                return null;
            }
        }

        function set(value) {
            try {
                localStorage.setItem(STORAGE_KEY, value);
            } catch (e) {}
            listeners.forEach(function (cb) { cb(value); });
        }

        return {
            isGranted: function () { return get() === 'granted'; },
            hasDecided: function () { return get() === 'granted' || get() === 'denied'; },
            grant: function () { set('granted'); },
            deny: function () { set('denied'); },
            onChange: function (cb) { listeners.push(cb); }
        };
    })();
    </script>
    <?php wp_head(); ?>
</head>
<header class="site-header" style="background-image: url('<?php echo get_theme_file_uri('images/header-small.jpg'); ?>')">
    <div class="logo">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('images/logo.png') ?>" alt="Vermont Suitcase Company Logo" class="logo-image"></a>
    </div>
    <div class="title-and-menu">
        <h1 class="site-title-text"><a href="<?php echo site_url(); ?>">Vermont Suitcase Company</a></h1>
        <nav class="site-nav">
        <ul>
            <li><a href="<?php echo site_url('film') ?>">Film</a></li>
            <li><a href="<?php echo site_url('theater-tour') ?>">Theater</a></li>
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