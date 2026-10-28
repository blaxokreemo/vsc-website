<?php
/**
 * Thank-you page for the premiere launch-alert (raffle) form.
 *
 * Applies automatically to a WordPress Page with the slug
 * `premiere-thanks` (same page-{slug}.php convention as page-film.php).
 * The Page itself can be empty; this file supplies all the content.
 *
 * The raffle form POSTs to this URL, and contact_form() in functions.php
 * handles that POST from wp_head, so get_header() below must stay.
 *
 * The date and watch URL below duplicate the CONFIG block in the film
 * page template. If either changes, update both files.
 */

// Thank-you pages shouldn't show up in search results.
add_filter( 'wp_robots', 'wp_robots_no_robots' );

get_header();

$thanks_film_title   = 'New Clothes';
$thanks_premiere_when = 'Thursday, October 15 at 7:30 PM ET';
$thanks_watch_url     = 'https://youtu.be/56l2Sx5Zn6s';
?>

<div class="content-narrow container-no-flex full-page-height premiere-page">

  <div class="content-box premiere-hero">
    <h1 class="tour-title premiere-film-title">You're In!</h1>

    <div class="premiere-thanks-panel">
      <p>Thanks for signing up! The raffle will take place right before <strong><?php echo esc_html( $thanks_film_title ); ?></strong> premieres on YouTube &mdash; <?php echo esc_html( $thanks_premiere_when ); ?>.</p>
      <p>We'll pick winners at random during the 2-minute countdown, and if you're present when we announce your name, we'll get in touch and send you a Vermont Suitcase Company t-shirt. Winners are picked at random and contacted by email after the premiere.</p>
    </div>

    <p class="premiere-logline text-secondary">Want a second nudge? Set a reminder on YouTube too.</p>

    <a
      href="<?php echo esc_url( $thanks_watch_url ); ?>"
      id="yt-premiere-thanks-btn"
      class="premiere-cta"
      target="_blank"
      rel="noopener">
      <i class="fa-solid fa-bell inline-icon"></i>Set Reminder on YouTube
    </a>

    <a class="premiere-thanks-back" href="<?php echo esc_url( site_url( 'film' ) ); ?>">Back to the film page</a>
  </div>

</div>

<?php get_footer(); ?>
