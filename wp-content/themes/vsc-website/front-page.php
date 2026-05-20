<?php get_header(); ?>

<div class="content-narrow container-no-flex full-page-height">
  <div class="content-box tour-header">
    <h1 class="tour-header">We have two tours in Summer 2026</h1>
    <h2 class="tour-sub-header">Film Tour in June, Theater Tour in July</h2>
  </div>
  <div class="container-flex">
    <a href="<?php echo site_url('film-tour') ?>" class="month-card grow">
      <div class="content-box box-header">
        <h1 class="tour-header"><i class="fa-solid fa-clapperboard inline-icon text-hover"></i>JUNE<i class="fa-solid fa-video inline-icon text-hover"></i></h1>
        <h2 class="tour-sub-header">Click for schedule!</h2>
      </div>
      <div class="content-box">
          <h1 class="tour-title">New Clothes</h1>
          <h2 class="tour-subtitle">A Vermont Suitcase Feature Film</h2>
          <img src="<?php echo get_theme_file_uri('/images/film-tour-small.jpg') ?>" alt="poster for New Clothes tour" class="poster-image-double">
      </div>
    </a>
    <a href="<?php echo site_url('theater-tour') ?>" class="month-card grow">
      <div class="content-box box-header">
        <h1 class="tour-header"><i class="fa-solid fa-masks-theater inline-icon text-hover"></i>JULY<i class="fa-solid fa-masks-theater inline-icon text-hover"></i></h1>
        <h2 class="tour-sub-header">Click for schedule!</h2>
      </div>
      
      <div class="content-box">
          <h1 class="tour-title">My Lady of Whims</h1>
          <h2 class="tour-subtitle">Vermont Suitcase Summer Theater</h2>
          <img src="<?php echo get_theme_file_uri('/images/whims-poster.jpg') ?>" alt="poster for My Lady of Whims" class="poster-image-double">
      </div>
    </a>
  </div>
  
  <div class="video">
    <div class="content-box">
        <h2 class="video-title">What is Vermont Suitcase Company?</h2>
    </div>
    <div class="video-box">
    <iframe title="vimeo-player" src="https://player.vimeo.com/video/1066445073?h=c030265f72" width="640" height="360" frameborder="0"    allowfullscreen></iframe>
  </div>

</div>



<?php get_footer(); ?>
