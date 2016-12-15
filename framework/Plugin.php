<?php
namespace leophp;

/**
 * @todo user plugins maybe a class extends Plugin 
 */
class Plugin {
  public static function parse($plugins, $dir = null) {
    foreach($plugins as $file => $pram) {
      require_once($dir . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . $file . ".php");
    }
    return;
  }
}
