<?php
namespace leophp;
require_once(LEOPHP . 'Controller.php');
require_once(LEOPHP . 'Model.php');

class Index extends Controller {

  public function index() {
    return 'controller: index, action: index';
  }

  public function db() {
    return Model::get();
  }
}