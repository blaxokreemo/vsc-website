<?php get_header(); ?>

<div class="container-flex-no-padding content-narrow mailing-list-button">
  <button id="mailing-list-button">Join Our Mailing List</button>
</div>



<div class="content-narrow container-flex full-page-height">
  <div class="tour-dates">
    <div class="content-box tour-header">

    <h1 class="tour-header">We'll be back on the road this summer!</h1>
      
    </div>
    
    <div class="content-box performance-container">

        <h2 class="tour-subtitle">Thanks for coming to see</h2>
        <h1 class="tour-title">King Wenceslas</h1>

        <div class="content-box the-content">
          <img src="<?php echo get_theme_file_uri('/images/wenceslas-fan.jpg') ?>" alt="wind scene from King Wenceslas" class="content-image">
        </div>
          
    </div>
  </div>

  <!-- <div class="poster-box content-box"> -->
    <img src="<?php echo get_theme_file_uri('/images/wenceslas-poster.jpg') ?>" alt="poster for King Wenceslas" class="poster-image">
  <!-- </div> -->
  
  <div class="video">
    <div class="content-box">
        <h2 class="video-title">What is Vermont Suitcase Company?</h2>
    </div>
    <div class="video-box">
    <iframe title="vimeo-player" src="https://player.vimeo.com/video/1066445073?h=c030265f72" width="640" height="360" frameborder="0"    allowfullscreen></iframe>
  </div>

  <div class="content-box">
    <h2 class="tour-subtitle">Vermont Suitcase Company is proudly sponsored by:</h2>
    <img src="<?php echo get_theme_file_uri('/images/foardpanel-transp.png') ?>" alt="Foard Panel logo" class="sponsor-image">
  </div>

</div>



<?php get_footer(); ?>
