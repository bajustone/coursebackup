<?php
require_once("./config.php");
header("Content-type: application/json");

$method = $_SERVER["REQUEST_METHOD"];
if($method !== "POST"){
    $response->message = "invalid request method";
    echo(json_encode($response));
    die();
}
$bodyText = file_get_contents('php://input');
$requestBody = json_decode($json);

$response = new stdClass;
$response->method = $method;


echo(json_encode($requestBody));