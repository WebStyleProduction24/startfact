<?php
namespace WalletOne\Classes\StandardsMethods;

use WalletOne\Helpers\W1Logs;

class W1Results extends \WalletOne\Api\W1ResultsAbstract  {
  
  function __construct($config, $params = array()) {
    parent:: __construct($config, $params);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
}
