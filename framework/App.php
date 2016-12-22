<?php
namespace leophp;

class_exists(__NAMESPACE__ . '\\Config')  || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Config.php');
class_exists(__NAMESPACE__ . '\\Plugin')  || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Plugin.php');
class_exists(__NAMESPACE__ . '\\View')    || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'View.php');
class_exists(__NAMESPACE__ . '\\Utils')   || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Utils.php');

use \Exception as Exception;

class App {

  private static $__config;
  // private static $__controller;
  // private static $__action;
  // private static $__view;

  public static function config() {
    return self::$__config;
  }

  public static function run($config=null) {
    /**
     * @todo  throw errors ...
     */
    try {
      // throw new Exception('Throw an error!');
      //parse config file
      //@todo array_merge(default-config, user-config) foreach array
      $config = $config ? $config : __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'default.php';
      self::$__config = Config::parse(require_once($config));

      //parse plugins
      //@todo plugins maybe Class extends Plugin
      $plugin_dir = dirname(dirname($config));
      Plugin::parse(self::$__config['plugins'], $plugin_dir);

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
      $current_dir = getcwd() . DIRECTORY_SEPARATOR;
      $controller_file = $current_dir . 'controllers' . DIRECTORY_SEPARATOR . $controller . '.php';
      $view_file = $current_dir . 'views' . DIRECTORY_SEPARATOR .  strtolower($controller) . DIRECTORY_SEPARATOR . $action . '.php';
      if(file_exists($controller_file) && require_once($controller_file)) {
        $controller_name = __NAMESPACE__ .'\\'. $controller;
        (class_exists($controller_name) && method_exists($controller_name, $action)) || View::error(405);
        $controller_run = new $controller_name;
        $action_run = $controller_run->$action();
        switch(self::$__config['core']['response']) {
          case 'json':  View::json($action_run);    break;
          case 'jsonp': View::jsonp($action_run);   break;
          default:      View::render($action_run, $view_file);
        }
      } else {
        View::error(404);
      }      
    } catch (Exception $e) {
      //@todo json response, may be `View::error($e->getMessage());`
      header('Content-Type:text/plain;charset=gbk');
      exit($e->getMessage());
    }
  }

}
