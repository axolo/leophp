<?php
//array_merge(default_config, user_config)
return array(
  //pathinfo:     /index.php/resource/method
  //querystring:  /index.php?resource=string&method=string
  //urlrewrite:   /resource/method (@todo)
  'urlformat' => 'pathinfo',
  //json:   JSON
  //jsonp:  JSONP
  //xml:    XML (@todo)
  'response' => 'json',
  // ./plugins/plugins[key].php || framework/plugins[key].php
  //Array[plugin => params]
  'plugins' => array(
    'debug' => true,              //Debug
    'halt' => 'out of service',   //Service halt 
    'hash' => 'String of secret', //COOKIE, password, token ...
    'cors' => true,               //CORS
    'rbac' => true,               //RBAC
    'oauth' => [],                //OAuth
    'sso' => false                //Single Sign-On
  ),
  //Database Conection
  'storage' => array(
    'extension' => 'PDO',
    'dsn' => 'mysql:host=localhost;dbname=testdb',
    'user' => 'root',
    'password' => '',
    'option' => array()
  ),
  //Farmework Infomation
  'framework' => array(
    'name' => 'LeoPHP',
    'version' => '0.0.1',
    'author' => 'Yueming Fang',
    'git' => 'https://github.com/axolo/leophp.woodso.com'
  )
);