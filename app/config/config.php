<?php
/**
 * LeoPHP Framework config file
 * @todo  array_merge(default_config, user_config)
 */
return array(
  'core' => array(
    //pathinfo:     /index.php/controller/action
    //querystring:  /index.php?controller=string&action=string (@todo)
    //urlrewrite:   /controller/action (@todo may be just a .htaccess)
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
    'restful' => false,           //RESTful
    'oauth' => array(),           //OAuth
    'sso' => false,               //Single Sign-On
    'debug' => true,              //Debug
    'halt' => 'out of service',   //Service halt
    'hash' => 'String of secret'  //COOKIE, password, token ...
  ),
  //Database Conection
  'storage' => array(
    'engine' => 'pdo',
    'dsn' => 'mysql:host=localhost;dbname=information_schema',
    'user' => 'root',
    'password' => 'google',     //Eh~~~
    'options' => array()
  ),
  //Farmework Infomation (Just for funny!)
  'framework' => array(
    'name' => 'LeoPHP',
    'version' => '0.1.4',
    'author' => 'Yueming Fang',
    'git' => 'https://github.com/axolo/leophp'
  )
);