<?php
require_once("./config.php");
header("Content-type: application/json");

$response = new stdClass;
$response->message = "Hello there";


echo(json_encode($response));