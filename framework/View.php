<?php
namespace leophp;

class View {

  //json output
  public static function json($res) {
    header('Content-Type:text/json');
    echo json_encode($res);
  }

  public static function jsonp($res) {
    header('Content-Type:text/json');
    $callback = isset($_GET['callback']) ? $_GET['callback'] : 'jsonp_callback';
    echo $callback . '(' . json_encode($res) . ')';
  }

  //error output (json)
  public static function error($err) {
    header('Content-Type:text/json');
    die(json_encode($err));
  }

  //render to HTML
  public static function render($res, $view = null) {
    //@todo default view
    // if(null == $view) {
    //   $view = 'view file';
    // }
    if(file_exists($view) && require_once($view)) {
      //@todo defend XSS attacks
    } else {
      self::error(404);
    }
  }
}