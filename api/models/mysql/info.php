<?php
namespace leophp;
use \PDO as PDO;

class Info extends Model {

  public function index($passport) {
    $sql = 'SELECT * FROM GLOBAL_STATUS';
    return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

}
