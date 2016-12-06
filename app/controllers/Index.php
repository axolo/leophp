<?php
namespace leophp;
require_once(LEOPHP . 'Controller.php');
require_once(LEOPHP . 'Model.php');
require_once(LEOPHP . 'storage' . DIRECTORY_SEPARATOR . App::config()['storage']['engine'] . '.php');

class Index extends Controller {

  public function index() {
    return array('controller' => 'index', 'action' => 'index');
  }

  public function db() {
    // sqlsrv
    // $db = new Storage(App::config()['storage']);
    // s$db->query("select * from CMSMX");
    // return $db->fetchAll();
    
    // pdo
    $db = new Storage(App::config()['storage']['dsn'], App::config()['storage']['dbuser'], App::config()['storage']['dbpass']);
    return $db->query("select * from CMSMX")->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function info() {
    // $db = new Storage(App::config()['storage']);
    // return $db->info();
  }

}