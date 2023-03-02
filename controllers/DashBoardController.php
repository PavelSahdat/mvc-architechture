<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Office.php';

class DashBoardController extends Controller{
    function getCountAll()
    {
        // fetchAll() function use array count
        // $user = user::fetchAll();
        // $school = School::fetchAll();
        $school = School::fetchAll();
        
        $count = count($school);
        echo "User Count is ".$count."\n";
    }
}




?>