<?php
namespace WalletOne\Classes\ExtraMethods;

class W1HtmlDiafan extends \WalletOne\Classes\StandardsMethods\W1Html  {

  public function __construct($config, $lang = 'ru') {
    parent:: __construct($config, $lang);
    
    $this->logger = \Logger::getLogger(__CLASS__);
  }
  
  /**
   * Select creation.
   * 
   * @param string $nameLabel
   *  Output content label.
   * @param string $desc
   *  Output description.
   * @param string $nameInput
   *  Name form element select.
   * @param array $valueArray
   *  A list of data for output to select.
   * @param string $valueDefault
   *  Default value.
   * @param string $value
   *  Present value.
   * @param string $versionCms
   *  Version of CMS.
   * @return string
   */
  public function generateSelect($nameLabel, $desc = '', $nameInput, $valueArray, $valueDefault, $value, $versionCms) {
    $html = '';
    if(intval($versionCms) == 5) {
      $html .= '<tr class="tr_payment" payment="w1" style="display:none">
        <td class="td_first">' . $nameLabel . '</td>
        <td>
                          <select name="'.$nameInput.'">';
      foreach ($valueArray as $k => $v){
        $html .= '<option value="' . $k . '"' . (!empty($value) && $value == $k 
            || empty($value) && $valueDefault == $k ? ' selected' : '')
            . '>' . $v . '</option>';
      }
      $html .= '</select>
      </tr>';
    }
    else {
      $html .= '<div class="unit tr_payment" payment="w1" style="display:none">
			<div class="infofield">' . $nameLabel .
        (!empty($desc) ?
          '<i class="tooltip fa fa-question-circle" title="'.$desc.'"></i>' : ''
        ).
        '</div>'
          . '<select name="'.$nameInput.'">';
			foreach($valueArray as $k => $v){
        $html .= '<option value="' . $k . '"' . (!empty($value) && $value == $k 
            || empty($value) && $valueDefault == $k ? ' selected' : '')
            . '>' . $v . '</option>';
			}
			$html .= '
        </select>
      </div>';
    }
    
    return $html;
  }
  
  /**
   * Create html for disabled input
   * 
   * @param array $params
   * @param int $version
   * @param string $homeUrl
   * @return string
   */
  public function generateInputDisabled($params, $version, $homeUrl){
    $html = '';
    if(intval($version) == 5) {
      $html .= '<tr class="tr_payment" payment="w1" style="display:none">
        <td class="td_first">' . $params['name'] . '</td>
        <td>
          <link rel="stylesheet" href="'. $homeUrl . '/walletone/css/diafan.css">
          <input name="return" value="'. $params['default'] .'" disabled>
        </tr>';
    }
    else {
      $html .= '<div class="unit tr_payment" payment="w1" style="display:none">
			<div class="infofield">' . $params['name'] .
        (!empty($params['help']) ?
          '<i class="tooltip fa fa-question-circle" title="'.$params['help'].'"></i>' : ''
        ).
        '</div>
          <link rel="stylesheet" href="'. $homeUrl . '/walletone/css/diafan.css">
          <input name="return" value="'. $params['default'] .'" disabled>
      </div>';
    }
    
    return $html;
  }
  
  public function generateIcons($params, $version, $link){
    $html = '';
    if(intval($version) == 5) {
      $html .= '<tr class="tr_payment" id="icon" style="display:none" payment="w1">
      <td class="td_first">'.$params['name'].'</td>
      <td param_id="0">';
    }
    else {
      $html .= '<div class="unit tr_payment" payment="w1" style="display:none">
        <div class="infofield">'.$params['name'].'</div>';
    }
    
    if (!empty($link)) {
      $html .= '<img style="float:left;margin-right:10px;max-width:70px" src="' . $link . '?' . mt_rand() .'">'
          . '<input type="hidden" name="w1_icon" value="'.$link.'">';
    }
    if(intval($version) == 5) {
      $html .= '<input class="fileupload" type="file" name="w1_icon">
        </td>
      </tr>';
    }
    else {
      $html .= '<input class="fileupload" type="file" name="w1_icon">
        </div>';
    }
    
    return $html;
  }
  
}
