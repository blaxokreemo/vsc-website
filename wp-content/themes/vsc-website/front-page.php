<?php get_header(); ?>

<div class="content-narrow container-flex full-page-height">
  <div class="tour-dates">
    <div class="content-box">
      <h1 class="tour-title">ATTENTION: PARK MCCULLOUGH is still happening tonight at 6:00 p.m., there is a rain location at the mansion!</h1>
    </div>
    <div class="content-box tour-header">
      <h1 class="tour-header">Summer 2026 Tour Dates</h1>
    </div>
    <div class="content-box performance-container">
        <h1 class="tour-title">My Lady of Whims</h1>
        <h2 class="tour-subtitle">Adapted from the 1925 silent film</h2>
        <div class="performance-table">
          <?php
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
                  'value' => '20260701',
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
    <img src="<?php echo get_theme_file_uri('/images/whims-poster.jpg') ?>" alt="poster for My Lady of Whims" class="poster-image">
  <!-- </div> -->

</div>



<?php get_footer(); ?>
