<?php

namespace WalletOne\Helpers;

class W1Messages{
  /**
	 * Output messages + errors in 1 line.
	 * 
   * @return string
	 */
	public function MessageText($errors, $messages) {
    $html = '';
		if (!empty($errors)) {
			foreach ($errors as $error) {
				$html .= $error . '<br>';
			}
		}
    if (!empty($messages)) {
			foreach ($messages as $message) {
				$html .= $message . '<br>';
			}
		}
    return $html;
	}
  
  /**
   * Output messages + errors.
   * 
   * @return string
   */
  public function MessageHtml($errors, $messages) {
    $html = '';
    if (!empty($errors)) {
      foreach ($errors as $error) {
        $html .= '<div id="message" class="error inline"><p><strong>' . $error . '</strong></p></div>';
      }
    }
    if (!empty($messages)) {
      foreach ($messages as $message) {
        $html .= '<div id="message" class="notice notice-warning inline is-dismissible"><p><strong>' . $message . '</strong></p></div>';
      }
    }
    return $html;
  }

}

