<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/School.php';
require_once __DIR__ . '/../models/Office.php';


class DashBoardController extends Controller{
    function getCountAll()
    {
        // fetchAll() function use array count
        $user = user::fetchAll();
        $school = School::fetchAll();
        $office = Office::fetchAll();

        $userCount = count($user);
        $schoolCount = count($school);
        $officeCount = count($office);
        // $totalCount = array($userCount,$schoolCount,$officeCount);
        
        // foreach($totalCount as $count){
        //     echo "Count = ".$count."\n\n";
        // }
        echo " Total User : ".$userCount ."<br>"."Total School: ". $schoolCount
        ."<br>"."Total Office :". $officeCount;
    }
}




?>