<?php
namespace leophp;
defined('LEOPHP') || define('LEOPHP', '..' . DIRECTORY_SEPARATOR .'framework' . DIRECTORY_SEPARATOR);

require_once(LEOPHP . 'App.php');
$config = __DIR__ . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR . 'config.php';

App::run($config);