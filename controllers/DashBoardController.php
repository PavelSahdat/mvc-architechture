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

        $totalItems = array($user,$school,$office);

        $userCount = count($user);
        $schoolCount = count($school);
        $officeCount = count($office);
        $totalAge = 0;
        $totalCount = $userCount+$schoolCount+$officeCount;

        foreach($totalItems as $itemsKey => $itemsValue){
            foreach($itemsValue as $ageKey => $ageValue){
                $totalAge += $ageValue["age"];
            }
        }
        $sum = $totalAge / $totalCount;


        $this-> viewEngine
        -> setView('count')
        ->setData(array(
            "userCount"=> $userCount,
            "schoolCount"=>$schoolCount,
            "officeCount"=>$officeCount,
            "totalAge" => $totalAge,
            "totalCount"=> $totalCount,
            "totalAvarage"=> $sum
        ))
        ->render(); 
    }
}


?>