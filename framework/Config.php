<?php
namespace leophp;

class Config {
  private static $__config;

  public static parse($config) {
    self::$__config = require_once($config);
  }

  public static get() {

  }
}