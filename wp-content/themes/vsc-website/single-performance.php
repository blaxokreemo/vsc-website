<?php get_header(); 
?>

<div class="container-flex content-narrow">

<?php
    while(have_posts()) {
    the_post();
?>

<div class="content-box single-performance-box">
    <div class="single-performance-header">
            <h1 class="single-performance-title"><?php the_title(); ?></h1>
            <div class="single-performance-date">
            <?php 
                $date = get_field('date');
                $formattedDate = date('l, F j', strtotime($date));
                echo $formattedDate; ?>
            </div>
            <div class="single-performance-time">
            <?php
                $time = get_field('time');
                echo $time;  
            ?>
            </div>
    </div>

    <div class="single-performance-image">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
        } else {
            echo "<img src='" . get_theme_file_uri('/images/default.jpg') . "' alt='default image' class='default-image'>";
        } ?>
    </div>

    <div class="single-performance-information">
    
        <div class="single-performance-location">
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
        
        <div class="single-performance-description">
            <?php the_content(); ?>

        </div>
    </div>
</div>
<?php
}
?>
</div>
<?php get_footer(); ?>