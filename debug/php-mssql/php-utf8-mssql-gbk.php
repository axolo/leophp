<?php
$dsn = "sqlsrv:Server=127.0.0.1;Database=debug";
$pdo = new PDO($dsn, 'sa', 'google');

$sql = "SELECT * FROM charset;";
// $sql = "
//   INSERT INTO charset(name, password, signup, score, disable) 
//   VALUES ('你管我是谁', '123456', '". date('Y-m-d H:i:s') ."', '98.9', '0');";
// $sql = "UPDATE charset SET name='php(utf8)操作mssql(gbk)' WHERE id=6;";

$exe = $pdo->query($sql);
$res = $exe->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type:text/json');
echo json_encode($res);