<?php
require_once('./framework/App.php');
header('Content-Type:text/json');
echo json_encode(App::run());