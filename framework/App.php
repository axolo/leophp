<?php
namespace leophp;
use \Exception as Exception;
use \ReflectionMethod as ReflectionMethod;
class_exists(__NAMESPACE__ . '\\Plugin')  || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Plugin.php');
class_exists(__NAMESPACE__ . '\\View')    || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'View.php');
class_exists(__NAMESPACE__ . '\\Utils')   || require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Utils.php');


class App {

  private static $__config;

  /**
   * config getter/setter
   * @param  mixed $config config
   * @return array         config
   * $config null   get config
   * $config array  set config
   */
  public static function config($config = null) {
    !$config || self::$__config = $config;
    return self::$__config;
  }

  public static function router() {
    $controller = self::config()['core']['controller'];
    $action = self::config()['core']['action'];
    if(isset(self::config()['core']['request']) && self::config()['core']['request'] == 'pathinfo') {
      if(isset($_SERVER['PATH_INFO'])) {
        $path = explode('/', $_SERVER['PATH_INFO']);
        $controller = isset($path[1])&&$path[1] ? $path[1] : $controller;
        $action = isset($path[2])&&$path[2] ? $path[2] : $action;
      }
    }
    return array('controller'=>$controller, 'action'=>$action);
  }


  public static function run($config = null) {

    try {

      // parse config file
      // @todo array_merge(default-config, user-config) foreach array
      $config = $config ? $config : join(DIRECTORY_SEPARATOR, array(__DIR__, 'config', 'default.php'));
      self::config(require_once($config));

      // parse plugins
      // @todo plugins maybe Class extends Plugin
      $plugin_dir = dirname(dirname($config));
      Plugin::parse(self::config()['plugins'], $plugin_dir);

      // router
      $router = self::router();
      $controller = $router['controller'];
      $action = $router['action'];

      // load
      // Controller->action()
      $current_dir = getcwd();
      $controller_file = join(DIRECTORY_SEPARATOR, array($current_dir, 'controllers', self::router()['controller'] . '.php'));
      $view_file = join(DIRECTORY_SEPARATOR, array($current_dir, 'views',  strtolower($controller), $action . '.php'));
      if(file_exists($controller_file) && require_once($controller_file)) {
        $controller_name = __NAMESPACE__ .'\\'. ucfirst($controller);
        class_exists($controller_name) && method_exists($controller_name, $action) || View::error(405);
        $controller = new $controller_name;
        $reflection = new ReflectionMethod($controller, $action);
        $params = $reflection->getParameters();
        $run = call_user_func_array(array($controller, $action), $params);
        switch(self::config()['core']['response']) {
          case 'json':  View::json($run);    break;
          case 'jsonp': View::jsonp($run);   break;
          default:      View::render($run, $view_file);
        }
      } else {
        View::error(404);
      }
    } catch (Exception $e) {
      // @todo json response, may be `View::error($e->getMessage());`
      header('Content-Type:text/plain;charset=gbk');
      exit($e->getMessage());
    }
  }

}
