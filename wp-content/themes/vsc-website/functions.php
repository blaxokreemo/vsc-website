<?php

function bobbi_files() {
    // wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Gidugu&family=Signika+Negative:wght@300..700&display=swap', [], null);
    wp_enqueue_style('vsc_styles', get_theme_file_uri('/css/vsc-style.css'));
    // wp_enqueue_style('adobe_fonts', '//use.typekit.net/lxj4hjt.css');
    // wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    // wp_enqueue_script('university_main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'bobbi_files');

function vsc_post_types() {
    register_post_type('performance', array(
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'labels' => array(
            'name' => 'Performances',
            'add_new_item' => 'Add New Performance',
            'edit_item' => 'Edit Performance',
            'all_items' => 'All Performances',
            'singular_name' => 'Performance'
        ),
        'menu-icon' => 'dashicons-calendar'
    ));
}

add_action('init', 'vsc_post_types');

function vsc_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('perfLandscape', 400, 260, true);
    add_image_size('perfPortrait', 480, 650, true);
}

add_action('after_setup_theme', 'vsc_features');

?>