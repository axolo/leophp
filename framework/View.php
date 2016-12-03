<?php
namespace leophp;
class View {

  public static function json($res) {
    header('Content-Type:text/json');
    echo json_encode($res);
  }

  public static function render($res) {
    //@todo
    //require view file and render
    var_dump($res);
  }
}