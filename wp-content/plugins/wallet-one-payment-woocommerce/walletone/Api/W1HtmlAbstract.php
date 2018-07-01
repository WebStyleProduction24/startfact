<?php

namespace WalletOne\Api;

/**
 * Abstract class for building of html.
 * 
 */
abstract class W1HtmlAbstract {
  /**
   * Url to pic. 
   * 
   * @var string 
   */
  public $logoUrl;
  
  /**
   *
   * @var Logger 
   */
  protected $logger;
  
  /**
   * Path from the root folder to the main folder plugin.
   * 
   * @var string
   */
  protected $homeDir;
  /**
   * The array with all errors;
   * 
   * @var array 
   */
  public $errors;
  
  /**
   * A path to the file with payment systems. 
   * 
   * @var string
   */
  public $filename;
  
  public function __construct($config, $lang = 'ru') {
    $this->logoUrl = $config['logoUrl'];
    
    $this->logger = \Logger::getLogger(__CLASS__);
    
    $this->homeDir = dirname(str_replace('\\', '/', __DIR__));
    
    if(file_exists($this->homeDir . '/files/payments_out.php')){
      $this->filename = $this->homeDir . '/files/payments_out.php';
    }
    if ($lang != 'ru') {
      if(file_exists($this->homeDir . '/files/payments_en_out.php')){
        $this->filename = $this->homeDir . '/files/payments_en_out.php';
      }
    }
    if(empty($this->filename)){
      $this->logger->error(sprintf(w1ErrorFileExist, $this->filename));
      $this->errors[] = sprintf(w1ErrorFileExist, $this->filename);
    }
  }
  
  /**
   * The getting the html code of payments system.
   * 
   * @param string $paymentName
   *  Name of type payment system
   * @param array $paymentActive
   *  Array of selected options.
   * @param string $filename
   *  Path to the file with payment systems.
   * @param string $inputName
   *  Name for begin name of input. 
   * 
   * @return string
   *  Return html code with checkboxes and labels.
   */
  abstract public function getHtmlPayments($paymentName, $paymentActive, $filename, $inputName);
  
  /**
   * Create forn for payment system.
   * 
   * @param array $fields
   * @param string $paymentUrl
   * @param string $canelUrl
   * 
   * @return string
   *  Return html form.
   */
  abstract public function createForm($fields, $paymentUrl, $redirect, $canelUrl);
  
}
