<?php
/**
 * use to session
 * and select by other php
 **/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type:text/html; charset=utf-8");
$input = json_decode(file_get_contents("php://input"), true);
if ($input === null) {
    echo json_encode(["error" => "沒有資料"]);
    exit();
}
ini_set('session.save_path', __DIR__ . '/session');

session_id($input['sessionID']);

session_start();  // 重開

$dbConnString = $_SESSION['dbConn'];
// 開始連線

try {
    $conn = new PDO($dbConnString);
    sleep(1);
    $select = "select * from mqtt_table where record_time >= @d::date";
    // 執行查詢
    $run = $Conn->query($select);
    // 取出結果
    $row = $run->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;
    echo json_encode(["連線結果" => "成功", "Data" => $row]);

} catch (PDOException $e){
    echo json_encode(["連線結果" => "失敗", "Data" => $e]);
}


?>
