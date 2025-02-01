<?php
/**
 * use to session
 * and select by other php
 **/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type:text/html; charset=utf-8");
session_start();

$dbConnString = $_SESSION['dbConn'];
// 開始連線
$conn = new PDO($dbConnString);
sleep(1);

try {
    $select = "select * from mqtt_table where record_time >= @d::date";
    // 執行查詢
    $run = $dbConn->query($select);
    // 取出結果
    $row = $run->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;
    echo json_encode(["連線結果" => "成功", "Data" => $row]);

} catch (PDOException $e){
    echo json_encode(["連線結果" => "失敗", "Data" => $e]);
}


?>
