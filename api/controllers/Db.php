<?php
namespace leophp;
use \PDO as PDO;

class Db extends Controller {

  public function index() {
    $config = App::config()['storage'];
    $db = new Storage($config['dsn'], $config['user'], $config['password']);
    $sql = "SELECT * FROM INNODB_SYS_TABLES";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

}