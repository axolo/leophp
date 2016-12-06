<?php
namespace leophp;

class View {

  //json output
  public static function json($res) {
    header('Content-Type:text/json');
    echo json_encode($res);
  }

  //error output (json)
  public static function error($err) {
    header('Content-Type:text/json');
    echo json_encode($err);
  }

  //render to HTML
  public static function render($res, $view = null) {
    //@todo
    //require view file and render
    header('Content-Type:text/html;charset=gbk');
    echo '<pre>';
    var_dump($res);
    echo '</pre>';
  }
}