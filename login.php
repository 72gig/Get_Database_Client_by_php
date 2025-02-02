<?php
/**
 * for login function
 * if login successful
 * save to session
 * and select by other php
**/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type:text/html; charset=utf-8");
ini_set('session.save_path', __DIR__ . '/session');  // 沒有先設定會出現問題 像是找不到保存皂位置
session_start();

$data = json_decode(file_get_contents("php://input"), true);

$host = (string) $data['dataBaseIp'];
$dbname = (string) $data['databaseName'];
$user = (string) $data['userName'];
$password = (string) $data['userPassword'];

// 在編碼好像有問題 需要確保是字串
$connString = "pgsql:host=" . trim($host) . ";port=5432;dbname=" . trim($dbname) . ";user=" . trim($user) . ";password=" . trim($password);

$_SESSION['dbConn'] = $connString;
$session_id = session_id();

echo json_encode(["連線準備" => "完成", "Data" => $_SESSION['dbConn'], "sessionID" => $session_id]);


?>
