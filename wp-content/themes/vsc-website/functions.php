<?php

function bobbi_files() {
    // wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Gidugu&family=Signika+Negative:wght@300..700&display=swap', [], null);
    wp_enqueue_style('vsc_styles', get_theme_file_uri('/css/vsc-style.css'));
    // wp_enqueue_style('adobe_fonts', '//use.typekit.net/lxj4hjt.css');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
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
        'menu_icon' => 'dashicons-calendar'
    ));
    
    register_post_type('person', array(
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'labels' => array(
            'name' => 'People',
            'add_new_item' => 'Add New Person',
            'edit_item' => 'Edit Person',
            'all_items' => 'All People',
            'singular_name' => 'Person'
        ),
        'menu_icon' => 'dashicons-groups'
    ));

    register_post_type('show', array(
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'labels' => array(
            'name' => 'Shows',
            'add_new_item' => 'Add New Show',
            'edit_item' => 'Edit Show',
            'all_items' => 'All Shows',
            'singular_name' => 'Show'
        ),
        'menu_icon' => 'dashicons-buddicons-groups'
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

function contact_form() {
    if(isset($_POST['contact-submit']))
    {
        $contact_name = sanitize_text_field($_POST['form-name']);
        $contact_email = sanitize_text_field($_POST['form-email']);
        $contact_message = sanitize_textarea_field($_POST['form-message']);
        $contact_subscribe = isset($_POST['form-subscribe']) ? 'Yes' : 'No';

        $to = 'contactsubmissions@vermontsuitcasecompany.com';
        $subject = 'Contact Form Submission from ' . $contact_name;
        $message = 'You have received a new message from the contact form on your website.' . "\n\n";
        $message .= 'Name: ' . $contact_name . "\n";
        $message .= 'Email: ' . $contact_email . "\n";
        $message .= 'Message: ' . "\n" . $contact_message . "\n";
        $message .= 'Subscribed to mailing list: ' . $contact_subscribe . "\n";

        wp_mail($to, $subject, $message);
        
        // Define the URL and data
        $url = 'http://newsletter.vermontsuitcasecompany.com:9000/subscription/form';
        $data = ['email' => $contact_email, 'name' => $contact_name, 'l' => '646eba37-2220-4093-ad96-667cba6dc7fd'];

        // Prepare POST data
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
            ],
        ];

        // Create stream context
        $context  = stream_context_create($options);

        // Perform POST request
        $response = file_get_contents($url, false, $context);

    }
}

add_action('wp_head', 'contact_form')

?>