<?php
namespace WalletOne\Classes\ExtraMethods;

class W1HtmlModx extends \WalletOne\Classes\StandardsMethods\W1Html  {

  public function __construct($config, $lang = 'ru') {
    parent:: __construct($config, $lang);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
  
  /**
   * Creating array of payment system with icons and for json array.
   * 
   * @param string $filename
   *  Name file with array of payment sysytems.
   * @return array
   */
  public function getArrayJsonPayments($filename, $ptenabled, $ptdisabled){
    //check the file
    if(!file_exists($filename)){
      $this->logger->info(sprintf(w1ErrorFileExist, $filename));
      return '';
    }
    
    $list_payments = include_once($filename);
    //Create an array with the data of payments methods and icons
    $mas_payments = array();
    foreach ($list_payments as $list) {
      if (!empty($list['data'])) {
        foreach ($list['data'] as $sublist) {
          if (!empty($sublist['data'])) {
            foreach ($sublist['data'] as $subsublist) {
              $checked_enabl = false;
              if (!empty($ptenabled) && is_array($ptenabled) && array_search($subsublist['id'], $ptenabled) !== false) {
                $checked_enabl = true;
              }
              $checked_dis = false;
              if (!empty($ptdisabled) && is_array($ptdisabled) && array_search($subsublist['id'], $ptdisabled) !== false) {
                $checked_dis = true;
              }
              $mas_payments[] = array(
                'id' => $subsublist['id'],
                'name' => $subsublist['name'],
                'checked_enabl' => $checked_enabl,
                'checked_dis' => $checked_dis,
                'icon' => $this->logoUrl . $subsublist['id'] . '.png?type=pt&w=50&h=50'
              );
            }
          }
          else {
            $checked_enabl = false;
            if (!empty($ptenabled) && is_array($ptenabled) && array_search($sublist['id'], $ptenabled) !== false) {
              $checked_enabl = true;
            }
            $checked_dis = false;
            if (!empty($ptdisabled) && is_array($ptdisabled) && array_search($sublist['id'], $ptdisabled) !== false) {
              $checked_dis = true;
            }
            $mas_payments[] = array(
              'id' => $sublist['id'],
              'name' => $sublist['name'],
              'checked_enabl' => $checked_enabl,
              'checked_dis' => $checked_dis,
              'icon' => $this->logoUrl . $sublist['id'] . '.png?type=pt&w=50&h=50'
            );
          }
        }
      }
    }
    
    if(empty($mas_payments)){
      $this->logger->info(w1ErrorCreatePayments);
    }
    
    return $mas_payments;
  }
  
  /**
   * Creating array of payment system with icons.
   * 
   * @param string $filename
   *  Name file with array of payment sysytems.
   * @return array
   */
  public function getArrayPayments($filename){
    //check the file
    if(!file_exists($filename)){
      $this->logger->info(sprintf(w1ErrorFileExist, $filename));
      return '';
    }
    
    $list_payments = include_once($filename);
    
    //Create an array with the data of payments methods and icons
    $mas_payments = array();
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
    
    if(empty($mas_payments)){
      $this->logger->info(w1ErrorCreatePayments);
    }
    
    return $mas_payments;
  }
  
}
