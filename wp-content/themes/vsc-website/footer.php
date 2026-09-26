</div>

<div class="signup-overlay" id="signup-overlay">
  <div class="signup-content">
    <div class="close-button" id="close-button"><i class="fa-solid fa-square-xmark icon"></i></div>
    <h2 class="mail-text">Join Our Mailing List</h2>
    <form id="mailing-list-form" action="<?php echo site_url('/subscribed') ?>" method="post">
      <?php wp_nonce_field('contact_form_submit', 'contact_nonce'); ?>      
      <div class="popup-form-element">
        <label for="name">Name:</label>
        <input type="text" id="name" name="form-name" placeholder="Enter your name">
      </div>
      
      <div class="popup-form-element">
        <label for="email">Email:</label>
        <input type="email" id="email" name="form-email" placeholder="Enter your email address" required>
      </div>
      <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
        <label for="form-website">Website</label>
        <input type="text" name="form-website" id="form-website" tabindex="-1" autocomplete="off">
      </div>
      <button type="submit" name="mailing-list-submit">Subscribe</button>
    </form>
  </div>

</div>

<footer class="site-footer">

<button class="footer-button" id="footer-mailing-list-button">Stay in Touch!</button>

<div class="social-media">
        <a href="https://www.instagram.com/vermontsuitcasecompany/" target="_blank"><i class="fa-brands fa-instagram social"></i></a>
        <a href="https://www.facebook.com/VermontSuitcaseCompany" target="_blank"><i class="fa-brands fa-facebook social"></i></a>
        <a href="https://www.youtube.com/@@vermontsuitcasecompany7681" target="_blank"><i class="fa-brands fa-youtube social"></i></a>
</div>

<button class="footer-button" id="donate-button"><a href="https://www.paypal.com/donate/?hosted_button_id=XSB9R86AKML24" target="_blank">Donate</a></button>


</footer>

<!--
  Cookie consent banner. Sits above the fixed .site-footer (see
  cookie-consent.css — bottom offset accounts for the footer's 80px
  height). Accept/Reject are styled with equal visual weight and there
  are no pre-checked boxes, per your privacy policy draft. The site
  stays fully usable either way — this never blocks page content.

  window.vscConsent is defined in header.php, before wp_head(), so
  that any future wp_head-hooked script (like the Meta Pixel) can
  check consent before it loads.
-->
<div class="cookie-consent-banner" id="cookie-consent-banner">
  <div class="cookie-consent-content">
    <p class="cookie-consent-text">
      We use cookies for site analytics and marketing.
      <a href="<?php echo esc_url( site_url( '/privacy-policy' ) ); ?>">Learn more in our privacy policy</a>.
    </p>
    <div class="cookie-consent-actions">
      <button type="button" class="cookie-consent-button cookie-consent-reject" id="cookie-consent-reject">Reject</button>
      <button type="button" class="cookie-consent-button cookie-consent-accept" id="cookie-consent-accept">Accept</button>
    </div>
  </div>
</div>

<script>
(function () {
    var banner = document.getElementById('cookie-consent-banner');
    if (!banner || !window.vscConsent) return;

    if (!window.vscConsent.hasDecided()) {
        banner.classList.add('is-visible');
    }

    document.getElementById('cookie-consent-accept').addEventListener('click', function () {
        window.vscConsent.grant();
        banner.classList.remove('is-visible');
    });

    document.getElementById('cookie-consent-reject').addEventListener('click', function () {
        window.vscConsent.deny();
        banner.classList.remove('is-visible');
    });
})();
</script>

<?php wp_footer(); ?>

</body>
</html>