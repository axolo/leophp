<?php
namespace leophp;

/**
 * @todo  Model::struct()     data struct
 * @todo  Model::validate()   data validate
 * @todo  Model::storage()    data storage
 * @todo  Model::crud()       mode CRUD
 */
class Model {

  protected $config;
  protected $db;

  function __construct() {
    $this->config = App::config()['storage'];
    $this->db = new Storage($this->config['dsn'], $this->config['user'], $this->config['password'], $this->config['options']);
  }

}
