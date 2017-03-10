<?php
/**
 * LeoPHP Framework config file
 * @todo  array_merge(default_config, user_config)
 */
return array(
  'core' => array(
    // e.g. $_COOKE['token'] == sha1($token_from_server.$config['core']['appkey'] )
    'appkey' => 'The Encrypt Key of App',
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
  // Attachment
  'attachment' => array(
    'path' => join(DIRECTORY_SEPARATOR, array(__DIR__, '..', '..', 'attachments')),
    'size' => '5M',
    'mime' => array(
      'image/png',
      'image/gif',
      'image/jpg',
      'image/jpeg'
    )
  ),
  //Database Conection
  'storage' => array(
    'dbms' => 'mysql',
    'extension' => 'pdo',
    'dsn' => 'mysql:host=localhost;dbname=information_schema',
    'user' => 'root',
    'password' => 'google',     //Eh~~~
    'options' => array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  ),
  //Farmework Infomation (Just for funny!)
  'framework' => array(
    'name' => 'LeoPHP',
    'version' => '0.3.0',
    'author' => 'Yueming Fang',
    'git' => 'https://github.com/axolo/leophp'
  )
);
