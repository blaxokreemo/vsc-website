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

            <div class="time-block">
                <div class="year">2019</div>
                <div class="event">
                    <h2 class="event-title">The Doctor and the Dowry</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/doctor.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Company member Jonny Flood mashed up a handful of Moliere plots for 2019,
                            the first of many original adaptations we would create.
                        </p>
                    </div>                    
                </div>
            </div>

            <div class="time-block">
                <div class="year">2020</div>
                <div class="event">
                    <h2 class="event-title">Pandemic Pause</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/bunny.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">It was difficult to do live theater in 2020, but we did manage to get together
                            for an outdoor retreat to begin writing our adaptation of Robin Hood, which we would perform the following year.
                             We also began discussing plans for a film...
                        </p>
                    </div>                    
                </div>
            </div>

            <div class="time-block">
                <div class="year">2021</div>
                <div class="event">
                    <h2 class="event-title">Robin Hood</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/robinhood.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Our adaptation of Robin Hood had loads of puppets and one of our most ambitious
                            chase scenes to date. We also began pre-production for New Clothes, our first feature film.
                        </p>
                    </div>                    
                </div>
            </div>

            <div class="time-block">
                <div class="year">2022</div>
                <div class="event">
                    <h2 class="event-title">New Clothes</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/camera.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">We filmed New Clothes in seven days in an apartment on Main Street in Brattleboro.
                            It was so much work to prepare for the shoot that we had to take a break from touring a live
                            show, but we began working on plans for the next year.
                        </p>
                    </div>                    
                </div>
            </div>

            <div class="time-block">
                <div class="year">2023</div>
                <div class="event">
                    <h2 class="event-title">The Feeble Fantastical</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/feeble.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">We returned to the stage with company member Marcel Freda's adaptation
                            of Moliere's The Imaginary Invalid. We also decided to start a winter tour...
                        </p>
                    </div>
                    <h2 class="event-title">King Wenceslas</h2>    
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/wenceslas.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">With a four-person cast and a smaller tour, we performed company member Rosa
                            Palmeri's adaptation of King Wenceslas in December. It was such a success, that we still perform it every
                            year, adding new material each time - a holiday tradition was born!
                        </p>
                    </div>                
                </div>
            </div>

            <div class="time-block">
                <div class="year">2024</div>
                <div class="event">
                    <h2 class="event-title">Pillows All the Way Down</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/pillows.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Rosa Palmeri's adaptation of Moliere's The Miser involved a
                            pyramid scheme to sell pillows for ringbearers.
                        </p>
                    </div>
                    <h2 class="event-title">King Wenceslas</h2>    
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/wenceslas.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Our second year performing King Wenceslas and a successful experiment!
                            We had many returning audience members and many new ones, too.
                        </p>
                    </div>                
                </div>
            </div>

            <div class="time-block">
                <div class="year">2025</div>
                <div class="event">
                    <h2 class="event-title">The Duke Is Dead</h2>
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/duke.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">Company member Jonny Flood's original murder mystery comedy
                            was a new genre for us, and we had a blast. 
                        </p>
                    </div>
                    <h2 class="event-title">King Wenceslas</h2>    
                    <div class="event-description-and-image">
                        <img src="<?php echo get_theme_file_uri('images/wenceslas.jpg') ?>" alt="" class="event-image">
                        <p class="event-description">We will return in December with our third iteration of King Wenceslas!
                        </p>
                    </div>                
                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>