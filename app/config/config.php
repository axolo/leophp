<?php
//array_merge(default_config, user_config)
return array(
  'core' => array(
    //pathinfo:     /index.php/resource/method
    //querystring:  /index.php?resource=string&method=string (@todo)
    //urlrewrite:   /resource/method (@todo)
    'request' => 'pathinfo',
    //json:   JSON      Conflux Response, e.g. RESTful
    //jsonp:  JSONP     (@todo)
    //xml:    XML       (@todo)
    //html:   HTML      default output, view render
    'response' => 'json',
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
    'cors' => true,               //CORS
    'rbac' => true,               //RBAC
    'halt' => false,              //Service halt
    // 'restful' => false,           //RESTful
    // 'oauth' => array(),           //OAuth
    // 'sso' => false,               //Single Sign-On
    // 'debug' => true,              //Debug
    // 'hash' => 'String of secret'  //COOKIE, password, token ...
  ),
  //Database Conection
  'storage' => array(
    'engine' => 'pdo',  //lowercase
    // 'dsn' => 'sqlsrv:Server=localhost;Database=AHHKLED',
    'dsn' => 'sqlsrv:Server=localhost;Database=hkledoa',
    'user' => 'sa',
    'password' => 'google',
    'options' => array()
  ),
  //Farmework Infomation (Just for funny!)
  'framework' => array(
    'name' => 'LeoPHP',
    'version' => '0.1.3',
    'author' => 'Yueming Fang',
    'git' => 'https://github.com/axolo/leophp'
  )
);
