<?php

namespace WalletOne\Api;

interface W1Interface {

  /**
   * To check the required fields.
   * 
   * @return boolean
   */
  public function required();

  /**
   * Checks for required fields and cheks validation these fields.
   * 
   * @param array $param
   * 
   * @return boolean
   */
  public function validation();

  /**
   * Get value of field.
   * 
   * @param string $name
   * @return string
   */
  public function getValue($name);
  
  /**
   * Set value of feild.
   * 
   * @param string $name
   * @param string $value
   */
  public function setValue($name, $value);
}

