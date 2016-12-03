<?php
//array_merge(default_config, user_config)
return array(
  'core' => array(
    //pathinfo:     /index.php/resource/method
    //querystring:  /index.php?resource=string&method=string
    //urlrewrite:   /resource/method (@todo)
    'request' => 'pathinfo',
    //json:   JSON      Conflux Response, e.g. RESTful
    //jsonp:  JSONP     (@todo)
    //xml:    XML       (@todo)
    //hmtl:   HTML      default output, view render
    'response' => 'json'
  ),
  // ./plugins/plugins[key].php || framework/plugins[key].php
  //Array[plugin => params]
  'plugins' => array(
    'debug' => true,              //Debug
    'cors' => true,               //CORS
    'rbac' => true,               //RBAC
    'restful' => false,           //RESTful
    'oauth' => [],                //OAuth
    'sso' => false,               //Single Sign-On
    'halt' => 'out of service',   //Service halt 
    'hash' => 'String of secret'  //COOKIE, password, token ...
  ),
  //Database Conection
  'storage' => array(
    'extension' => 'PDO',
    'dsn' => 'mysql:host=localhost;dbname=information_schema',
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