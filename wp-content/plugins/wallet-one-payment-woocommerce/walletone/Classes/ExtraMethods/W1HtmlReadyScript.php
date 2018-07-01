<?php
namespace WalletOne\Classes\ExtraMethods;

class W1HtmlReadyScript extends \WalletOne\Classes\StandardsMethods\W1Html  {

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
  public function getHtmlPayments($paymentName, $paymentActive, $filename, $inputName){
    $list_payments = include($filename);
    //Create an html with the data of payments methods and icons
    $html = '<div class="list-paysystem">';
    $name = $inputName .'['. $paymentName . '][]';
    foreach ($list_payments as $list) {
      $html .= '<p><strong>' . $list['name'] . '</strong></p>';
      if (!empty($list['data'])) {
        foreach ($list['data'] as $sublist) {
          if (!empty($sublist['data'])) {
            $html .= '<span><strong>' . $sublist['name'] . '</strong></span>';
            foreach ($sublist['data'] as $key => $subsublist) {
              $nameId = 'input_w1_'.$paymentName.'_'.$subsublist['id'];
              $html .= '<div>
                          <input type="checkbox" name="' . $name . '" value="' . $subsublist['id'] . '" id="'.$nameId.'" ';
              if(!empty($paymentActive) && is_array($paymentActive) && array_search($subsublist['id'], $paymentActive) !== false) {
                $html .= ' checked';
              }
              $html .=  '>';
              $html .= '<label for="'.$nameId.'">'
                  . '<img src="' . $this->logoUrl . $subsublist['id'] . '.png?type=pt&w=50&h=50'.'">'
                  . $subsublist['name'] . 
                  '</label>'
                  . '</div>';
            }
          }
          else {
            $nameId = 'input_w1_' . $paymentName . '_' . $subsublist['id'];
            $html .= '<div><input type="checkbox" name="' . $name . '" id="'.$nameId.'" ';
            if(!empty($paymentActive) && is_array($paymentActive) && array_search($sublist['id'], $paymentActive) !== false){
              $html .= ' checked';
            }
            $html .= ' value="' . $sublist['id'] . '">';
            $html .= '<label for="'.$nameId.'">'
                . '<img src="' . $this->logoUrl . $sublist['id'] . '.png?type=pt&w=50&h=50'.'">'
                . $sublist['name']
                . '</label>'
                . '</div>';
          }
        }
      }
    }
    $html .= '</div>';
    return $html;
  }
  
}
