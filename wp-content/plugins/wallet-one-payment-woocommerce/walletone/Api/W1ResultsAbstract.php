<?php

namespace WalletOne\Api;

/**
 * Abstract class for payment processing result.
 * 
 */
abstract class W1ResultsAbstract {

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
   * Id order in payment system.
   * 
   * @var int
   */
  public $orderPaymentId;
  
  /**
   * Status payment order. 
   * 
   * @var string
   */
  public $orderState;
  
  /**
   * Order number in CMS when returning.
   * 
   * @var string
   */
  public $orderId;
  
  /**
   * Type payment in payment system.
   * 
   * @var string
   */
  public $paymentType;
  
  /**
   * Summ of order.
   * 
   * @var string
   */
  public $summ;
  
  /**
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
  
  function __construct($config, $params = array()) {
    $this->logger = \Logger::getLogger(__CLASS__);

    $this->requiredFields = $config['result']['requiredFields'];
    $this->fieldsName = $config['result']['fieldsName'];
    $this->fieldsPreg = $config['result']['fieldsPreg'];
  }

  /**
   * Get value of field.
   * 
   * @param string $name
   * @return string
   */
  public function getValue($name){
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
  public function required(){
    $this->errors = array();
    $this->messages = array();
    if(!empty($this->requiredFields)){
      foreach ($this->requiredFields as $value) {
        if(property_exists($this, $value)) {
          $field = $this->getValue($value);
          if(empty($field)){
            $this->errors[] = sprintf(w1ErrorRequired, $this->fieldsName[$value]);
            $this->logger->error(sprintf(w1ErrorRequired, $this->fieldsName[$value]));
          }
        }
        else{
          $this->errors[] = sprintf(w1ErrorRequiredEmpty, $this->fieldsName[$value]);
          $this->logger->error(sprintf(w1ErrorRequiredEmpty, $this->fieldsName[$value]));
        }
      }
      if(!empty($this->errors)){
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
    if(!empty($this->fieldsPreg)){
      foreach ($this->fieldsPreg as $key => $value) {
        if(property_exists($this, $key)) {
          $val = $this->getValue($key);
          if (!empty($val) && preg_match($value, $val) == 0) {
            $this->errors[] = sprintf(w1ErrorPreg, $this->fieldsName[$key]);
            $this->logger->error(sprintf(w1ErrorPreg, $this->fieldsName[$key]).' '.$val);
          }
        }
      }
      if(!empty($this->errors)){
        return false;
      }
    }
    return true;
  }
  
  /**
   * Checking signature.
   * 
   * @param array $post
   * @param string $sign
   * @param string $method
   * @return boolean
   */
  public function checkSignature($post, $sign, $method){
    $this->errors = array();
    foreach ($post as $key => $value) {
      if ($key !== "WMI_SIGNATURE") {
        $params[$key] = $value;
      }
    }
    uksort($params, "strcasecmp");
    $values = implode('', $params);
    $signature = base64_encode(pack("H*", call_user_func($method, $values . $sign)));
    if ($signature != $post['WMI_SIGNATURE']) {
      $this->logger->warn(sprintf(w1ErrorResultSignature, $post['WMI_PAYMENT_NO']));
      return false;
    }
    return true;
  }
  
}
