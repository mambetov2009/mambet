<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"), true);
    
if (isset($data["latitude"]) && isset($data["longitude"])) {
    $userId = $data["userId"];
    $latitude = $data["latitude"];
    $longitude = $data["longitude"];

    $timestamp = date("Y-m-d H:i:s");

    $stroka = "user_id: $userId  time:  $timestamp - Latitude: $latitude, Longitude: $longitude\n";
    
    file_put_contents("location.txt", $stroka, FILE_APPEND | LOCK_EX);
} 