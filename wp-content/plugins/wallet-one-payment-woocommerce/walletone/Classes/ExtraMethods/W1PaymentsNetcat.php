<?php
namespace WalletOne\Classes\ExtraMethods;

class W1PaymentsNetcat extends \WalletOne\Classes\StandardsMethods\W1Payments  {
  public $module = '';
  
  function __construct($config, $params = array(), $nameCms = '') {
    parent:: __construct($config, $params, $nameCms);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
  
  /**
   * Creating an array with the data for payment.
   * 
   * @param array $settings
   *  Settings from module.
   * @param array $invoce
   *  Order data.
   * @return array
   */
  public function createFormArray($settings, $invoce){
    $fields = array();
    $fields['CMS'] = $this->numCms;
    $fields['WMI_CURRENCY_ID'] = $invoce->currencyId;
    if(!empty($this->siteName) && strlen($this->siteName) > 240){
      $this->siteName = $_SERVER['HTTP_HOST'];
    }
    $fields['WMI_DESCRIPTION'] = "BASE64:" . base64_encode(sprintf(w1OrderDescr, $invoce->orderId, $this->siteName));
    if(strlen($fields['WMI_DESCRIPTION']) > 255){
      $this->errors[] = w1ErrorResultOrderDescription;
      $this->logger->warn(w1ErrorResultOrderDescription);
      return false;
    }
    $fields['WMI_EXPIRED_DATE'] = date('Y-m-d\TH:i:s', time() + 10000000);
    $fields['WMI_SUCCESS_URL'] = $this->successUrl;
    $fields['WMI_FAIL_URL'] = $this->failUrl;
    $fields['WMI_MERCHANT_ID'] = $settings->merchantId;
    $fields['WMI_PAYMENT_AMOUNT'] = number_format($invoce->summ, 2, '.', '');
    $orderId = $invoce->orderId . (preg_match('/.cms$/ui', $_SERVER['HTTP_HOST']) !== false 
          || preg_match('/.walletone.com$/ui', $_SERVER['HTTP_HOST']) !== false ? '_'.$_SERVER['HTTP_HOST'] : '');
    $fields['WMI_PAYMENT_NO'] = $orderId;
    $fields['WMI_CULTURE_ID'] = $settings->cultureId;
    
    if(!empty($invoce->firstNameBuyer)){
      $fields['WMI_CUSTOMER_FIRSTNAME'] = $invoce->firstNameBuyer;
    }
    if(!empty($invoce->lastNameBuyer)){
      $fields['WMI_CUSTOMER_LASTNAME'] = $invoce->lastNameBuyer;
    }
    if(!empty($invoce->emailBuyer)){
      $fields['WMI_CUSTOMER_EMAIL'] = $invoce->emailBuyer;
      $fields['WMI_RECIPIENT_LOGIN'] = $invoce->emailBuyer;
    }
    if(!empty($settings->paymentSystemEnabled)){
      $fields['WMI_PTENABLED'] = $settings->paymentSystemEnabled;
    }
    if(!empty($settings->paymentSystemDisabled)){
      $fields['WMI_PTDISABLED'] = $settings->paymentSystemDisabled;
    }
    $fields['module'] = $this->module;
    
    //The sorting fields
    foreach ($fields as $name => $val) {
      if (is_array($val)) {
        usort($val, "strcasecmp");
        $fields[$name] = $val;
      }
    }
    uksort($fields, "strcasecmp");
    
    $fields["WMI_SIGNATURE"] = $this->createSignature($fields, $settings->signature, $settings->signatureMethod);
    return $fields;
  }
}
