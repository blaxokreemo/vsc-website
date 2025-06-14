<?php get_header(); 
?>

<div class="container-flex content-narrow">

    <?php
            $theParent = wp_get_post_parent_id(get_the_ID());
            $test_array = get_pages(array(
                'child_of' => get_the_ID()
            ));
            
            if ($theParent or $test_array) { ?>             

    <div class="page-links content-box">
        <h2 class="page-links-header"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <div class="links-box">
            <ul class="links-list">
            <?php 
            
                if ($theParent) {
                    $findChildrenOf = $theParent;
                } else {
                    $findChildrenOf = get_the_ID();
                }

            wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => $findChildrenOf,
            ));

            ?>
            </ul>
        </div>
    </div>
            <?php } ?>


    <div class="people">
        <div class="content-box people-header">
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
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail(array('class' => 'person-image'));
                        } else {
                            echo "<img src='" . get_theme_file_uri('/images/default.jpg') . "' alt='default image' class='default-image'>";
                        } ?>
                        <div class="person-information">
                            <a href="<?php the_permalink(); ?>" class="person-link">
                                <h2 class="person-name"><?php the_title(); ?></h2>
                            </a>
                            <div class="person-description">
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