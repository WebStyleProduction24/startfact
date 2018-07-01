<?php

namespace WalletOne\Classes;

class W1Factory{
  
  public static function createHtmlClass($config, $className, $lang = 'ru'){
    $object = null;
    switch ($className) {
      case 'diafan':
        $object = new \WalletOne\Classes\ExtraMethods\W1HtmlDiafan($config, $lang);
        break;
      case 'modx':
        $object = new \WalletOne\Classes\ExtraMethods\W1HtmlModx($config, $lang);
        break;
      case 'presta':
        $object = new \WalletOne\Classes\ExtraMethods\W1HtmlPresta($config, $lang);
        break;
      case 'readyScript':
        $object = new \WalletOne\Classes\ExtraMethods\W1HtmlReadyScript($config, $lang);
        break;
      case 'amiro':
        $object = new \WalletOne\Classes\ExtraMethods\W1HtmlAmiro($config, $lang);
        break;
      default:
        $object = new \WalletOne\Classes\StandardsMethods\W1Html($config, $lang);
        break;
    }
    
    return $object;
  }
  
  public static function createPaymentsClass($config, $className, $lang = 'ru'){
    $object = null;
    switch ($className) {
      case 'diafan':
        $object = new \WalletOne\Classes\ExtraMethods\W1PaymentsDiafan($config, $lang);
        break;
      case 'readyScript':
        $object = new \WalletOne\Classes\ExtraMethods\W1PaymentsReadyScript($config, $lang);
        break;
      case 'netcat':
        $object = new \WalletOne\Classes\ExtraMethods\W1PaymentsNetcat($config, $lang);
        break;
      default:
        $object = new \WalletOne\Classes\StandardsMethods\W1Payments($config, $lang);
        break;
    }
    
    return $object;
  }
  
  public static function createSettingsClass($config, $className, $lang = 'ru'){
    $object = null;
    switch ($className) {
      case 'modx':
        $object = new \WalletOne\Classes\ExtraMethods\W1SettingsModx($config, $lang);
        break;
      default:
        $object = new \WalletOne\Classes\StandardsMethods\W1Settings($config, $lang);
        break;
    }
    
    return $object;
  }
}

