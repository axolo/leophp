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

  public function sql() {
    return array(
      //sql: SQL Inject attack on GBK charset
      'sql' => "SELECT * FROM users WHERE username = '縗' OR username = username #' AND password = 'anything'",
      'add' => Utils::sql("SELECT * FROM users WHERE username = '縗' OR username = username #' AND password = 'anything'")
    );
  }

  public function xss() {
    return array(
      //htm: XSS attack
      'htm' => '<h3>XSS</h3>',
      'xss' => Utils::xss('<h3>XSS</h3>')
    );
  }

}
