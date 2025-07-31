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
        <div class="single-person-shows">
            <?php
            $shows = get_field('shows');
            if ($shows) {
                echo '<h2>Shows:</h2>';
                echo '<ul class="single-person-shows-list">';
                foreach ($shows as $show) {
                    echo '<li><a href="' . get_permalink($show->ID) . '">' . get_the_title($show->ID) . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No shows associated with this person.</p>';
            }
            ?>
        </div>
    </div>

</div>
<?php
}
?>
</div>
<?php get_footer(); ?>