<?php get_header(); 
?>

<div class="container-flex content-narrow room-for-menu">

<?php
  get_template_part('template-parts/side-menu');
?>

    <div class="people">
        <div class="content-box box-header">
            <h1 class="people-header">Who We Are</h1>
        </div>
        <div class="content-box people-list">
            <?php
            $people = new WP_Query(array(
                'post_type' => 'person',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            ));

            if ($people->have_posts()) {
                while ($people->have_posts()) {
                    $people->the_post();
                    ?>
                    <div class="person-item">
                        <div class="person-image-container">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail(array('class' => 'person-image'));
                        } else {
                            echo "<img src='" . get_theme_file_uri('/images/default.jpg') . "' alt='default image' class='default-image'>";
                        } ?>
                        </div>
                        <div class="person-information">
                            <a href="<?php the_permalink(); ?>" class="person-link">
                                <h2 class="person-name"><?php the_title(); ?></h2>
                            </a>
                            <div class="person-description">
                                <?php the_content(); ?>
                            </div> 
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo '<p>No people found.</p>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>