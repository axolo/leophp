<?php
namespace leophp;
defined('LEOPHP') || define('LEOPHP', '..' . DIRECTORY_SEPARATOR .'framework' . DIRECTORY_SEPARATOR);

// using composer require
require '../vendor/autoload.php';
use leophp\App as App;

// using classic require
// require_once(LEOPHP . 'App.php');

$config = __DIR__ . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR . 'config.php';

App::run($config);