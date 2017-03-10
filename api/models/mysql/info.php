<?php
namespace leophp;

class Info extends Model {

  public function index() {
    $sql = 'SELECT * FROM GLOBAL_STATUS';
    return $this->db->query($sql)->fetchAll(Model::FETCH_ASSOC);
  }

  // @todo
  public function get($like) {
    $like = $_REQUEST['like'];
    $sql = "SELECT * FROM GLOBAL_STATUS WHERE VARIABLE_NAME LIKE '". $like . "%'";
    return $this->db->query($sql)->fetchAll(Model::FETCH_ASSOC);
  }

}
