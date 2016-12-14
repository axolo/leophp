<?php
//array_merge(default_config, user_config)
return array(
  'core' => array(
    //pathinfo:     /index.php/resource/method
    //querystring:  /index.php?resource=string&method=string (@todo)
    //urlrewrite:   /resource/method (@todo)
    'request' => 'pathinfo',
    //html:   HTML      default output, view render
    //json:   JSON      Conflux Response, e.g. RESTful
    //jsonp:  JSONP     (@todo)
    //xml:    XML       (@todo)
    'response' => 'html',
    //controller: ucfirst(controller)
    'controller' => 'index',
    //action: default index
    'action' => 'index',
    //charset: default utf8
    'charset' => 'utf8'
  ),
  // ./plugins/plugins[key].php || framework/plugins[key].php
  //Array[plugin => params]
  'plugins' => array(
    'debug' => true,              //Debug
    'cors' => true,               //CORS
    'rbac' => true,               //RBAC
    'restful' => false,           //RESTful
    'oauth' => array(),           //OAuth
    'sso' => false,               //Single Sign-On
    'halt' => 'out of service',   //Service halt 
    'hash' => 'String of secret'  //COOKIE, password, token ...
  ),
  //Database Conection
  'storage' => array(
    'engine' => 'pdo',  //lowercase
    'dsn' => 'mysql:host=localhost;dbname=information_schema',
    'user' => 'root',
    'password' => '',
    'options' => array()
  ),
  //Farmework Infomation
  'framework' => array(
    'name' => 'LeoPHP',
    'version' => '0.1.2',
    'author' => 'Yueming Fang',
    'git' => 'https://github.com/axolo/leophp'
  )
);