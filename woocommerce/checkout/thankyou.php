<?php

// =============================================================================
// WOOCOMMERCE/CHECKOUT/THANKYOU.PHP
// -----------------------------------------------------------------------------
// @version 2.0.0
// =============================================================================

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( $order ) : ?>

  <?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>

    <p><?php _e( 'Ne pare rau, dar comanda nu a putut fi plasata deoarece banca dvs. a refuzat tranzactia.', '__x__' ); ?></p>

    <p><?php
      if ( is_user_logged_in() )
        _e( 'Please attempt your purchase again or go to your account page.', '__x__' );
      else
        _e( 'Please attempt your purchase again.', '__x__' );
    ?></p>

    <p>
      <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', '__x__' ) ?></a>
      <?php if ( is_user_logged_in() ) : ?>
      <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'Contul meu', '__x__' ); ?></a>
      <?php endif; ?>
    </p>

  <?php else : ?>

    <p><?php _e( 'Multumim! Comanda a fost facuta cu succes.', '__x__' ); ?></p>

    <ul class="order_details x-alert x-alert-info x-alert-block">
      <li class="order">
        <?php _e( 'Comanda:', '__x__' ); ?>
        <strong><?php echo $order->get_order_number(); ?></strong>
      </li>
      <li class="date">
        <?php _e( 'Data:', '__x__' ); ?>
        <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
      </li>
      <li class="total">
        <?php _e( 'Total:', '__x__' ); ?>
        <strong><?php echo $order->get_formatted_order_total(); ?></strong>
      </li>
      <?php if ( $order->payment_method_title ) : ?>
      <li class="method">
        <?php _e( 'Metoda de Plata:', '__x__' ); ?>
        <strong><?php echo $order->payment_method_title; ?></strong>
      </li>
      <?php endif; ?>
    </ul>
    <div class="clear"></div>

  <?php endif; ?>

  <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
  <?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

  <p><?php _e( 'Multumim! Comanda a fost facuta cu succes.', '__x__' ); ?></p>

<?php endif; ?>