<?php
namespace leophp;

class_exists(__NAMESPACE__ . '\\Config')  || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Config.php');
class_exists(__NAMESPACE__ . '\\Plugin')  || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Plugin.php');
class_exists(__NAMESPACE__ . '\\View')    || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'View.php');

class App {

  private static $__config;

  public static function config() {
    return self::$__config;
  }

  public static function run($config=null) {
    //parse config file
    //@todo array_merge(default-config, user-config) foreach array
    self::$__config = Config::parse(require_once($config));

    //parse plugins 
    //@todo foreach plugins
    $plugins = Plugin::parse(self::$__config['plugins']);

    //parse Controller/action
    //@todo parse params (pathinfo to querystring put in $_REQUEST)
    $controller = ucfirst(self::$__config['core']['controller']);
    $action = self::$__config['core']['action'];
    if(isset(self::$__config['core']['request']) && self::$__config['core']['request'] == 'pathinfo') {
      if(isset($_SERVER['PATH_INFO'])) {
        $path = explode('/', $_SERVER['PATH_INFO']);
        $controller = ucfirst(isset($path[1])&&$path[1] ? $path[1] : $controller);
        $action = isset($path[2])&&$path[2] ? $path[2] : $action;
      }
    }

    //load Controller->action()
    $controller_file = getcwd() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $controller . '.php';
    if(file_exists($controller_file) && require_once($controller_file)) {
      $controller_name = __NAMESPACE__ .'\\'. $controller;
      $controller_run = new $controller_name;
      $action_run = $controller_run->$action();
      switch(self::$__config['core']['response']) {
        case 'json':  View::json($action_run);   break;
        default:      View::render($action_run);
      }
    } else {
      View::error(404);
    }
  }

}