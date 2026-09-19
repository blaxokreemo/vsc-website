<?php

function vsc_files() {
    // wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Gidugu&family=Signika+Negative:wght@300..700&display=swap', [], null);
    wp_enqueue_style('vsc_styles', get_theme_file_uri('/css/vsc-style.css'));
    // wp_enqueue_style('adobe_fonts', '//use.typekit.net/lxj4hjt.css');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
    wp_enqueue_script('vsc_js', get_theme_file_uri('/build/index.js'), array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'vsc_files');

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

add_action( 'phpmailer_init', function( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_SERVER;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->From       = SMTP_USER;
    $phpmailer->FromName   = 'WordPress Contact Form';
});

// Returns true if submission looks like spam
function vsc_is_spam_submission( $name ) {
    // Honeypot: if this hidden field is filled in, it's a bot
    if ( ! empty( $_POST['form-website'] ) ) {
        return true;
    }
    // Name filter: block names ending in "dum" (case-insensitive)
    if ( preg_match( '/dum$/i', trim( $name ) ) ) {
        return true;
    }
    return false;
}

function contact_form() {
    if ( isset( $_POST['contact-submit'] ) ) {
        // Verify nonce
        if ( ! isset( $_POST['contact_nonce'] ) || ! wp_verify_nonce( $_POST['contact_nonce'], 'contact_form_submit' ) ) {
            return;
        }
        $contact_name      = sanitize_text_field( $_POST['form-name'] );
        $contact_email     = sanitize_text_field( $_POST['form-email'] );
        $contact_message   = sanitize_textarea_field( $_POST['form-message'] );
        $contact_subscribe = isset( $_POST['form-subscribe'] ) ? 'Yes' : 'No';

        // Spam check — silently drop, don't tip off the bot
        if ( vsc_is_spam_submission( $contact_name ) ) {
            error_log( 'Contact form submission blocked as spam: ' . $contact_name );
            return;
        }

        $to      = 'contactsubmissions@vermontsuitcasecompany.com';
        $subject = 'Contact Form Submission from ' . $contact_name;
        $message  = 'You have received a new message from the contact form on your website.' . "\n\n";
        $message .= 'Name: ' . $contact_name . "\n";
        $message .= 'Email: ' . $contact_email . "\n";
        $message .= 'Message: ' . "\n" . $contact_message . "\n";
        $message .= 'Subscribed to mailing list: ' . $contact_subscribe . "\n";
        $mail_sent = wp_mail( $to, $subject, $message );
        if ( ! $mail_sent ) {
            error_log( 'wp_mail failed on contact form submission' );
        }
        if ( $contact_subscribe === 'Yes' ) {
            $url  = 'https://newsletter.vermontsuitcasecompany.com/subscription/form';
            $data = ['email' => $contact_email, 'name' => $contact_name, 'l' => '646eba37-2220-4093-ad96-667cba6dc7fd'];
            $options = [
                'http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query( $data ),
                ],
            ];
            $context  = stream_context_create( $options );
            $response = file_get_contents( $url, false, $context );
        }
    } elseif ( isset( $_POST['mailing-list-submit'] ) ) {
        // Verify nonce
        if ( ! isset( $_POST['contact_nonce'] ) || ! wp_verify_nonce( $_POST['contact_nonce'], 'contact_form_submit' ) ) {
            return;
        }
        $mailing_list_name  = sanitize_text_field( $_POST['form-name'] );
        $mailing_list_email = sanitize_text_field( $_POST['form-email'] );

        // Spam check
        if ( vsc_is_spam_submission( $mailing_list_name ) ) {
            error_log( 'Mailing list submission blocked as spam: ' . $mailing_list_name );
            return;
        }

        $to      = 'contactsubmissions@vermontsuitcasecompany.com';
        $subject = 'New Mailing List Subscription from ' . $mailing_list_name;
        $message  = 'Someone has subscribed to the mailing list using the form on our website.' . "\n\n";
        $message .= 'Name: ' . $mailing_list_name . "\n";
        $message .= 'Email: ' . $mailing_list_email . "\n";
        $mail_sent = wp_mail( $to, $subject, $message );
        if ( ! $mail_sent ) {
            error_log( 'wp_mail failed on mailing list form submission' );
        }
        $url  = 'https://newsletter.vermontsuitcasecompany.com/subscription/form';
        $data = ['email' => $mailing_list_email, 'name' => $mailing_list_name, 'l' => '646eba37-2220-4093-ad96-667cba6dc7fd'];
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query( $data ),
            ],
        ];
        $context  = stream_context_create( $options );
        $response = file_get_contents( $url, false, $context );
    }
}
add_action('wp_head', 'contact_form');

/**
 * SEO & Social Sharing: Meta Description, Open Graph, Twitter Cards, JSON-LD
 */
add_action( 'wp_head', 'vsc_seo_meta_tags', 1 );
function vsc_seo_meta_tags() {

    // --- Meta Description ---
    if ( is_singular() ) {
        $description = has_excerpt() ? get_the_excerpt() : wp_trim_words( strip_shortcodes( get_the_content() ), 30 );
    } else {
        $description = 'Vermont Suitcase Company tours the Green Mountain State twice a year with fast, funny, accessible theater. We also make movies!';
    }
    $description = esc_attr( wp_strip_all_tags( $description ) );

    // --- Title & URL for this page ---
    $page_title = is_singular() ? get_the_title() : get_bloginfo( 'name' );
    $page_url   = is_singular() ? get_permalink() : home_url( '/' );

    // --- Image fallback ---
    $default_image = get_stylesheet_directory_uri() . '/images/vsc-social-share-default.jpg';
    $og_image = ( is_singular() && has_post_thumbnail() )
        ? get_the_post_thumbnail_url( get_the_ID(), 'large' )
        : $default_image;

    ?>
    <meta name="description" content="<?php echo $description; ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php echo esc_attr( $page_title ); ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:url" content="<?php echo esc_url( $page_url ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $page_title ); ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php

    // --- JSON-LD: Organization (site-wide, only on homepage to avoid duplication) ---
    if ( is_front_page() ) {
        $organization_schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'PerformingArtsGroup', // valid schema.org type, more specific than plain Organization
            'name'     => 'Vermont Suitcase Company',
            'url'      => home_url( '/' ),
            'logo'     => $default_image,
            // TODO: add real values below, or remove lines you don't want to disclose publicly
            'sameAs'   => [
                'https://www.facebook.com/vermontsuitcasecompany',
                'https://www.instagram.com/vermonsuitcasecompany',
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode( $organization_schema ) . '</script>' . "\n";
    }

    // --- JSON-LD: Event (on singular 'performance' post type) ---
    if ( is_singular( 'performance' ) ) {
        $date    = get_field( 'date' );    // TODO: confirm ACF return format (e.g. Ymd for date_picker)
        $time    = get_field( 'time' );    // TODO: confirm ACF return format (e.g. H:i for time_picker)
        $venue   = get_field( 'venue' );
        $address = get_field( 'address' );

        if ( $date ) {
            // Attempt to combine date + time into ISO 8601 — adjust format strings to match your actual ACF output
		$datetime_string = trim( $date . ' ' . $time );
		$dt = new DateTime( $datetime_string, new DateTimeZone( 'America/New_York' ) );
            $iso_datetime    = $dt->format( 'c' );

            $event_schema = [
                '@context'  => 'https://schema.org',
                '@type'     => 'TheaterEvent',
                'name'      => get_the_title(),
                'startDate' => $iso_datetime,
                'location'  => [
                    '@type'   => 'Place',
                    'name'    => $venue ? $venue : 'TODO: default venue name',
                    'address' => $address ? $address : 'TODO: default address',
                ],
                'performer' => [
                    '@type' => 'PerformingArtsGroup',
                    'name'  => 'Vermont Suitcase Company',
                ],
                'url' => get_permalink(),
                // TODO: add 'image' => URL of a performance-specific image if available
                // TODO: add 'offers' with ticket URL/price if you sell tickets online
            ];
            echo '<script type="application/ld+json">' . wp_json_encode( $event_schema ) . '</script>' . "\n";
        }
    }
}

add_filter( 'xmlrpc_enabled', '__return_false' );

?>
