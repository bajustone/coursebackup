<?php
require_once("./config.php");
require_once("./feeback-sync-util.php");
header("Content-type: application/json");

$method = $_SERVER["REQUEST_METHOD"];
if($method !== "POST"){
    $response->message = "invalid request method";
    echo(json_encode($response));
    die();
}
$bodyText = file_get_contents('php://input');
$requestBody = json_decode($bodyText);

$response = new stdClass;


$users = $requestBody->users;
$feebackUtil = new FeedbackUtil();

foreach ($users as $feebackCompletionId => $user) {
    # code...
    $remoteUser = $feebackUtil->getUserByEmail($user->email);
    echo(json_encode($remoteUser));
}


// echo(json_encode($users));