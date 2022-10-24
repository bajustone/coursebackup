<?php
require_once("./config.php");

class delete_all_courses{
    function __construct()
    {
        global $DB;
        $this->courses = $DB->get_records("course");
        $this->delete_courses();
        header("Content-Type: application/json");
    }
    function delete_courses(){
        $res = new stdClass;
        $res->success = true;
        foreach ($this->courses as $course) {
            if($course->id != 1) {
                delete_course($course->id, false);
            }
        }
        echo(json_encode($res));
    }
    
  

    
}
new delete_all_courses();