<?php get_header(); 
?>

<div class="container-flex content-narrow">

<?php
    while(have_posts()) {
    the_post();
?>

<div class="content-box single-person-box">
    <div class="single-person-image">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
        } else {
            echo "<img src='" . get_theme_file_uri('/images/default.jpg') . "' alt='default image' class='default-image'>";
        } ?>
    </div>
    <div class="single-person-information">
        <div class="single-person-header">
                <h1 class="single-person-title"><?php the_title(); ?></h1>
        </div>
        <div class="single-person-description">
            <?php the_content(); ?>
        </div>
    
    </div>

</div>
<?php
}
?>
</div>
<?php get_footer(); ?>