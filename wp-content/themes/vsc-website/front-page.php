<?php get_header(); ?>

<div class="container-flex-no-padding content-narrow mailing-list-button">
  <button id="mailing-list-button">Join Our Mailing List</button>
</div>

<div class="signup-overlay" id="signup-overlay">
  <div class="signup-content">
    <span class="close-button" id="close-button"><i class="fa-solid fa-square-xmark icon"></i></span>
    <h2 class="mail-text">Join Our Mailing List</h2>
    <form id="mailing-list-form" action="https://vermontsuitcasecompany.us20.list-manage.com/subscribe/post?u=0f8c3b1d4e5f6a7b8c9d0e1f2&amp;id=3a4b5c6d7e" method="post" target="_blank">
      <input type="email" name="EMAIL" placeholder="Enter your email address" required>
      <button type="submit">Subscribe</button>
    </form>
  </div>

</div>

<div class="content-narrow container-flex full-page-height">
  <div class="tour-dates">
    <div class="content-box tour-header">
      <h1 class="tour-header">Our Film at Vermont Film Festival!</h1>
    </div>
    <div class="content-box performance-container">
        <h1 class="tour-title">New Clothes</h1>
        <h2 class="tour-subtitle">Friday August 1st at 1:30 p.m.</h2>
        <h2 class="tour-subtitle">Pentangle Arts in Woodstock, VT</h2>
        <div class="content-box the-content">
          <p>Our film <i><a href="https://newclothesmovie.com" target="_blank">New Clothes</a></i> has been selected for the Vermont Film Festival in Woodstock!
            We're very excited to share it with you. Go to <a href="https://www.pentanglearts.org/event-details/vermont-film-festival-is-back" target="_blank">Pentangle Arts</a> 
            for tickets and more information.</p>
          </p>
        </div>
          
    </div>
  </div>

  <!-- <div class="poster-box content-box"> -->
    <img src="<?php echo get_theme_file_uri('/images/newclothes.jpg') ?>" alt="poster for The Duke Is Dead" class="poster-image">
  <!-- </div> -->
  
  <div class="video">
    <div class="content-box">
        <h2 class="video-title">What is Vermont Suitcase Company?</h2>
    </div>
    <div class="video-box">
    <iframe title="vimeo-player" src="https://player.vimeo.com/video/1066445073?h=c030265f72" width="640" height="360" frameborder="0"    allowfullscreen></iframe>
  </div>

</div>



<?php get_footer(); ?>
