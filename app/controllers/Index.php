<?php
namespace leophp;

class Index extends Controller {

  public function index() {
    return array('controller' => 'index', 'action' => 'index');
  }

  public function server() {
    return $_SERVER;
  }

  public function request() {
    return $_REQUEST;
  }

}
