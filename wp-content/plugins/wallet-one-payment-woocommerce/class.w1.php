<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

/**
 * Wallet One Payment Gateway class
 *
 * Extended by individual payment gateways to handle payments.
 *
 * @class       WC_W1
 * @extends     WC_Payment_Gateway
 * @version     4.4.0
 * @package     WooCommerce/Abstracts
 * @category    Abstract Class
 * @author      Wallet One
 */

class WC_Gateway_W1 extends WC_Payment_Gateway {
  
  /**
   * Declaration of class client
   * 
   * @var object
   */
  public $client;
  
  public $logger;

  public function __construct() {
    $this->id = 'w1';
    
    $lang = 'en';
    if(get_locale() == 'ru_RU'){
      $lang = 'ru';
    }
    include_once 'walletone/Classes/W1Client.php';
    $this->client = \WalletOne\Classes\W1Client::init()->run($lang);
    
    $this->logger = \Logger::getLogger(__CLASS__);
    
    $this->method_title = w1Title;
    $this->has_fields = true;

    //Initialization the form fields
    $this->init_form_fields();

    //Initialization the settings
    $this->init_settings();

    //Hel: Get setting values
    $this->title = $this->get_option('title');
    $this->enabled = $this->get_option('enabled');
    $this->description = $this->get_option('description');
    
    $this->logo = $this->get_option('logo');
    $this->icon = apply_filters('woocommerce_' . $this->id . '_icon', (!empty($this->logo) 
        ? $this->logo
        : plugins_url( 'walletone/img/W1_1.png' , __FILE__ )));

    //The connections hooks
    //add_action('valid-wc-standard-ipn-reques', array($this, 'successful_request') );
    //add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>=')) {
      add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
    }
    else {
      add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
    }
    add_action('woocommerce_receipt_' . $this->id, array(&$this, 'receipt_page'));
    add_action('woocommerce_api_wc_' . $this->id, array($this, 'return_handler'));
    
    if (!empty($_POST['WMI_ORDER_ID']) && !empty($_GET['wc-api']) && $_GET['wc-api'] == 'w1'
        && !empty($_GET['w1']) && $_GET['w1'] == 'result' || !empty($_POST['WMI_ORDER_ID']) && !empty($_GET['key'])) {
      do_action('woocommerce_api_wc_' . $this->id);
    }
  }

  /**
   * Output form of setting payment system.
   */
  public function init_form_fields() {
    //Save custom fields
    if (!empty($_POST['save'])) {
      //Save new logo
      if (!empty($_FILES) && $_FILES['woocommerce_w1_logo']['error'] == 0 && is_uploaded_file($_FILES['woocommerce_w1_logo']['tmp_name']) == true 
          && strpos($_FILES['woocommerce_w1_logo']['type'], 'image') !== false) {
        $str = explode('.', $_FILES['woocommerce_w1_logo']['name']);
        $type_file = $str[count($str) - 1];
        $uploadfile = str_replace('\\', '/', __DIR__) . '/walletone/img/logo.' . $type_file;
        $files = array_diff(scandir(str_replace('\\', '/', __DIR__) . '/walletone/img/'), array('..', '.'));
        foreach ($files as $value) {
          if (strpos($value, 'logo') !== false) {
            unlink(str_replace('\\', '/', __DIR__) . '/walletone/img/' . $value);
          }
        }
        if (move_uploaded_file($_FILES['woocommerce_w1_logo']['tmp_name'], $uploadfile) == true) {
          $_POST['woocommerce_w1_logo'] = plugins_url( 'walletone/img/logo.png' , __FILE__ );
          unset($_FILES);
        }
      }
      
      //Created new icon of payment methods
      if (!empty($_POST['woocommerce_w1_generate']) && $_POST['woocommerce_w1_generate'] == 1
          && (empty($_POST['woocommerce_w1_PTENABLED']) || is_array($_POST['woocommerce_w1_PTENABLED']))
          && (empty($_POST['woocommerce_w1_PTDISABLED']) || is_array($_POST['woocommerce_w1_PTDISABLED']))
          ) {
        $mas_ptenabled = array();
        if(!empty($_POST['woocommerce_w1_PTENABLED'])){
          $mas_ptenabled = $_POST['woocommerce_w1_PTENABLED'];
        }
        $mas_ptdisabled = array();
        if(!empty($_POST['woocommerce_w1_PTDISABLED'])){
          $mas_ptdisabled = $_POST['woocommerce_w1_PTDISABLED'];
        }
        
        if($pic = $this->client->createNewIcon($mas_ptenabled, $mas_ptdisabled)){
          if (strpos($_POST['woocommerce_w1_description'], '<img') === false) {
            $_POST['woocommerce_w1_description'] .= ' <img src="' . plugins_url( 'walletone/img/' . $pic , __FILE__ ) . '">';
          }
          else{
            $_POST['woocommerce_w1_description'] = preg_replace('/="(.*?)"/ui', '="'.plugins_url( 'walletone/img/' . $pic , __FILE__ ).'"', $_POST['woocommerce_w1_description']);
          }
        }
      }
      
      //Conversion the array to the string.
      $mas_method = array('PTENABLED', 'PTDISABLED');
      foreach ($mas_method as $v) {
        if (!empty($_POST['woocommerce_w1_' . $v]) && is_array($_POST['woocommerce_w1_' . $v])) {
          $_POST['woocommerce_w1_' . $v] = implode(',', $_POST['woocommerce_w1_' . $v]);
        }
      }
    }
    
    //Getting the path of logo
    $icon = plugins_url( 'walletone/img/W1_1.png' , __FILE__ );
    $files = array_diff(scandir(str_replace('\\', '/', __DIR__) . '/walletone/img/'), array('..', '.'));
    foreach ($files as $value) {
      if (strpos($value, 'logo.') !== false) {
        $icon = plugins_url( 'walletone/img/'.$value , __FILE__ );
        break;
      }
    }
    
    //Get order status
    $statuses = wc_get_order_statuses();
    
    $options = get_option('woocommerce_' . $this->id . '_settings');
    $this->client->setSettings($this->getOptions());
    
    //The determination of activity plugin
    if (!$this->client->getSettings()->required()) {
      $this->enabled = false;
      $options['enabled'] = 'no';
      
      $this->client->errors = array_merge($this->client->errors, $this->client->getSettings()->errors);
      $this->client->messages = array_merge($this->client->messages, $this->client->getSettings()->messages);
    }
    
    $options['return_url'] = 'yes';
    update_option('woocommerce_' . $this->id . '_settings', $options);

    //The creation a array the payments settings in admin panel.
    $this->form_fields = array(
      'enabled' => array(
        'title' => w1SettingsActive,
        'type' => 'checkbox',
        'label' => ' ',
        'default' => 'no'
      ),
      'title' => array(
        'title' => w1SettingsName,
        'type' => 'text',
        'default' => w1Title
      ),
      'description' => array(
        'title' => w1SettingsDesc,
        'type' => 'textarea',
        'description' => '',
        'default' => w1TitleDesc
      ),
      'logo' => array(
        'title' => w1SettingsLogo,
        'type' => 'file',
        'description' => '<img src="' . $icon . '?v='.(!empty($_POST['woocommerce_w1_logo']) ? rand(1000, 9999) : '').'" width="70">',
        'default' => str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__)) . '/walletone/img/W1_1.png'
      ),
      'generate' => array(
        'title' => w1SettingsCreateIcon,
        'type' => 'checkbox',
        'default' => 'yes',
        'label' => ' '
      ),
      'MERCHANT_ID' => array(
        'title' => w1SettingsMerchant.' *',
        'type' => 'text',
        'description' => w1SettingsMerchantDesc,
        'default' => ''
      ),
      'SIGNATURE_METHOD' => array(
        'title' => w1SettingsSignatureMethod.' *',
        'type' => 'select',
        'description' => w1SettingsSignatureMethodDesc,
        'options' => $this->client->getSettings()->signatureMethodArray,
        'default' => 'md5'
      ),
      'SIGNATURE' => array(
        'title' => w1SettingsSignature.' *',
        'type' => 'text',
        'description' => w1SettingsSignatureDesc,
        'default' => ''
      ),
      'CURRENCY_ID' => array(
        'title' => w1SettingsCurrency.' *',
        'type' => 'select',
        'options' => $this->client->getSettings()->currencyName,
        'default' => '643'
      ),
      'currency_default' => array(
        'title' => w1SettingsCurrencyDefault,
        'type' => 'checkbox',
        'default' => 'no',
        'label' => w1SettingsCurrencyDefaultDesc
      ),
      'redirect' => array(
        'title' => w1SettingsRedirect,
        'type' => 'checkbox',
        'default' => 'no',
        'label' => ' '
      ),
      'CULTURE_ID' => array(
        'title' => w1SettingsCulture.' *',
        'type' => 'select',
        'options' => $this->client->getSettings()->cultureArray,
        'default' => 'ru-RU'
      ),
      'order_status_sucess' => array(
        'title' => w1SettingsOrderStatusSuccess,
        'type' => 'select',
        'options' => $statuses,
        'default' => 'wc-processing'
      ),
      'order_status_waiting' => array(
        'title' => w1SettingsOrderStatusWaiting,
        'type' => 'select',
        'options' => $statuses,
        'default' => 'wc-pending'
      ),
      'return_url' => array(
        'title' => w1SettingsReturnUrl,
        'type' => 'checkbox',
        'label' => get_site_url().'/?wc-api=w1&w1=result',
        'description' => w1SettingsReturnUrlDesc,
        'default' => 'yes',
        'disabled' => true
      ),
      
      'tax_type' => array(
        'title' => w1SettingsTaxType,
        'type' => 'select',
        'options' => [
          'tax_ru_1' => w1SettingsTaxTypeOptionNo,
          'tax_ru_2' => w1SettingsTaxTypeOption0,
          'tax_ru_3' => w1SettingsTaxTypeOption10,
          'tax_ru_4' => w1SettingsTaxTypeOption18,
          'tax_ru_5' => w1SettingsTaxTypeOption10Inc,
          'tax_ru_6' => w1SettingsTaxTypeOption18Inc,
        ],
      ),

      'PTENABLED' => array(
        'title' => w1SettingsPtenabled,
        'type' => 'hidden',
        'default' => ''
      ),
      'PTDISABLED' => array(
        'title' => w1Settings_Ptdisabled,
        'type' => 'hidden',
        'default' => ''
      )
    );
  }
  
  /**
   * 
   * @return array
   */
  private function getOptions(){
    $options = get_option('woocommerce_' . $this->id . '_settings');
    $settings = [];
    if(isset($options['MERCHANT_ID'])){
      $settings['merchantId'] = $options['MERCHANT_ID'];
    }
    if(isset($options['SIGNATURE'])){
      $settings['signature'] = $options['SIGNATURE'];
    }
    if(isset($options['SIGNATURE_METHOD'])){
      $settings['signatureMethod'] = $options['SIGNATURE_METHOD'];
    }
    if(isset($options['CURRENCY_ID'])){
      $settings['currencyId'] = $options['CURRENCY_ID'];
    }
    if(isset($options['currency_default'])){
      $settings['currencyDefault'] = $options['currency_default'];
    }
    if(isset($options['order_status_sucess'])){
      $settings['orderStatusSuccess'] = $options['order_status_sucess'];
    }
    if(isset($options['order_status_waiting'])){
      $settings['orderStatusWaiting'] = $options['order_status_waiting'];
    }
    if(isset($options['tax_type'])) {
      $settings['tax_type'] = $options['tax_type'];
    }
    if(isset($options['CULTURE_ID'])){
      $settings['cultureId'] = $options['CULTURE_ID'];
    }
    if (!empty($options['PTENABLED'])) {
      if (strpos($options['PTENABLED'], ',')) {
        $settings['paymentSystemEnabled'] = explode(',', preg_replace('/\s+/', '', $options['PTENABLED']));
      }
      else {
        $settings['paymentSystemEnabled'][0] = preg_replace('/\s+/', '', $options['PTENABLED']);
      }
      sort($settings['paymentSystemEnabled']);
    }
    if (!empty($options['PTDISABLED'])) {
      if (strpos($options['PTDISABLED'], ',')) {
        $settings['paymentSystemDisabled'] = explode(',', preg_replace('/\s+/', '', $options['PTDISABLED']));
      }
      else {
        $settings['paymentSystemDisabled'][0] = preg_replace('/\s+/', '', $options['PTDISABLED']);
      }
      sort($settings['paymentSystemDisabled']);
    }
    
    return $settings;
  }

  /**
   * Admin Panel Options 
   * The output html form - settings to the admin panel
   *
   * @since 0.1
   * */
  public function admin_options() {
    if(!empty($this->client->errors) || !empty($this->client->messages)){
      echo $this->client->getMessage($this->client->errors, $this->client->messages, 'html');
      $this->client->errors = array();
      $this->client->messages = array();
    }?>
    <link rel="stylesheet" href="<?php echo str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__)) ?>/walletone/css/wordpress.css" type="text/css" media="all">
    <h3><?php echo w1Title?></h3>
    <table class="form-table">
    <?php
    //Generate the HTML For the settings form.
    $form_fields = $this->get_form_fields();

    foreach ($form_fields as $k => $v) {
      if (!isset($v['type']) || ( $v['type'] == '' )) {
        $v['type'] = 'text'; // Default to "text" field type.
      }
      if (method_exists($this, 'generate_' . $v['type'] . '_html')) {
        echo $this->{'generate_' . $v['type'] . '_html'}($k, $v);
      }
      else {
        if ($k == 'PTENABLED' || $k == 'PTDISABLED') {
          $val = esc_attr($this->get_option($k));
          $mas = explode(',', $val);
          echo '<tr valign="top">
                  <th scope="row" class="titledesc">
                    <label for="woocommerce_w1_enabled">' . $v['title'] . '</label>
                  </th>
                  <td class="forminp">';
          if($html = $this->client->getHtmlPayments($k, $mas, 'woocommerce_w1_')){
            echo $html;
          }
          else{
            echo $this->client->getMessage($this->client->errors, $this->client->messages, 'html');
            $this->client->errors = array();
            $this->client->messages = array();
          }
          echo '</td>
            </tr>';
        }
        else {
          echo $this->{'generate_text_html'}($k, $v);
        }
      }
    }
    ?>
    </table><!--/.form-table-->
    <?php
  }

  /**
   * The output html form for payment and redirecting to the site payment system
   * */
  function receipt_page($order_id) {
    echo '<p>' . $this->get_option('result_order_text') . '</p>';

    //get information of order
    $order = wc_get_order($order_id);
    //Validation settiongs of plugin
    $settings = $this->getOptions();
    $settings['orderId'] = $order->id;
    $settings['summ'] = number_format($order->order_total, 2, '.', '');
    $settings['orderId'] = $order->id;
    $settings['order_currency'] = $order->order_currency;
	$settings['shipping_total'] = $order->shipping_total;
    $settings['currencyId'] = $this->get_option('CURRENCY_ID');
    $settings['successUrl'] = $this->get_return_url($order);
    $settings['failUrl'] = $this->get_return_url($order);
    $settings['siteName'] = get_option('blogname');
    $settings['nameCms'] = '_wordpress';
    
    global $wpdb;
    $orders_fields = $wpdb->get_results("SELECT * FROM {$wpdb->postmeta} WHERE post_id = " . $order_id . " ;");
    foreach ($orders_fields as $value) {
      if ($value->meta_key != '_billing_first_name' && $value->meta_key != '_billing_last_name' && $value->meta_key != '_billing_email'  && $value->meta_key != '_billing_phone'){
        continue;
      }
      if ($value->meta_key == '_billing_first_name') {
        $settings['firstNameBuyer'] = $value->meta_value;
      }
      if ($value->meta_key == '_billing_last_name') {
        $settings['lastNameBuyer'] = $value->meta_value;
      }
      if ($value->meta_key == '_billing_email') {
        $settings['emailBuyer'] = $value->meta_value;
      }
	  if ($value->meta_key == '_billing_phone') {
        $settings['phoneBuyer'] = $value->meta_value;
      }
    }

    $settings['order_items'] = array();
    
    $taxes = [
      'tax_ru_1' => 'round(%.2f * 0 / 100,2)',
      'tax_ru_2' => 'round(%.2f * 0 / 100,2)',
      'tax_ru_3' => 'round(%.2f * 10 / 100,2)',
      'tax_ru_4' => 'round(%.2f * 18 / 100,2)',
      'tax_ru_5' => 'round(%.2f * 10 / 110,2)',
      'tax_ru_6' => 'round(%.2f * 18 / 118,2)',
    ];
    
    $tax_formula = isset($taxes[$settings['tax_type']]) ? $taxes[$settings['tax_type']] : '0';
	if(is_null($settings['tax_type'])){
		$settings['tax_type'] = "tax_ru_1";
	} 
	
    foreach ($order->get_items() as $item_id => $item_data) {
      $settings['orderItems'][] = array(
        'Title'     => $item_data['name'],
        'Quantity'  => $quantity = $order->get_item_meta($item_id, '_qty', true),
        'SubTotal'  => round($total = $order->get_item_meta($item_id, '_line_total', true), 2),
        'UnitPrice' => round($total / $quantity, 2),
        'TaxType'   => $settings['tax_type'],
        'Tax'       => eval('return '. sprintf($tax_formula, $total) .';'),
      );
    }

	if($settings["shipping_total"] > 0){
      $settings['orderItems'][] = array(
          'Title'     => w1Delivery,
          'Quantity'  => "1",
          'SubTotal'  => round($settings["shipping_total"], 2),
          'UnitPrice' => round($settings["shipping_total"], 2),
          'TaxType'   => "tax_ru_1",
          'Tax'       => "0",
      );
    }
	
    if ($this->client->validateParams($settings) !== true) {
      echo $this->client->getMessage($this->client->errors, $this->client->messages, 'html');
      die();
    }

    if(!$fields = $this->client->createFieldsForForm()){
      $this->client->getErrors($this->client->getPayments());
      echo $this->client->getMessage($this->client->errors, $this->client->messages, 'html');
      die();
    }
    
    $redirect = false;
    if($this->get_option('redirect') == 'yes'){
      $redirect = true;
    }
    echo $this->client->createHtmlForm($fields, $redirect);
    
    $text = sprintf(w1OrderResultCreated, $order->id, $settings['orderStatusWaiting']);
    $order->add_order_note($text);
    $status = str_replace('wc-', '', $settings['orderStatusWaiting']);
    //change status order
    $order->update_status($status, $text);
    // Remove cart
    WC()->cart->empty_cart();
  }

  /**
   * Process the payment and return the result
   * */
  function process_payment($order_id) {
    $order = wc_get_order($order_id);
    
    return array(
      'result' => 'success',
      'redirect' => add_query_arg('order-pay', $order->id, add_query_arg('key', $order->order_key, get_permalink(woocommerce_get_page_id('pay'))))
    );
  }

  /**
   * Return handler for Hosted Payments
   *
   * @return bool
   */
  public function return_handler() {
    $_POST = stripslashes_deep($_POST);
    
    $settings = $this->getOptions();
    $settings['orderPaymentId'] = $_POST['WMI_ORDER_ID'];
    $settings['orderState'] = mb_strtolower($_POST['WMI_ORDER_STATE']);
	$paymentNo = explode("_",$_POST['WMI_PAYMENT_NO']);
	$settings['orderId'] = $paymentNo[0];
    $settings['paymentType'] = $_POST['WMI_PAYMENT_TYPE'];
    $settings['summ'] = $_POST['WMI_PAYMENT_AMOUNT'];
    
    if($this->client->resultValidation($settings, $_POST)){
      $result = $this->client->getResult();
      //get a order of data
      $order = new \WC_Order($result->orderId);
      if (empty($order)) {
        $error = sprintf(w1ErrorResultOrder, $result->orderId, $result->orderState, $result->orderPaymentId);
        $this->logger->warn($error);
        ob_start();
        echo 'WMI_RESULT=RETRY&WMI_DESCRIPTION=' . $error;
        die();
      }
      //get the order amount
      global $wpdb;
      $orders_fields = $wpdb->get_results("SELECT * FROM {$wpdb->postmeta} WHERE post_id = " . $order->id . " ;");
      foreach ($orders_fields as $value) {
        if ($value->meta_key != '_order_total') {
          continue;
        }
        $order_total = $value->meta_value;
      }
      //checking on the order amount
      if (number_format($order_total, 2, '.', '') != $result->summ &&
          (empty($order->post_status) || $order->post_status != 'wc-failed')) {
        $error = sprintf(w1ErrorResultOrderSumm, $result->orderId, $result->orderState, $result->orderPaymentId);
        $this->logger->warn($error);
        ob_start();
        echo 'WMI_RESULT=RETRY&WMI_DESCRIPTION=' . $error;
        die();
      }
      if ($result->orderState == 'accepted' && empty($order->post_status) || $order->post_status != $settings->orderStatusSuccess) {
        $text = sprintf(w1OrderResultSuccess, $result->orderId, $result->orderState, $result->orderPaymentId);
        $order->add_order_note($text);
        $this->logger->info($text);
        $this->payment_complete($order);
        // Remove cart
        WC()->cart->empty_cart();
        ob_start();
        echo 'WMI_RESULT=OK';
        die();
      }
    }
    else{
      if(!empty($this->client->errors)){
        ob_start();
        echo 'WMI_RESULT=RETRY&WMI_DESCRIPTION='.implode(' ', $this->client->errors);
        die();
      }
    }
    ob_start();
    echo 'WMI_RESULT=RETRY&WMI_DESCRIPTION=ERROR';
    $this->logger->warn('Other error');
    die();
  }

  /**
	 * When a payment is complete this function is called.
	 *
	 * Most of the time this should mark an order as 'processing' so that admin can process/post the items.
	 * If the cart contains only downloadable items then the order is 'completed' since the admin needs to take no action.
	 * Stock levels are reduced at this point.
	 * Sales are also recorded for products.
	 * Finally, record the date of payment.
	 *
	 * @param string $transaction_id Optional transaction id to store in post meta.
	 */
	public function payment_complete($order) {
		do_action('woocommerce_pre_payment_complete', $order->id);

    if (null !== WC()->session) {
      WC()->session->set('order_awaiting_payment', false);
    }

    if ($order->id) {
      $order_needs_processing = false;

      if (sizeof($order->get_items()) > 0) {
        foreach ($order->get_items() as $item) {
          if ($_product = $order->get_product_from_item($item)) {
            $virtual_downloadable_item = $_product->is_downloadable() && $_product->is_virtual();

            if (apply_filters('woocommerce_order_item_needs_processing', !$virtual_downloadable_item, $_product, $order->id)) {
              $order_needs_processing = true;
              break;
            }
          }
          else {
            $order_needs_processing = true;
            break;
          }
        }
      }
      $order->update_status(apply_filters('woocommerce_payment_complete_order_status', str_replace('wc-', '', $this->client->getSettings()->orderStatusSuccess), $order->id));

      add_post_meta($order->id, '_paid_date', current_time('mysql'), true);

      // Payment is complete so reduce stock levels
      if (apply_filters('woocommerce_payment_complete_reduce_order_stock', !get_post_meta($order->id, '_order_stock_reduced', true), $order->id)) {
        $order->reduce_order_stock();
      }
      do_action('woocommerce_payment_complete', $order->id);
    }
    else {
      do_action('woocommerce_payment_complete_order_status_' . $order->get_status(), $order->id);
    }
  }
  
}
