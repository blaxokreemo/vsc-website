<?php
/**
 * Template Name: Film Premiere Landing Page
 */

get_header();

$premiere_title        = 'NEW CLOTHES';
$premiere_logline      = 'Two swindlers trick the Emperor out of his clothes in this theater company\'s take on the classic Hans Christian Andersen tale.';

$premiere_film_youtube_id = '56l2Sx5Zn6s';
$premiere_watch_url       = 'https://youtu.be/56l2Sx5Zn6s';

$premiere_thumbnail_url = get_theme_file_uri( '/images/premiere-trailer-thumbnail.jpg' );

$premiere_synopsis      = 'Two button peddlers try to swindle the Emperor out of his money (and his clothes) by posing as famous fashion designers. Filmed in one apartment in Brattleboro, VT over seven days, New Clothes is the first feature film by touring theater group the Vermont Suitcase Company.';

$premiere_credits = array(
    array('name' => 'Rachel Fern Durante',    'role' => 'Pia',       'photo' => 'images/pia.jpg'),
    array('name' => 'Jonny Flood',    'role' => 'Sylvester',       'photo' => 'images/sylvester.jpg'),
    array('name' => 'Marcel Freda',    'role' => 'Emperor',       'photo' => 'images/emperor.jpg'),
    array('name' => 'Doran Hamm',    'role' => 'Hamelin',       'photo' => 'images/hamelin.jpg'),
    array('name' => 'Wyndham Maxwell',    'role' => 'Gerard',       'photo' => 'images/gerard.jpg'),
    array('name' => 'Rosa Palmeri', 'role' => 'Sydney',             'photo' => 'images/sydney.jpg'),
    array('name' => 'Shannon Delaney Ward',   'role' => 'Prunella',                'photo' => 'images/prunella.jpg'),
);
?>

<div class="content-narrow container-no-flex full-page-height premiere-page">

  <div class="content-box premiere-hero">
    <h1 class="tour-title premiere-film-title"><?php echo esc_html( $premiere_title ); ?></h1>

    <a href="<?php echo esc_url( $premiere_watch_url ); ?>"><div class="premiere-release-badge">
      Now Streaming Free on YouTube
    </div></a>

    <div class="premiere-video-frame">
      <div class="video-wrapper">
        <a
          href="<?php echo esc_url( $premiere_watch_url ); ?>"
          id="premiere-video-facade"
          class="premiere-video-facade"
          style="background-image:url('<?php echo esc_url( $premiere_thumbnail_url ); ?>');"
          aria-label="Play <?php echo esc_attr( $premiere_title ); ?>"
          target="_blank"
          rel="noopener">
          <span class="premiere-play-button"><i class="fa-solid fa-play"></i></span>
        </a>
      </div>
    </div>

    <script>
    (function () {
      var facade = document.getElementById('premiere-video-facade');
      if (!facade) return;
      facade.addEventListener('click', function (e) {
        e.preventDefault();
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube-nocookie.com/embed/<?php echo esc_js( $premiere_film_youtube_id ); ?>?autoplay=1';
        iframe.title = '<?php echo esc_js( $premiere_title ); ?> \u2014 Full Film';
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
        iframe.setAttribute('allowfullscreen', '');
        facade.replaceWith(iframe);
      });
    })();
    </script>

    <p class="premiere-logline text-secondary"><?php echo esc_html( $premiere_logline ); ?></p>

    <a
      href="<?php echo esc_url( $premiere_watch_url ); ?>"
      id="yt-premiere-btn"
      class="premiere-cta"
      target="_blank"
      rel="noopener">
      <i class="fa-solid fa-play inline-icon"></i>Watch full movie on YouTube
    </a>
  </div>

  <div class="content-box premiere-details">
    <h2 class="tour-header premiere-section-heading">Synopsis</h2>
    <p class="premiere-synopsis-text"><?php echo esc_html( $premiere_synopsis ); ?></p>

    <h2 class="tour-header premiere-section-heading">Cast</h2>
    <div class="premiere-cast-grid">
      <?php foreach ( $premiere_credits as $person ) : ?>
        <div class="premiere-cast-card">
          <div class="premiere-cast-photo-wrap">
            <?php if ( ! empty( $person['photo'] ) ) : ?>
              <img src="<?php echo esc_url( get_theme_file_uri( $person['photo'] ) ); ?>" alt="<?php echo esc_attr( $person['name'] ); ?>" class="premiere-cast-photo">
            <?php else : ?>
              <img src="<?php echo esc_url( get_theme_file_uri( '/images/default.jpg' ) ); ?>" alt="" class="premiere-cast-photo">
            <?php endif; ?>
          </div>
          <div class="premiere-cast-info">
            <h3 class="premiere-cast-name"><?php echo esc_html( $person['name'] ); ?></h3>
            <h3 class="premiere-cast-role"><?php echo esc_html( $person['role'] ); ?></h3>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="content-box premiere-signup">
    <h2 class="tour-header premiere-section-heading">Stay in Touch</h2>
    <p class="text-secondary premiere-signup-subtext">Enjoyed the film? Enter your name and email to hear about our next movie and our upcoming theater tours. You can unsubscribe at any time.</p>

    <form id="premiere-alert-form" class="premiere-alert-form" method="post" action="<?php echo esc_url( site_url( '/subscribed' ) ); ?>">
      <?php wp_nonce_field( 'contact_form_submit', 'contact_nonce' ); ?>
      <div class="popup-form-element premiere-email-field">
        <label for="premiere-name" class="screen-reader-text">Name</label>
        <input type="text" id="premiere-name" name="form-name"
         placeholder="Your name" autocomplete="name" required>
      </div>

      <div class="popup-form-element premiere-email-field">
        <label for="premiere-email" class="screen-reader-text">Email</label>
        <input type="email" id="premiere-email" name="form-email" placeholder="you@email.com" required>
      </div>

      <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
        <label for="form-website">Website</label>
        <input type="text" name="form-website" id="form-website" tabindex="-1" autocomplete="off">
      </div>

      <button type="submit" name="mailing-list-submit" class="premiere-email-submit">Subscribe</button>
    </form>
  </div>

</div>

<?php get_footer(); ?>