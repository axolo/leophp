<?php
namespace leophp;

class Utils {
  /**
   * Defender XSS attack
   */
  public static function xss($xss) {
    return htmlentities($xss);
  }

  /**
   * Defender SQL injection attack
   */
  public static function sql($sql) {
    return get_magic_quotes_gpc() ? addslashes($sql) : $sql;
  }
}