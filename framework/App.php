<?php
namespace leophp;

class App {

  private $__env;

  private function __getEnv() {
    return array(
      'dir'       => __DIR__,
      'file'      => __FILE__,
      'namespace' => __NAMESPACE__,
      'class'     => __CLASS__,
      'method'    => __METHOD__,
      'request'   => $_REQUEST,
      'cookie'    => $_COOKIE,
      'session'   => $_SESSION,
      'files'     => $_FILES,
      'env'       => $_ENV,
      'server'    => $_SERVER
    );
  }

  private function __getConfig() {
    return require_once(__DIR__ . './config/default.php');
  }
  

  public static function run() {
    // return self::__getConfig();
    return self::__getEnv();
  }

}