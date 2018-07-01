<?php

/*
  Plugin Name: Платежный сервис Wallet One
  Plugin URI: https://www.walletone.com/ru/merchant/modules/wordpress-woocommerce/
  Description: Платежный сервис Wallet One позволяет совершать платежи, переводы, оплату товаров и услуг. Начиная с версии 4.0.0 требуется версия PHP выше 5.4.
  Version: 4.4.0
  Author: Wallete One 
  Author URI: www.walletone.com

  Copyright 2017

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

define('W1_DIR', plugin_dir_path(__FILE__));

/* start function plugin */
add_action('plugins_loaded', 'woocommerce_w1', 0);

/**
 * Add the gateway to WooCommerce
 * */
function W1AddGateway($methods) {
  $methods[] = 'WC_Gateway_W1';
  return $methods;
}

/*
 * Function for load plugin
 */

function woocommerce_w1() {
  if (!class_exists('WC_Payment_Gateway')) {
    return;
  }
  if (class_exists('WC_Gateway_W1')) {
    return;
  }
  require_once( W1_DIR . 'class.w1.php' );
  
  if( class_exists('WooCommerce_Payment_Status') ) {
    add_filter( 'woocommerce_valid_order_statuses_for_payment', array( 'WC_Gateway_W1', 'valid_order_statuses_for_payment' ), 52, 2 );
  }

  add_filter('woocommerce_payment_gateways', 'W1AddGateway');
  
}

?>
