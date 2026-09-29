<?php
/**
 * Template Name: Film Premiere Landing Page
 *
 * How to use:
 * 1. Save this file as `page-premiere.php` in your theme root
 *    (same folder as page-film.php, page-whims.php, etc).
 * 2. Edit the CONFIG block below with your film's info.
 * 3. In wp-admin, create a new Page, and in the "Page Attributes" /
 *    "Template" dropdown on the right sidebar, select
 *    "Film Premiere Landing Page". Publish.
 * 4. Add /css/premiere.css (provided separately) to your theme's
 *    /css/ folder and add this line to vsc-style.css:
 *      @import "modules/premiere.css";
 *    (or enqueue it directly in functions.php — see notes at bottom)
 */

get_header();

/* =========================================================
   CONFIG — edit these for each premiere, no HTML editing needed
   ========================================================= */
$premiere_title        = 'NEW CLOTHES';
$premiere_logline       = 'Two swindlers trick the Emperor out of his clothes in this theater company\'s take on the classic Hans Christian Andersen tale.';

$premiere_trailer_youtube_id = 'HmrumR66-4o'; // trailer clip — this is what plays in the hero facade
$premiere_watch_url          = 'https://youtu.be/56l2Sx5Zn6s'; // the actual scheduled Premiere page (full film) — CTA button target only, never embedded

// Your custom trailer thumbnail — save it into your theme's /images/ folder
// and update the filename below. Must be self-hosted (not linked from
// YouTube's own CDN) since img-src in your nginx CSP only allows 'self'.
$premiere_thumbnail_url = get_theme_file_uri( '/images/premiere-trailer-thumbnail.jpg' );

$premiere_date_display  = 'OCTOBER 15, 2026 AT 7:30 PM ET';
$premiere_date_iso      = '2026-10-15T19:30:00-04:00'; // EDT (Eastern Daylight Time — October is still DST, not EST)

$premiere_synopsis      = 'Two button peddlers try to swindle the Emperor out of his money (and his clothes) by posing as famous fashion designers. Filmed in one apartment in Brattleboro, VT over seven days, New Clothes is the first feature film by touring theater group the Vermont Suitcase Company.';

// Cast & crew — add/remove rows freely, reuses your existing .credits-grid styling
$premiere_credits = array(
    array('name' => 'Rachel Fern Durante',    'role' => 'Pia',       'photo' => 'images/pia.jpg'),
    array('name' => 'Jonny Flood',    'role' => 'Sylvester',       'photo' => 'images/sylvester.jpg'),
    array('name' => 'Marcel Freda',    'role' => 'Emperor',       'photo' => 'images/emperor.jpg'),
    array('name' => 'Doran Hamm',    'role' => 'Hamelin',       'photo' => 'images/hamelin.jpg'),
    array('name' => 'Wyndham Maxwell',    'role' => 'Gerard',       'photo' => 'images/gerard.jpg'),
    array('name' => 'Rosa Palmeri', 'role' => 'Sydney',             'photo' => 'images/sydney.jpg'),
    array('name' => 'Shannon Delaney Ward',   'role' => 'Prunella',                'photo' => 'images/prunella.jpg'),
);
/* ========================================================= */
?>

<div class="content-narrow container-no-flex full-page-height premiere-page">

  <!-- HERO -->
  <div class="content-box premiere-hero">
    <h1 class="tour-title premiere-film-title"><?php echo esc_html( $premiere_title ); ?></h1>

    <div class="premiere-release-badge">
      Streaming Free on YouTube<br>
      <span class="premiere-release-date"><?php echo esc_html( $premiere_date_display ); ?></span>
    </div>

    <div class="premiere-video-frame">
      <div class="video-wrapper">
        <!--
          Facade: shows your custom thumbnail + play button. The real
          YouTube iframe only loads once someone clicks — keeps this
          page from pulling in YouTube's player on every single page
          load, which is the heavier thing to avoid for a "lightweight,
          fast" page. The href/target here is a plain link to the real
          YouTube watch page, so this still works exactly as originally
          spec'd even if JS fails to load for any reason.
        -->
        <a
          href="<?php echo esc_url( $premiere_watch_url ); ?>"
          id="premiere-video-facade"
          class="premiere-video-facade"
          style="background-image:url('<?php echo esc_url( $premiere_thumbnail_url ); ?>');"
          aria-label="Play trailer for <?php echo esc_attr( $premiere_title ); ?>"
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
        iframe.src = 'https://www.youtube-nocookie.com/embed/<?php echo esc_js( $premiere_trailer_youtube_id ); ?>?autoplay=1';
        iframe.title = '<?php echo esc_js( $premiere_title ); ?> \u2014 Official Trailer';
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
      <i class="fa-solid fa-bell inline-icon"></i>Set Reminder on YouTube
    </a>
  </div>

  <!-- DETAILS & SYNOPSIS -->
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

  <!-- EMAIL CAPTURE -->
  <div class="content-box premiere-signup">
    <h2 class="tour-header premiere-section-heading">Get a 1-Hour Launch Alert</h2>
    <p class="text-secondary premiere-signup-subtext">One email, sent an hour before we go live — plus you'll be entered to win one of three Vermont Suitcase Company t-shirts. No spam, unsubscribe any time.</p>

    <form id="premiere-alert-form" class="premiere-alert-form" method="post" action="<?php echo esc_url( site_url( '/subscribed' ) ); ?>">
      <?php wp_nonce_field( 'contact_form_submit', 'contact_nonce' ); ?>
      <!--
        Submits to premiere-alert-submit, its own branch in
        contact_form() (functions.php) — separate from the footer's
        mailing-list-submit handler, and posts to its own Listmonk
        list rather than the main newsletter list.
      -->
      <input type="hidden" name="form-name" value="Premiere Alert Signup">

      <div class="popup-form-element premiere-email-field">
        <label for="premiere-email" class="screen-reader-text">Email</label>
        <input type="email" id="premiere-email" name="form-email" placeholder="you@email.com" required>
      </div>

      <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
        <label for="form-website">Website</label>
        <input type="text" name="form-website" id="form-website" tabindex="-1" autocomplete="off">
      </div>

      <button type="submit" name="premiere-alert-submit" class="premiere-email-submit">Notify Me</button>
    </form>

    <p class="premiere-raffle-disclosure">No purchase necessary. Open to US residents 18+. Winners will be selected at random and contacted by email after the premiere.</p>
  </div>

</div>

<?php get_footer(); ?>