<?php
namespace WalletOne\Classes\StandardsMethods;

class W1Html extends \WalletOne\Api\W1HtmlAbstract  {

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
  public function getHtmlPayments($paymentName, $paymentActive, $filename, $inputName = ''){
    $list_payments = include($filename);
    //Create an html with the data of payments methods and icons
    $html = '<div class="list-paysystem">';
    $name = $inputName . $paymentName . '[]';
    foreach ($list_payments as $list) {
      $html .= '<p><strong>' . $list['name'] . '</strong></p>';
      if (!empty($list['data'])) {
        foreach ($list['data'] as $sublist) {
          if (!empty($sublist['data'])) {
            $html .= '<span><strong>' . $sublist['name'] . '</strong></span>';
            foreach ($sublist['data'] as $key => $subsublist) {
              $nameId = 'input_w1_'.$paymentName.'_'.$subsublist['id'];
              $html .= '<div>
                          <input type="checkbox" name="' . $name . '" value="' . htmlspecialchars($subsublist['id']) . '" id="'.$nameId.'" ';
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
            $html .= ' value="' . htmlspecialchars($sublist['id']) . '">';
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
  
  /**
   * The creates picture with set of icons.
   * 
   * @param array $mas_ptenabled
   * @param array $mas_ptdisabled
   * @param srting $filename
   * @return boolean|string
   */
  public function createIcon($mas_ptenabled = [], $mas_ptdisabled = [], $filename) {
    $list_payments = include($filename);
    if(!$list_payments || !is_array($list_payments)){
      $this->logger->error(w1ErrorFileRead);
      $this->errors[] = w1ErrorFileRead;
      return false;
    }
    
    $listPtdisabled = [];
    $ptdisabledCodeWithoutCurrencyCode = [];
    if(!empty($mas_ptdisabled)){
      foreach ($mas_ptdisabled as $key => $value) {
        $code = substr($value, 0, -3);
        if(empty($ptdisabledCodeWithoutCurrencyCode) && !empty($code) || 
            !in_array($code, $ptdisabledCodeWithoutCurrencyCode)){
          $listPtdisabled[] = $value;
          $ptdisabledCodeWithoutCurrencyCode[] = $code;
        }
      }
    }
    
    $ptenabledCodeWithoutCurrencyCode = [];
    $listPtenabled = [];
    if(!empty($mas_ptenabled)){
      foreach ($mas_ptenabled as $key => $value) {
        $code = substr($value, 0, -3);
        if(empty($ptenabledCodeWithoutCurrencyCode) && !empty($code) 
            || !in_array($code, $ptenabledCodeWithoutCurrencyCode)){
          $listPtenabled[] = $value;
          $ptenabledCodeWithoutCurrencyCode[] = $code;
        }
      }
    }
    
    $ptenabled = [];
    if(!empty($listPtenabled) && !empty($listPtdisabled)){
      $listPtenabled = array_diff($listPtenabled, $listPtdisabled);
      foreach ($listPtenabled as $list) {
        $masIcons[] = $this->logoUrl . $list . '.png?type=pt&w=50&h=50';
      }
    }
    elseif(!empty($listPtenabled) && empty($listPtdisabled)){
      foreach ($listPtenabled as $list) {
        $masIcons[] = $this->logoUrl . $list . '.png?type=pt&w=50&h=50';
      }
    }
    else{
      $masIcons = [];
      $listMainPayments = [];
      foreach ($list_payments as $list) {
        if (!empty($list['data'])) {
          foreach ($list['data'] as $sublist) {
            if (!empty($sublist['data'])) {
              foreach ($sublist['data'] as $subsublist) {
                if (!empty($subsublist['required']) && $subsublist['required'] == 1) {
                  $code = substr($subsublist['id'], 0, -3);
                  if(!in_array($code, $listMainPayments) || empty($listMainPayments)){
                    $masIcons[] = $this->logoUrl . $subsublist['id'] . '.png?type=pt&w=50&h=50';
                    $listMainPayments[] = $code;
                  }
                }
              }
            }
            elseif (!empty($sublist['required']) && $sublist['required'] == 1) {
              $code = substr($sublist['id'], 0, -3);
              if(!in_array($code, $listMainPayments) || empty($listMainPayments)){
                $masIcons[] = $this->logoUrl . $sublist['id'] . '.png?type=pt&w=50&h=50';
                $listMainPayments[] = $code;
              }
            }
          }
        }
      }
    }
    
    if(empty($masIcons)){
      $this->logger->warn(w1ErrorCreateIcon);
      return false;
    }
    
    $masIcons = array_unique($masIcons);
    $picPath = $this->createPic($masIcons);
    
    return $picPath;
  }
  
  /**
   * Create and save picture.
   * 
   * @param array $masPic
   * @return boolean|string
   */
  private function createPic($masPic){
    $allowed_types = array('jpg', 'jpeg', 'png');
    $nw = 50 * count($masPic);
    $nh = 50;
    //creation of a new canvas.
    $img = imagecreatetruecolor($nw, $nh);
    $col2 = ImageColorAllocate($img, 255, 255, 255);
    ImageFilledRectangle($img, 0, 0, $nw, $nh, $col2);
    imagecolortransparent($img, imagecolorallocate($img, 255, 255, 255));
    $i = 0;

    foreach ($masPic as &$file) {
      $str = explode('/', $file);
      $str[count($str) - 1] = stristr($str[count($str) - 1], '?', true);
      $content = file_get_contents($file);
      file_put_contents($this->homeDir . '/tmp/' . $str[count($str) - 1], $content);
      
      $file = $this->homeDir . '/tmp/' . $str[count($str) - 1];
      $fileParts = explode('.', $file);
      $ext = strtolower(array_pop($fileParts));

      if (in_array($ext, $allowed_types)) {
        if ($ext == 'jpeg') {
          $ext = 'jpg';
        }
        if ($ext == 'jpg') {
          if(!$pic = imagecreatefromjpeg($file)){
            $this->logger->error(w1ErrorCreateImage);
            return false;
          }
        }
        elseif ($ext == 'png') {
          if(!$pic = imagecreatefrompng($file)){
            $this->logger->error(w1ErrorCreateImage);
            return false;
          }
        }
        //put an icon on the canvas
        imagecopy($img, $pic, $i, 0, 0, 0, 50, 50);
        $i += 50;
      }
    }
    //save the canvas
    $fileNew = $this->homeDir . '/img/new_icon.' . $ext;
    if(file_exists($fileNew)){
      unlink($fileNew);
    }
    if ($ext == 'jpg') {
      if (!imagejpeg($img, $fileNew)) {
        $this->logger->error(w1ErrorCopyImage);
        return false;
      }
    }
    elseif ($ext == 'png') {
      if (!imagepng($img, $fileNew)) {
        $this->logger->error(w1ErrorCopyImage);
        return false;
      }
    }
    imagedestroy($img);
    imagedestroy($pic);
    $fileNew = 'new_icon.' . $ext;
    if(file_exists($this->homeDir . '/tmp/')){
      $scanned_directory = array_diff(scandir($this->homeDir . '/tmp/'), array('..', '.'));
      foreach ($scanned_directory as $value) {
        unlink($this->homeDir . '/tmp/'.$value);
      }
    }
    return $fileNew;
  }
  
  /**
   * Create for for payment.
   * 
   * @param type $fields
   *  Array of all data.
   * @param type $paymentUrl
   *  Redirect url of payment system.
   * @param type $canelUrl
   * @return string
   */
  public function createForm($fields, $paymentUrl, $redirect = false, $canelUrl = ''){
    $html = '<form action="' . $paymentUrl . '" method="POST" id="formPayment">';
    foreach ($fields as $key => $value) {
      if(is_array($value)){
        foreach ($value as $v) {
          $html .= '<input type="hidden" value="' . htmlspecialchars($v) . '" name="' . $key . '">';
        }
      }
      else{
        $html .= '<input type="hidden" value="' . htmlspecialchars($value) . '" name="' . $key . '">';
      }
    }
    $html .= '<input type="submit" class="button alt" value="' . w1OrderSubmitShort . '" /> ';
    if(!empty($canelUrl)){
      $html .= '<a class="button cancel" href="' . $canelUrl . '">' . w1OrderSubmitBack . '</a>' . "\n";
    }
    $html .= '</form>';
    if($redirect){
      $html .= '<script>document.getElementById("formPayment").submit();</script>';
    }
    
    return $html;
  }
  
}
