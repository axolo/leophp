<?php
namespace leophp;
use \PDO as PDO;

class Db extends Controller {

  public function index() {
    $config = App::config()['storage'];
    require_once(join(DIRECTORY_SEPARATOR, array(__DIR__, '..', 'models', $config['dbms'], 'info.php')));
    $info = new Info();
    $res = $info->index($passport);
    return($res);
  }

}
