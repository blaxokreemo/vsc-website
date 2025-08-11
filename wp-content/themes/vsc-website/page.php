<?php get_header(); 

$theParent = wp_get_post_parent_id(get_the_ID());
            $test_array = get_pages(array(
                'child_of' => get_the_ID()
            ));
            
            if ($theParent or $test_array) {
?>

<div class="container-flex content-narrow room-for-menu">

    <?php
  get_template_part('template-parts/side-menu');
            }
    else { ?>
<div class="container-flex content-narrow">
    <?php }
    
    while(have_posts()) {
      the_post(); ?>
    <div class="page-contents">
        <div class="content-box box-header">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="content-box">
            <div class="the-content">
                <?php the_content(); ?>
            </div>  
        </div>
    </div>
        <?php } ?>

    </div>
    <?php get_footer(); ?>
