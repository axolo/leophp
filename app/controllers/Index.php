<?php
namespace leophp;
require_once(LEOPHP . 'Controller.php');
// require_once(LEOPHP . 'Model.php');
// require_once(LEOPHP . 'storage' . DIRECTORY_SEPARATOR . App::config()['storage']['engine'] . '.php');

class Index extends Controller {

  public function index() {
    return array('controller' => 'index', 'action' => 'index');
  }

}