<?php
namespace leophp;

// require '../../../../vendor/autoload.php';
require '../vendor/autoload.php';

App::run(join(DIRECTORY_SEPARATOR, array(__DIR__, 'config', 'config.php')));
