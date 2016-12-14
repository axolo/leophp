<?php
require '../vendor/autoload.php';

use leophp\App        as App;
use leophp\Controller as Controller;
use leophp\Model      as Model;
use leophp\Storage    as Storage;

$config = __DIR__ . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR . 'config.php';

App::run($config);