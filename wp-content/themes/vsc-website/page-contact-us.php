<?php get_header(); 
?>

<div class="container-flex content-narrow">

<div class="page-contents">
        <div class="content-box box-header">
            <h1>Contact Us</h1>
        </div>
        <div class="content-box">
            <div class="contact-form-container the-content">
                <p class="contact-invitation">Interested in booking a show on our summer or winter tours? Questions for us? Just want to say hi? We'd love to hear from you!
                </p>
                <form class="contact-form" method="post" action="<?php echo site_url('/thankyou') ?>">
                        <div class="form-element">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="form-name" required>
                        </div>

                        <div class="form-element">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="form-email" required>
                        </div>

                        <div class="form-element">
                            <label for="message">Message:</label>
                            <textarea id="message" name="form-message" rows="5" required></textarea>
                        </div>

                        <div class="form-element" id="subscribe-checkbox">
                            <input type="checkbox" id="subscribe" name="form-subscribe" checked>
                            <label for="subscribe">Subscribe to our mailing list for updates</label>
                        </div>

                        <div class="form-element">
                            <button type="submit" name="contact-submit">Send Message</button>
                        </div>

                </form>
            </div>  
        </div>
    </div>

    

</div>
<?php get_footer(); ?>