<?php
namespace leophp;

class App {

  private static $__config;
  private static $__controller;
  private static $__action;

  public function __construct() {

  }

  private static function __setConfig($config) {
    self::$__config = require_once($config);
    return self::$__config;
  }

  private static function __getConfig() {
    return self::$__config;
  }

  private static function __parsePlugins($plugins=null) {

  }

  public static function run($config=null) {
    //@todo 处理默认配置
    $config && $config = self::__setConfig($config);
    $controller = 'Index';
    $action = 'index';
    //处理控制器
    if(isset($config['core']['request']) && $config['core']['request'] == 'pathinfo') {
      if(isset($_SERVER['PATH_INFO'])) {
        $path = explode('/', $_SERVER['PATH_INFO']);
        $controller = ucfirst(isset($path[1])&&$path[1] ? $path[1] : $controller);
        $action = isset($path[2])&&$path[2] ? $path[2] : $action;
      }
    }
    //加载应用Controller->action()
    $file = getcwd() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $controller . '.php';
    //应用文件存在
    if(file_exists($file) && require_once($file)) {
      $n = __NAMESPACE__ .'\\'. $controller;
      $c = new $n;
      $a = $c->$action();
      //输出及渲染
      $r = require('View.php');
      switch(isset($config['response']) && $config['response']) {
        case 'json':  View::json($a); break;
        default:      View::render($a);
      }
    //应用文件不存在
    } else {
      $e = require('Error.php');
      Error::json(404);
    }
  }

}