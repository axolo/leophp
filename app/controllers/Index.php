<?php
namespace leophp;

class Index extends Controller {

  public function index() {
    return array('controller' => 'index', 'action' => 'index');
  }

}