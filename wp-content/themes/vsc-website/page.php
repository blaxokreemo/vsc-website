<?php get_header(); 
?>

<div class="container-flex content-narrow room-for-menu">

    <?php
  get_template_part('template-parts/side-menu');
    ?>

    <?php while(have_posts()) {
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
