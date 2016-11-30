<?php
class App {

  // private $_params = array(
  //     'request' => $_REQUEST,
  //     'server'  => $_SERVER,
  //     'cookie'  => $_COOKIE,
  //     'session' => $_SESSION,
  //     'files' => $_FILES,
  //     'env' => $_ENV,
  //     'class' => __CLASS__
  //   );
  

  static function run() {
    $res = array(
      'request' => $_REQUEST,
      'server'  => $_SERVER,
      'cookie'  => $_COOKIE,
      'session' => $_SESSION,
      'files' => $_FILES,
      'env' => $_ENV,
      'class' => __CLASS__
    );
    return $res;
  }

  private function _run($resource = null, $method = null) {
    return $this->_params;
  }

}