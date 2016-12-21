<?php
namespace leophp;

class Index extends Controller {

  public function index() {
    return array(
      array('controller' => 'index', 'action' => array( 'index', 'server', 'request','sql', 'xss')),
      array('controller' => 'db',    'action' => array('index'))
    );
  }

  public function server() {
    return $_SERVER;
  }

  public function request() {
    return $_REQUEST;
  }

  public function sql() {
    return array(
      //act: SQL Inject attack on GBK charset
      'act' => "SELECT * FROM users WHERE username = '縗' OR username = username #' AND password = 'anything'",
      'sql' => Utils::sql("SELECT * FROM users WHERE username = '縗' OR username = username #' AND password = 'anything'")
    );
  }

  public function xss() {
    return array(
      //xss: XSS attack
      'xss' => '<h3>XSS</h3>',
      'htm' => Utils::xss('<h3>XSS</h3>')
    );
  }

}
