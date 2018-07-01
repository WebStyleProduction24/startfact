<?php
namespace WalletOne\Classes\StandardsMethods;

use WalletOne\Helpers\W1Logs;

class W1Invoices extends \WalletOne\Api\W1InvoicesAbstract  {
      
  function __construct($config, $params = array()) {
    parent:: __construct($config, $params);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
  
}
