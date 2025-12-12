</div>

<div class="signup-overlay" id="signup-overlay">
  <div class="signup-content">
    <div class="close-button" id="close-button"><i class="fa-solid fa-square-xmark icon"></i></div>
    <h2 class="mail-text">Join Our Mailing List</h2>
    <form id="mailing-list-form" action="<?php echo site_url('/subscribed') ?>" method="post">
      
      <div class="popup-form-element">
        <label for="name">Name:</label>
        <input type="text" id="name" name="form-name" placeholder="Enter your name">
      </div>
      
      <div class="popup-form-element">
        <label for="email">Email:</label>
        <input type="email" id="email" name="form-email" placeholder="Enter your email address" required>
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
<?php wp_footer(); ?>

</body>
</html>
