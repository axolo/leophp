<?php
namespace leophp;
require_once('./framework/App.php');
header('Content-Type:text/json');

// $app = new App();
// $res = $app->getConfig();
// echo json_encode($res);

echo json_encode(App::run());

