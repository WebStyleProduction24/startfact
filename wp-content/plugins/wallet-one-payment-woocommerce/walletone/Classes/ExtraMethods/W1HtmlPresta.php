<?php
namespace WalletOne\Classes\ExtraMethods;

class W1HtmlPresta extends \WalletOne\Classes\StandardsMethods\W1Html  {

  public function __construct($config, $lang = 'ru') {
    parent:: __construct($config, $lang);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
  
  /**
   * Creating a set of checkboxes for the pay systems.
   * 
   * @param string $paymentName
   *  Name of payment - enabled|disabled.
   * @param array $paymentActive
   *  An array of selected values.
   * @param string $filename
   *  Name file with array of payment sysytems.
   * @param string $inputName
   *  Name checkbox in CMS.
   * @return string
   */
  public function getArrayPaymentsWithIcons($filename){
    $list_payments = include($filename);
    //Create an array with the data of payments methods and icons
    $mas_payments = [];
    foreach ($list_payments as $list) {
      if (!empty($list['data'])) {
        foreach ($list['data'] as $sublist) {
          if (!empty($sublist['data'])) {
            foreach ($sublist['data'] as $subsublist) {
              $img = '<img width="30" src="'. $this->logoUrl . $subsublist['id'] . '.png?type=pt&w=50&h=50'.'">';
              $mas_payments[$subsublist['id']] = $img.' '.$subsublist['name'] . ($subsublist['name'] != $sublist['name'] ? ' (' . $sublist['name'] . ')' : '');
            }
          }
          else {
            $img = '<img width="30" src="'. $this->logoUrl . $sublist['id'] . '.png?type=pt&w=50&h=50'.'">';
            $mas_payments[$sublist['id']] = $img.' '.$sublist['name'];
          }
        }
      }
    }
    return $mas_payments;
  }
  
  /**
   * Creating array of payment system without icons.
   * 
   * @param string $filename
   *  Name file with array of payment sysytems.
   * @return array
   */
  public function getArrayPayments($filename){
    $list_payments = include($filename);
    
    //Create an array with the data of payments methods and icons
    $mas_payments = array();
    foreach ($list_payments as $list) {
      if (!empty($list['data'])) {
        foreach ($list['data'] as $sublist) {
          if (!empty($sublist['data'])) {
            foreach ($sublist['data'] as $subsublist) {
              $mas_payments[$subsublist['id']] = $subsublist['name'];
            }
          }
          else {
            $mas_payments[$sublist['id']] = $sublist['name'];
          }
        }
      }
    }
    
    return $mas_payments;
  }
  
}
