<?php

namespace WalletOne\Api;
/**
 * Abstract class for items of settings of module.
 * 
 */
abstract class W1SettingsAbstract implements \WalletOne\Api\W1Interface {
  
  /**
   * Id merchant in payment system Wallet One.
   * 
   * @var string 
   */
  public $merchantId;
  
  /**
   * A secret code generated selected methods in a private office Wallet One.
   * 
   * @var string
   */
  public $signature;
  
  /**
   * The chosen method of generating secret code (MD5/SHA1).
   * 
   * @var string
   */
  public $signatureMethod;
  
  /**
   * Array of methods signature.
   * 
   * @var array
   */
  public $signatureMethodArray;
  
  /**
   * Default currency.
   * 
   * @var int
   */
  public $currencyId;
  
  /**
   * Currency code list.
   * 
   * @var array
   */
  public $currencyCode;
  
  /**
   * Currency name list.
   * 
   * @var array
   */
  public $currencyName;


  /**
   * A option the selected of default currency.
   * 
   * @var string
   */
  public $currencyDefault;
  
  /**
   * The order status after successful payment.
   * 
   * @var string
   */
  public $orderStatusSuccess;
  
  /**
   * The order status waiting payment.
   * 
   * @var string
   */
  public $orderStatusWaiting;
  
  /**
   * A array of permitted payment systems.
   * 
   * @var string
   */
  public $paymentSystemEnabled;
  
  /**
   * A array of forbidden payment systems.
   * 
   * @var string
   */
  public $paymentSystemDisabled;
  
  /**
   * list of interfaces languages on the W1 
   * 
   * @var string
   */
  public $cultureArray;
  
  /**
   * interface language on the W1 
   * 
   * @var string
   */
  public $cultureId;


  /**
   * The set of required fields.
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
   * Array of names fields.
   * 
   * @var array
   */
  public $fieldsName;
  
  /**
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

  /**
   * The array with items and taxes
   * 
   * @var array
   */
  public $orderItems;
  
  /**
   *
   * @var Logger 
   */
  protected $logger;
  
  function __construct($config) {
    $this->signatureMethod = $config['signatureMethodDefault'];
    $this->signatureMethodArray = $config['signatureMethod'];
    $this->fieldsPreg = $config['settings']['fieldsPreg'];
    $this->requiredFields = $config['settings']['requiredFields'];
    $this->currencyDefault = 0;
    $this->currencyCode = $config['currencyCode'];
    $this->currencyName = $config['currencyName'];
    $this->fieldsName = $config['settings']['fieldsName'];
    $this->cultureArray = $config['cultureArray'];
    $this->cultureId = $config['cultureDefault'];
    
    $this->logger = \Logger::getLogger(__CLASS__);

    $this->errors = array();
    $this->messages = array();
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
  public function required() {
    $this->errors = array();
    $this->messages = array();
    if (!empty($this->requiredFields)) {
      foreach ($this->requiredFields as $value) {
        if (property_exists($this, $value)) {
          $field = $this->getValue($value);
          if(empty($field) && $field !== 0){
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
        $this->messages[] = w1ErrorActive;
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
          if(!empty($val)){
            if(is_array($val)){
              foreach ($val as $v) {
                if(preg_match($value, $v) == 0){
                  $this->errors[] = sprintf(w1ErrorPreg, $this->fieldsName[$key]).' '.$v;
                  $this->logger->error(sprintf(w1ErrorPreg, $this->fieldsName[$value]).' '.$v);
                }
              }
            }
            elseif(preg_match($value, $val) == 0){
              $this->errors[] = sprintf(w1ErrorPreg, $this->fieldsName[$key]);
              $this->logger->error(sprintf(w1ErrorPreg, $this->fieldsName[$key]));
            }
          }
        }
      }
      if (!empty($this->errors)) {
        return false;
      }
    }
    return true;
  }
}
