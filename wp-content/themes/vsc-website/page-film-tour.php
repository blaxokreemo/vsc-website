<?php get_header(); ?>

<div class="content-narrow container-flex full-page-height">
  <div class="tour-dates">
    <div class="content-box tour-header">
      <h1 class="tour-header">Summer Film Tour</h1>
    </div>
    <div class="content-box performance-container">
        <h1 class="tour-title">New CLothes</h1>
        <h2 class="tour-subtitle">Based on the Hans Christian Andersen Fable</h2>
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
                  'compare' => 'BETWEEN',
                  'value' => array('20260601', '20260630'),
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

  <div>
    
    <img src="<?php echo get_theme_file_uri('/images/newclothes-laurels-small.jpg') ?>" alt="poster for New Clothes film tour" class="poster-image">

  </div>

</div>

<div class="container-no-flex content-narrow" style="padding-bottom: 80px;">
  <div class="video-wrapper">
      <iframe src="https://www.youtube.com/embed/HmrumR66-4o?si=cKNIFkoTDlI6BEnR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
</div>






<?php get_footer(); ?>
