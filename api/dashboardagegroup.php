<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

define('PROJECT_ROOT_PATH','');
include_once PROJECT_ROOT_PATH .'../private/database.php';
include_once PROJECT_ROOT_PATH .'../class/covid19profile.php';
include_once PROJECT_ROOT_PATH .'../private/config.php';

$database = new Database();
$db = $database->getConnection();

$items = new Covid19Profile($db);

$result = $items->getcovidcasebyagegroup();
if ($result->num_rows > 0) {
    $json = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $row = array_map('utf8_encode', $row);
        $json[] = $row;

    }
    header('Content-type: application/json');
    echo json_encode($json);
  

} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
