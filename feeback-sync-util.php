<?php 
require_once("./config.php");
header("Content-type: application/json");

class FeedbackUtil{
    function getUserByEmail($email){
        global $DB;
        echo($email);
        return $DB->get_record("user", ["email" => $email]);
    }
    function insertFeebackCompletion($feedback){
        global $DB;
        return $DB->insert_record("feedback_completed", array(
            "courseid" => $feedback->courseid,
            "userid" =>  $feedback->userid,
            "feedback" =>  $feedback->feedback,
            "anonymous_response" =>  $feedback->anonymous_response,
            "random_response" =>  $feedback->random_response

        ));
    }
    function insertFeedbackValue($value){
        global $DB;
        $DB->insert_record("feedback_value", array(
                "course_id" => $value->course_id,
                "item" =>  $value->item,
                "completed" =>  $value->completed,
                "tmp_completed" =>  $value->tmp_completed,
                "value" =>  $value->value
            )
        );
    }
    function getFeedbackItemByPosition($feedback, $position){
        global $DB;
        return $DB->get_record("feedback_item", array(
            "feedback" => $feedback,
            "position" => $position
        ));

    }
}

$userUtil = new FeedbackUtil();
$position = $userUtil->getFeedbackItemByPosition(3, 2);

echo(json_encode($position));