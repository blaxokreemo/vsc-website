<?php get_header(); ?>

<div class="content-narrow container-flex full-page-height">
  <div class="tour-dates">
    <div class="content-box tour-header">
      <h1 class="tour-header">Winter 2025 Tour Dates</h1>
    </div>
    <div class="content-box performance-container">
        <h1 class="tour-title">King Wenceslas</h1>
        <h2 class="tour-subtitle">A Vermont Suitcase Holiday Show</h2>
        <div class="performance-table">
          <?php
          $today = date('Ymd');
          $homepagePerformances = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'performance',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_key' => 'date',
              'meta_query' => array(
                array(
                  'key' => 'date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                )
              )
            )
          );

          while($homepagePerformances->have_posts()) {
            $homepagePerformances->the_post(); 
          
            ?>
            <a href="<?php the_permalink(); ?>" class="performance-link">
            <div class="performance-entry">
              <div class="performance-date">
                <div class="date">
                <?php 
                  $date = get_field('date');
                  $formattedDate = date('l, F j', strtotime($date));
                  echo $formattedDate; ?>
                </div>
                <div class="time">
                <?php
                  $time = get_field('time');
                  echo $time;  
                ?>
                </div>
              </div>  
              <div class="performance-location">
                <div class="venue">
                <?php 
                  $venue = get_field('venue');
                  echo $venue; 
                ?>
                </div>
                <div class="address">
                <?php 
                  $address = get_field('address');
                  echo $address;
                ?>
                </div>
              </div>
            </div>
            </a>

          <?php 
          }
          ?>

      </div>
          
    </div>
  </div>

  <!-- <div class="poster-box content-box"> -->
    <img src="<?php echo get_theme_file_uri('/images/poster.jpg') ?>" alt="poster for The Duke Is Dead" class="poster-image">
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
