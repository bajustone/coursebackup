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

$courseId = $requestBody->courseId;
$users = $requestBody->users;
$feedbackCompletions = $requestBody->feedbackCompletions;
$feedbackItems = (array)$requestBody->feedbackItems;
$feedbackValues = $requestBody->feedbackValues;
$feedbackUtil = new FeedbackUtil();

// foreach ($users as $feebackCompletionId => $user) {
//     # code...
//     $remoteUser = $feebackUtil->getUserByEmail($user->email);
//     echo(json_encode($remoteUser));
// }
foreach ($feedbackCompletions as $feebackCompletionId => $feedbackCompletion) {
    # code...
    // echo($feedbackCompletion->feedback_name);
    $capFeedbackId = $feedbackCompletion->feedback;

    $feedback = $feedbackUtil->getFeedbackByCourse($courseId, $feedbackCompletion->feedback_name);
    $capUser = $users->$feebackCompletionId;
    $user = $feedbackUtil->getUserByEmail($capUser->email);
    $saveFeedbackCompletion = null;

    // $insertFeebackCompletion = $feedbackUtil->insertFeebackCompletion(array(
    //     "courseid" => $courseId,
    //     "userid" =>  $user->id,
    //     "feedback" =>  $feedback->id,
    //     "anonymous_response" =>  $feedbackCompletion->anonymous_response,
    //     "random_response" =>  $feedbackCompletion->random_response,
    //     "timemodified" => $feedbackCompletion->timemodified
    // ));
    foreach ($feedbackValues as $key => $value) {
        # code...
        
        $items = (array)$feedbackItems[$capFeedbackId];
        $item =  $items[$value->item];
        $remoteItem = $feedbackUtil->getFeedbackItemByPosition(
            $feedback->id,
            $item->position
        );
        print_r($remoteItem);
    }
    
    // print_r($insertFeebackCompletion);
    // $a = $users->user;
    // $remoteUser = $feebackUtil->getUserByEmail($user->email);
    // echo(json_encode($feebackCompletionId));
    // echo(json_encode($insertFeebackCompletion));

    // echo(json_encode($feedbackCompletion));
}


// echo(json_encode($users));