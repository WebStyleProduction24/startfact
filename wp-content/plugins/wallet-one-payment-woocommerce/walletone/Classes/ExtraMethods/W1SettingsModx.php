<?php
namespace WalletOne\Classes\ExtraMethods;


class W1SettingsModx extends \WalletOne\Classes\StandardsMethods\W1Settings {
  public $cultureName;
  
  public $cultureCode;
  
  function __construct($config) {
    parent:: __construct($config);
    
    $this->cultureCode = $config['cultureCode'];
    $this->cultureName = $config['cultureName'];
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
}
