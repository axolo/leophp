<?php
namespace leophp;
class Error {

  public static function json($res) {
    header('Content-Type:text/json');
    echo json_encode($res);
  }

}