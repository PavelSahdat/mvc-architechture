<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Office.php';

class DashBoardController extends Controller{
    function getCountAll()
    {
        // fetchAll() function use array count
        $user = User :: fetchAll();
        $school = School::fetchAll();
        $office = Office::fetchAll();
        
        $count = count($user);
        echo "User Count is ".$count."\n";
    }
}




?>