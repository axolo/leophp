<?php
namespace leophp;
// require(__DIR__ . DIRECTORY_SEPARATOR . 'App.php');

class Model {

  private static $__config;

  //connect to database
  public function __construct() {
    self::$__config = App::__getConfig();
  }

  public static function get() {
    return App::__getConfig();
    return self::$__config;
  }
}