<?php
namespace leophp;

/**
 * Microsoft SQLServer
 * engine: sqlsrv
 * php ext: sqlsrv.dll
 * @todo  f**k the charset convert!
 */
class Storage {

  private static $__connect;
  private static $__stmt;

  public function __construct($config) {
    return self::$__connect = sqlsrv_connect($config['server'], $config['options']);
  }

  public function info() {
    return sqlsrv_server_info(self::$__connect);
  }

  public function query($sql, $params = array(), $options = array()) {
    return self::$__stmt = sqlsrv_query(self::$__connect, $sql, $params, $options);
  }

  public function fetchAll($fetchType =  SQLSRV_FETCH_ASSOC, $row = SQLSRV_SCROLL_RELATIVE) {
    $rows = array();
    while($row = sqlsrv_fetch_array(self::$__stmt, $fetchType)) {
      array_push($rows, $row);
    }
    return $rows;
  }

  public function __destruct() {
    return sqlsrv_close(self::$__connect);
  }

}