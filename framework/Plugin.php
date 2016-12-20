<?php
namespace leophp;

/**
 * @todo  user plugins maybe a class extends Plugin
 * @todo  parse plugin params
 */
class Plugin {
  public static function parse($plugins, $dir = null) {
    foreach($plugins as $file => $param) {
      $plugin_file = $dir . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . $file . ".php";
      if($param && file_exists($plugin_file)) {
        require_once($plugin_file);
      }
    }
    return;
  }
}
