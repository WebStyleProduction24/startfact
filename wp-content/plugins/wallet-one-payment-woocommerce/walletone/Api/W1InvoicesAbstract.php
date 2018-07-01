<?php

namespace WalletOne\Api;
/**
 * Abstract class for order data.
 * 
 */
abstract class W1InvoicesAbstract implements \WalletOne\Api\W1Interface {
  
  /**
   * Id order in Cms.
   * 
   * @var string 
   */
  public $orderId;
  
  /**
   * Summ of order.
   * 
   * @var string
   */
  public $summ;
  
  /**
   * Default currency.
   * 
   * @var int
   */
  public $currencyId;
  
  /**
   * The buyer first name.
   * 
   * @var string
   */
  public $firstNameBuyer;
  
  /**
   * The buyer last name.
   * 
   * @var string
   */
  public $lastNameBuyer;
  
  /**
   * Email buyer.
   * 
   * @var string
   */
  public $emailBuyer;
  
  /**
   * Phone buyer.
   *
   * @var string
  */
  public $phoneBuyer;
  
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
    
    $this->requiredFields = $config['invoce']['requiredFields'];
    $this->fieldsName = $config['invoce']['fieldsName'];
    $this->fieldsPreg = $config['invoce']['fieldsPreg'];
    $this->currencyId = 643;
    
    $currencyDefault = $config['currencyDefault'];
    if(!empty($params['currencyDefault'])) {
      $currencyDefault = $params['currencyDefault'];
    }
    if ($currencyDefault == 'yes' || $currencyDefault == 1) {
      if(!empty($params['currencyId'])){
        $this->currencyId = $params['currencyId'];
      }
    }
    else{
      if (!empty($params['order_currency'])) {
        if ($params['order_currency'] == 'RUR') {
          $params['order_currency'] = 'RUB';
        }
        $currency_iso = array_search($params['order_currency'], $config['currencyCode']);
        if ($currency_iso) {
          if ($currencyDefault == 'no' || $currencyDefault == 0) {
            $this->currencyId = $currency_iso;
          }
        }
      }
    }
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
            $this->logger->error(sprintf(w1ErrorPreg, $this->fieldsName[$key]));
          }
        }
      }
      if(!empty($this->errors)){
        return false;
      }
    }
    return true;
  }
  
}
