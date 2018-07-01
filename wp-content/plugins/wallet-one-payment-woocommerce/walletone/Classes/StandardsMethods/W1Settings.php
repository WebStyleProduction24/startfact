<?php
namespace WalletOne\Classes\StandardsMethods;


class W1Settings extends \WalletOne\Api\W1SettingsAbstract {
  function __construct($config) {
    parent:: __construct($config);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
}
