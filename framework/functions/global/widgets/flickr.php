<?php

// =============================================================================
// FUNCTIONS/GLOBAL/WIDGETS/FLICKR.PHP
// -----------------------------------------------------------------------------
// Artfully based on the Okay Flickr Widget.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Create Widget
//   02. Register Widget
// =============================================================================

// Create Widget
// =============================================================================

class x_flickr_widget extends WP_Widget {

  function x_flickr_widget() {
    $widget_ops  = array( 'classname' => 'x-flickr-widget', 'description' =>  __( 'Display your latest Flickr photos', '__x__' ) );
    $control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'x-flickr-widget' );
    $this->WP_Widget( 'x-flickr-widget', __( 'X Flickr Widget', '__x__' ), $widget_ops, $control_ops );
  }

  function widget( $args, $instance ) {
    extract( $args );
    $flickr_title = apply_filters( 'widget_title', $instance['flickr_title'] );
    $flickr_id    = $instance['flickr_id'];
    $flickr_count = $instance['flickr_count'];
    echo $before_widget;
    ?>

    <div class="flickr-widget">
      <?php if ( $flickr_title ) echo $before_title . $flickr_title . $after_title; ?>
      <div class="x-flickr-wrapper">
        <div class="x-flexslider x-flexslider-flickr man">
          <ul id="flickr-<?php echo $args['widget_id']; ?>" class="x-slides">
          <?php

          if ( $flickr_id != '' ) {

            $images      = array();
            $regx        = "/<img(.+)\/>/";
            $rss_url     = 'http://api.flickr.com/services/feeds/photos_public.gne?ids=' . $flickr_id . '&lang=en-us&format=rss_200';
            $flickr_feed = simplexml_load_file( $rss_url );

            foreach( $flickr_feed->channel->item as $item ) {
              preg_match( $regx, $item->description, $matches );
              $images[] = array(
                'link'  => $item->link,
                'thumb' => $matches[ 0 ]
              );
            }

            $image_count = 0;
            if ( $flickr_count == '' ) $flickr_count = 5;

            foreach( $images as $img ) {
              if ( $image_count < $flickr_count ) {
                $img_tag = str_replace( '_m', '_b', $img[ 'thumb' ] );
                echo '<li class="x-slide"><a href="' . $img[ 'link' ] . '">' . $img_tag . '</a></li>';
                $image_count++;
              }
            }

          }

          ?>
          </ul>
        </div>
      </div>
    </div>
    <?php
    echo $after_widget; 
  }

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance;
    $instance['flickr_title'] = strip_tags( $new_instance['flickr_title'] );
    $instance['flickr_id']    = strip_tags( $new_instance['flickr_id'] );
    $instance['flickr_count'] = strip_tags( $new_instance['flickr_count'] );
    return $instance;
  }

  function form( $instance ) {
    $idgettr = 'http://idgettr.com/';
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', '__x__' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'flickr_title' ); ?>" name="<?php echo $this->get_field_name( 'flickr_title' ); ?>" value="<?php if ( isset( $instance['flickr_title'] ) ) echo $instance['flickr_title']; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php _e( 'Your Flickr User ID:', '__x__' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php if ( isset( $instance['flickr_id'] ) ) echo $instance['flickr_id']; ?>" />
      <small>Not sure what to put here? Try <a href="<?php echo $idgettr; ?>" target="_blank">idGettr</a>.</small>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'flickr_count' ); ?>"><?php _e( 'No. of Photos:', '__x__' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'flickr_count' ); ?>" name="<?php echo $this->get_field_name( 'flickr_count' ); ?>" value="<?php if ( isset( $instance['flickr_count'] ) ) echo $instance['flickr_count']; ?>" />
    </p>

    <?php
  }
}



// Register Widget
// =============================================================================

add_action( 'widgets_init', 'x_load_flickr_widget' );

function x_load_flickr_widget() {
  register_widget( 'x_flickr_widget' );
}