<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/School.php';

class SchoolController extends Controller
{
    function getSchool($request)
    {
        $id = $request['id'];
        $school = School::findById(+$id);
        $schoolName =  $school['name'];
        $this->viewEngine
            ->setView('school')
            ->setData(array(
                'id' => $id,
                'name' => $schoolName,
            ))
            ->render();
    }
    function getCountOffice()
    {
        $school = School::fetchAll(); // fetchAll() function use array count
        $count = count($school);   
        echo "school Count is ".$count."\n";
    }
}
