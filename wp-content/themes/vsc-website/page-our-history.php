<?php get_header(); 
?>

<div class="container-flex content-narrow room-for-menu">

<?php
  get_template_part('template-parts/side-menu');
?>

    <div class="people">
        <div class="content-box box-header">
            <h1 class="people-header">Our History</h1>
        </div>
        <div class="history-container">
            <div class="time-block">
                <div class="year">2018</div>
                <div class="event">
                    <h2 class="event-title">A Midsummer Night's Dream</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/midsummer.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Vermont Suitcase Company begins with our 2018 tour of A Midsummer Night's Dream.</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>