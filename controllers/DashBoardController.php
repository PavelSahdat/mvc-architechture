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
        // $ageCount = array($user,$school,$office);
        for($i = 0; $i < $userCount ; $i++ ){
            for($j = 0; $j <= $i;$j++){
                if($user[$i][$j]=="id"){

                }
            }
        }

        $userCount = count($user);
        $schoolCount = count($school);
        $officeCount = count($office);

        $this-> viewEngine
        -> setView('count')
        ->setData(array(
            "userCount"=> $userCount,
            "schoolCount"=>$schoolCount,
            "officeCount"=>$officeCount
        ))
        ->render(); 
    }
}


?>