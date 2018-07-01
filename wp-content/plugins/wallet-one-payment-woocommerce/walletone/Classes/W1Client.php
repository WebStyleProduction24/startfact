<?php

namespace WalletOne\Classes;

use WalletOne\Classes\W1Factory;

use WalletOne\Classes\StandardsMethods\W1Invoices;
use WalletOne\Classes\StandardsMethods\W1Payments;
use WalletOne\Classes\StandardsMethods\W1Results;
use WalletOne\Classes\StandardsMethods\W1Settings;

use WalletOne\Helpers\W1Messages;
use Logger;

/**
 * Singleton class for working whis api Wallet One
 */
class W1Client {
  /**
   *
   * @var string
   */
  protected $lang;
  
  /**
   * Configuration module 
   * 
   * @var array 
   */
  protected $config;
  
  protected static $_instance;
  
  /**
   *
   * @var \WalletOne\W1Settings
   */
  protected $settings;
  
  /**
   *
   * @var \WalletOne\W1Html
   */
  protected $html;
  
  /**
   *
   * @var \WalletOne\W1Invoice
   */
  protected $invoice;
  
  /**
   *
   * @var \WalletOne\W1Payment
   */
  protected $payment;

  /**
   *
   * @var \WalletOne\W1Result
   */
  protected $result;
  
  /**
   *
   * @var array
   */
  public $errors;
  
  /**
   * Array of messages. 
   * 
   * @var array
   */
  public $messages;
  
  /**
   *
   * @var \WalletOne\Helpers\W1Messages
   */
  public $messageShow;
  
  /**
   *
   * @var Logger 
   */
  protected $logger;

  protected function __construct() {
    if (!defined('w1PathImg')) {
      define('w1PathImg', '');
    }
    
    //auto loading classes
    spl_autoload_extensions('.php');
    spl_autoload_register(function($name) {
      $homeDir = dirname(str_replace('\\', '/', __DIR__));
      $str = explode('\\', $name);
      $className = $str[count($str)-1];
      if(strpos($name, 'W1') !== false && (strpos($name, 'Abstract') !== false
          || strpos($name, 'Interface') !== false)){
        $path = $homeDir.'/Api/'.$className.'.php';
        include_once $path;
      }
      elseif(strpos($name, 'W1') !== false && strpos($name, 'Helpers') !== false){
        $path = $homeDir.'/Helpers/'.$className.'.php';
        include_once $path;
      }
      elseif(strpos($name, 'W1') !== false && strpos($name, 'StandardsMethods') !== false){
        $path = $homeDir.'/Classes/StandardsMethods/'.$className.'.php';
        include_once $path;
      }
      elseif(strpos($name, 'W1') !== false && strpos($name, 'ExtraMethods') !== false){
        $path = $homeDir.'/Classes/ExtraMethods/'.$className.'.php';
        include_once $path;
      }
      elseif(strpos($name, 'W1') !== false && strpos($name, 'ExtraMethods') == false
          && strpos($name, 'StandardsMethods') == false){
        $path = $homeDir.'/Classes/'.$className.'.php';
        include_once $path;
      }
    });
    
    $path = dirname(str_replace('\\', '/', __DIR__));
    include_once $path . '/php/Logger.php';
    \Logger::configure($path . '/configLogger.php');
    $this->logger = \Logger::getLogger(__CLASS__);
  }

  /**
   * Get or create singleton instance
   *
   * @param string $lang
   * @return \WalletOne\W1Client
   */
  public static function init() {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
   * Create singleton instance.
   *
   * @param string $lang 
   * @return WalletOne\Classes\W1Client
   */
  public function run($lang = 'ru', $extra = '') {
    $this->lang = 'ru';
    if($this->lang != 'ru' && mb_strtolower($this->lang) != 'ru-ru'){
      $this->lang = 'en';
    }
    include_once str_replace('\\', '/', __DIR__) . '/../lang/settings.'.$this->lang.'.php';
    
    $this->config = require str_replace('\\', '/', __DIR__) . '/../config.php';
    $this->settings = \WalletOne\Classes\W1Factory::createSettingsClass($this->config, $extra);
    $this->html = \WalletOne\Classes\W1Factory::createHtmlClass($this->config, $extra);
    $this->invoice = new W1Invoices($this->config);
    $this->payment = \WalletOne\Classes\W1Factory::createPaymentsClass($this->config, $extra);
    $this->result = new W1Results($this->config);
    
    $this->messageShow = new W1Messages();
    
    $this->errors = [];
    $this->messages = [];
    
    if (PHP_VERSION_ID < 50400) {
      $this->errors[] = w1ErrorPhpVersion;
      $this->logger->warn(w1ErrorPhpVersion);
    }
    
    self::$_instance = $this;
    
    return self::$_instance;
  }
  
  /**
   * Private clone method to prevent cloning of the instance of the
   * *Singleton* instance.
   *
   * @return void
   */
  private function __clone() {}

  /**
   * Private unserialize method to prevent unserializing of the *Singleton*
   * instance.
   *
   * @return void
   */
  private function __wakeup() {}

  /**
   * Get default settings from configure file.
   * 
   * @return \WalletOne\Classes\StandartMethods\W1Settings
   */
  public function getSettings() {
    return $this->settings;
  }
  
  /**
   * Get fields from request.
   * 
   * @return \WalletOne\Classes\StandartMethods\W1Results
   */
  public function getPayments() {
    return $this->payment;
  }
  
  /**
   * Get fields from request.
   * 
   * @return \WalletOne\Classes\StandartMethods\W1Results
   */
  public function getResult() {
    return $this->result;
  }
  
  /**
   * Get fields from request.
   * 
   * @return \WalletOne\Classes\***Methods\W1Html***
   */
  public function getHtml() {
    return $this->html;
  }
  
  /**
   * Get default settings from configure file.
   * 
   * @return \WalletOne\Classes\StandartMethods\W1Settings
   */
  public function setSettings($params = []) {
    if(!empty($params)){
      foreach ($params as $key => $value) {
        $this->settings->setValue($key, $value);
      }
    }
    return $this->settings;
  }
  
  /**
   * Get default settings from configure file.
   * 
   * @return \WalletOne\W1Settings
   */
  public function setNewParametrs($obj, $params = []) {
    if(!empty($params)){
      foreach ($params as $key => $value) {
        if(strpos(get_class($obj), 'W1Payments') !== false && $key == 'nameCms'){
          $v = $this->config['payment']['cms' . $value];
          $obj->setValue('numCms', $v);
        }
        else {
          $obj->setValue($key, $value);
        }
      }
    }
    return $obj;
  }
  
  /**
   * Get all messages of errors and messages.
   * 
   * @param array $errors
   * @param array $messages
   * @param string $type
   * @return string
   */
  public function getMessage($errors = [], $messages = [], $type = 'text'){
    if($type = 'html'){
      return $this->messageShow->MessageHtml($errors, $messages);
    }
    return $this->messageShow->MessageText($errors, $messages);
  }
  
  /**
   * 
   * 
   * @return array
   */
  public function getHtmlErrors() {
    if(!empty($this->html->errors)){
      $this->errors = array_merge($this->errors, $this->html->errors);
      $this->html->errors = [];
    }
  }
  
  /**
   * 
   * 
   * @return array
   */
  public function getErrors($obj) {
    if(!empty($obj->errors)){
      $this->errors = array_merge($this->errors, $obj->errors);
      $obj->errors = [];
    }
    if(!empty($obj->messages)){
      $this->messages = array_merge($this->messages, $obj->messages);
      $obj->messages = [];
    }
  }
  
  /**
   * Creating icon.
   * 
   * @param array $ptenabled
   * @return string
   */
  public function createNewIcon($ptenabled, $ptdisabled = []){
    if(!empty($this->html->filename)){
      if($pic = $this->html->createIcon($ptenabled, $ptdisabled, $this->html->filename)){
        return $pic;
      }
      $this->getHtmlErrors();
    }
    return false;
  }

  /**
   * Getting html code with list payments with icons
   * 
   * @param string $name
   * @param array $paymentsList
   * @return string
   */
  public function getHtmlPayments($name, $paymentsList = [], $nameInput = 'w1_') {
    if(!empty($this->html->filename)){
      $html = $this->html->getHtmlPayments($name, $paymentsList, $this->html->filename, $nameInput);
      if(empty($this->html->errors)){
        return $html;
      }
    }
    $this->getHtmlErrors();
    
    return '';
  }
  
  /**
   * Get numder of CMS.
   * 
   * @return \WalletOne\W1SettingsCms
   */
  public function getNumCms($nameCms){
    $this->payment = new W1Payments($this->config, $this->lang, $nameCms);
    return $this->payment->numCms;
  }
  
  /**
   * Validate fields form.
   * 
   * @param array $params
   * @return array|boolean
   */
  public function validateParams($params) {
    $this->setSettings($params);
    if (!$this->settings->required() || !$this->settings->validation()) {
      $this->getErrors($this->settings);
      return false;
    }
    $this->invoice = new W1Invoices($this->config, $params);
    unset($params['currencyId']);
    $this->setNewParametrs($this->invoice, $params);
    if (!$this->invoice->required() || !$this->invoice->validation()) {
      $this->getErrors($this->invoice);
      return false;
    }
    $this->setNewParametrs($this->payment, $params);
    if (!$this->payment->required() || !$this->payment->validation()) {
      $this->getErrors($this->payment);
      return false;
    }
    return true;
  }
  
  /**
   * Creating fields for form.
   * 
   * @param array $params
   * @return array
   */
  public function createFieldsForForm() {
    return $this->payment->createFormArray($this->settings, $this->invoice);
  }
  
  /**
   * Creating html form.
   * 
   * @param array $params
   * @param array $fields
   * @return string
   */
  public function createHtmlForm($fields, $redirect = false) {
    return $this->html->createForm($fields, $this->payment->paymentUrl, $redirect);
  }
  
  /**
   * The validation of ansew from payment system with partition of type user (bot/browser).
   * 
   * @param type $params
   * @param type $request
   * @return boolean
   */
  public function resultValidation($params, $request) {
    $this->setSettings($params);
    $this->setNewParametrs($this->result, $params);
    if (!$this->result->required()) {
      $this->logger->warn(w1ErrorRequired);
      $this->errors[] = 'WMI_RESULT=RETRY&WMI_DESCRIPTION=' . w1ErrorRequired;
      return false;
    }
    if (!$this->result->validation()) {
      $this->logger->warn(w1ErrorPreg);
      $this->errors[] = 'WMI_RESULT=RETRY&WMI_DESCRIPTION=' . w1ErrorPreg;
      return false;
    }
    //check signature
    if (!$this->result->checkSignature($request, $this->settings->signature, $this->settings->signatureMethod)) {
      $this->errors[] = 'WMI_RESULT=RETRY&WMI_DESCRIPTION=' . sprintf(w1ErrorResultSignature, $this->result->orderId);
      return false;
    }
    return true;
  }
  
}
