<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    define('PROJECT_ROOT_PATH','');
    include_once PROJECT_ROOT_PATH .'../private/database.php';
    include_once PROJECT_ROOT_PATH .'../class/covid19profile.php';
    include_once PROJECT_ROOT_PATH .'../private/config.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Covid19Profile($db);
    
    $item->id = $_POST['id']; 
    
    if($item->deletecovid19profile()){
        http_response_code(200);
        echo json_encode("Record deleted.");
    } else{
        http_response_code(500);
        echo json_encode("Record could not be deleted");
    }
?>