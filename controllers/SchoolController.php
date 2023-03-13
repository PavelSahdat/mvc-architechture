<?php

require_once __DIR__.'/Controller.php';
require_once __DIR__.'/../models/School.php';

class SchoolController extends Controller
{
    public function showSchoolForm($request){
        $this-> viewEngine
        ->setView('school/school-form')
        ->render();
    }

    public function createSchool($request){
        $name = $request['name'];
        $email = $request['email'];
        $address= $request['address'];
        
        School::create(array(
            'name'=> $name,
            'email'=> $email,
            'address'=> $address,
        ));
        $this-> redirect("/schools");

    }
    public function getSchools(){
        $schools = School::fetchAll();
        foreach($schools as $school){
            echo $school['name']."<br>";
        }

    }
}






?>