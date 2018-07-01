<?php

namespace WalletOne\Api;

/**
 * Abstract class for data of payment.
 * 
 */
abstract class W1PaymentsAbstract implements \WalletOne\Api\W1Interface {

  /**
   * Link to go to the payment system.
   * 
   * @var string
   */
  public $paymentUrl;

  /**
   * The number of CMS in the list.
   * 
   * @var int 
   */
  public $numCms;

  /**
   * Name of site.
   * 
   * @var string
   */
  public $siteName;

  /**
   * Link in the case of successful payment.
   * 
   * @var string
   */
  public $successUrl;

  /**
   * Link in the case does not of successful payment.
   * 
   * @var string
   */
  public $failUrl;

  /**
   * The set of required invoce fields.
   * 
   * @var array
   */
  public $requiredFields;

  /**
   * The array for check to the regular expressions.
   * 
   * @var array
   */
  public $fieldsPreg;

  /**
   * Text of name payments 
   * 
   * @var string
   */
  public $orderDesc;

  /**
   * Array a names of fields
   * 
   * @var array
   */
  public $fieldsName;

  /**
   *
   * @var Logger 
   */
  protected $logger;

  /**
   * The array with all errors;
   * 
   * @var array 
   */
  public $errors;

  /**
   * The array with all message;
   * 
   * @var array 
   */
  public $messages;

  function __construct($config, $params = array(), $nameCms = '') {
    $this->logger = \Logger::getLogger(__CLASS__);

    $this->paymentUrl = $config['paymentUrl'];
    $this->requiredFields = $config['payment']['requiredFields'];
    $this->fieldsName = $config['payment']['fieldsName'];
    $this->fieldsPreg = $config['payment']['fieldsPreg'];
    $this->numCms = $config['payment']['cms' . $nameCms];
  }

  /**
   * Get value of field.
   * 
   * @param string $name
   * @return string
   */
  public function getValue($name) {
    $reflect = new \ReflectionClass(get_class($this));
    $property = $reflect->getProperty($name);
    return $property->getValue($this);
  }
  
  /**
   * Set value of feild.
   * 
   * @param string $name
   * @param string $value
   */
  public function setValue($name, $value){
    $reflect = new \ReflectionClass(get_class($this));
    if($reflect->hasProperty($name)){
      $property = $reflect->getProperty($name);
      $property->setValue($this, $value);
    }
  }

  /**
   * To check the required fields.
   * 
   * @param array $fields
   * @return boolean
   */
  public function required() {
    $this->errors = array();
    $this->messages = array();
    if (!empty($this->requiredFields)) {
      foreach ($this->requiredFields as $value) {
        if (property_exists($this, $value)) {
          $field = $this->getValue($value);
          if (empty($field)) {
            $this->errors[] = sprintf(w1ErrorRequired, $this->fieldsName[$value]);
            $this->logger->error(sprintf(w1ErrorRequired, $this->fieldsName[$value]));
          }
        }
        else {
          $this->errors[] = sprintf(w1ErrorRequiredEmpty, $this->fieldsName[$value]);
          $this->logger->error(sprintf(w1ErrorRequiredEmpty, $this->fieldsName[$value]));
        }
      }
      if (!empty($this->errors)) {
        $this->messages[] = w1ErrorEmptyFields;
        return false;
      }
    }
    return true;
  }

  /**
   * Validation fields.
   * 
   * @return boolean
   */
  public function validation() {
    $this->errors = array();
    $this->messages = array();
    if (!empty($this->fieldsPreg)) {
      foreach ($this->fieldsPreg as $key => $value) {
        if (property_exists($this, $key)) {
          $val = $this->getValue($key);
          if (!empty($val) && preg_match($value, $val) == 0) {
            $this->errors[] = sprintf(w1ErrorPreg, $this->fieldsName[$key]);
            $this->logger->error(sprintf(w1ErrorPreg, $this->fieldsName[$key]));
          }
        }
      }
      if (!empty($this->errors)) {
        return false;
      }
    }
    return true;
  }
  
  /**
   * Create signature.
   * 
   * @param array $fields
   * @param string $sig
   * @return string
   */
    public function createSignature($fields, $sig, $method){
    $fieldValues = "";
    foreach ($fields as $value) {
      if (is_array($value)) {
        foreach ($value as $v) {
          $v = iconv("utf-8", "windows-1251", $v);
          $fieldValues .= $v;
        }
      }
      else {
        $value = iconv("utf-8", "windows-1251", $value);
        $fieldValues .= $value;
      }
    }
    
    $signature = base64_encode(pack("H*", call_user_func_array($method, [$fieldValues . $sig])));
    return $signature;
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
  abstract public function createFormArray($settings, $invoce);
}
