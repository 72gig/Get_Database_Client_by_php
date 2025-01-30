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
session_start();

$data = json_decode(file_get_contents("php://input"), true);

$host = $data['dataBaseIp'];
$dbname = $data['databaseName'];
$user = $data['userName'];
$password = $data['userPassword'];

// 在編碼好像有問題 需要確保是字串

$conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
sleep(3);

if (!$conn) {
    echo json_encode(["連線結果" => "失敗", "原因" => pg_last_error()]);
    exit();
}

$_SESSINO['dbConn'] = $conn;
echo json_encode(["連線結果" => "成功", "Data" => $user]);

?>
