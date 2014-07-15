<?php

// =============================================================================
// VIEWS/GLOBAL/_ENTRY-SHARE.PHP
// -----------------------------------------------------------------------------
// Share the entry across various social networks.
// =============================================================================

?>

<?php

$share_project_title = get_theme_mod( 'x_portfolio_share_project_title' );
$enable_facebook     = get_theme_mod( 'x_portfolio_enable_facebook_sharing' );
$enable_twitter      = get_theme_mod( 'x_portfolio_enable_twitter_sharing' );
$enable_google_plus  = get_theme_mod( 'x_portfolio_enable_google_plus_sharing' );
$enable_linkedin     = get_theme_mod( 'x_portfolio_enable_linkedin_sharing' );
$enable_pinterest    = get_theme_mod( 'x_portfolio_enable_pinterest_sharing' );
$enable_reddit       = get_theme_mod( 'x_portfolio_enable_reddit_sharing' );
$enable_email        = get_theme_mod( 'x_portfolio_enable_email_sharing' );

$share_url     = urlencode( get_permalink() );
$share_title   = urlencode( get_the_title() );
$share_source  = urlencode( get_bloginfo( 'name' ) );
$share_content = urlencode( get_the_excerpt() );
$share_media   = wp_get_attachment_thumb_url( get_post_thumbnail_id() );

$facebook    = ( $enable_facebook == 1 )    ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Facebook', '__x__' ) . "\" onclick=\"window.open('http://www.facebook.com/sharer.php?u={$share_url}&amp;t={$share_title}', 'popupFacebook', 'width=650, height=270, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-facebook\"></i></a>" : '';
$twitter     = ( $enable_twitter == 1 )     ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Twitter', '__x__' ) . "\" onclick=\"window.open('https://twitter.com/intent/tweet?text={$share_title}&amp;url={$share_url}', 'popupTwitter', 'width=500, height=370, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-twitter\"></i></a>" : '';
$google_plus = ( $enable_google_plus == 1 ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Google+', '__x__' ) . "\" onclick=\"window.open('https://plus.google.com/share?url={$share_url}', 'popupGooglePlus', 'width=650, height=226, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-google-plus\"></i></a>" : '';
$linkedin    = ( $enable_linkedin == 1 )    ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on LinkedIn', '__x__' ) . "\" onclick=\"window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url={$share_url}&amp;title={$share_title}&amp;summary={$share_content}&amp;source={$share_source}', 'popupLinkedIn', 'width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-linkedin\"></i></a>" : '';
$pinterest   = ( $enable_pinterest == 1 )   ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Pinterest', '__x__' ) . "\" onclick=\"window.open('http://pinterest.com/pin/create/button/?url={$share_url}&amp;media={$share_media}&amp;description={$share_title}', 'popupPinterest', 'width=750, height=265, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-pinterest\"></i></a>" : '';
$reddit      = ( $enable_reddit == 1 )      ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Reddit', '__x__' ) . "\" onclick=\"window.open('http://www.reddit.com/submit?url={$share_url}', 'popupReddit', 'width=875, height=450, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-reddit\"></i></a>" : '';
$email       = ( $enable_email == 1 )       ? "<a href=\"mailto:?subject=" . get_the_title() . "&amp;body=" . __( 'Hey, thought you might enjoy this! Check it out when you have a chance:', '__x__' ) . " " . get_permalink() . "\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share email\" title=\"" . __( 'Share via Email', '__x__' ) . "\"><span><i class=\"x-icon-envelope\"></i></span></a>" : '';

?>

<?php if ( $enable_facebook == 1 || $enable_twitter == 1 || $enable_google_plus == 1 || $enable_linkedin == 1 || $enable_pinterest == 1 || $enable_reddit == 1 || $enable_email == 1 ) : ?>

  <div class="x-entry-share man">
    <div class="x-share-options">
      <p><?php echo $share_project_title; ?></p>
      <?php echo $facebook . $twitter . $google_plus . $linkedin . $pinterest . $reddit . $email; ?>
    </div>
  </div>

<?php endif; ?>