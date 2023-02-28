<?php
    require_once "./framework/Application.php";

    $router = Application::getInstance()->make('router');
    $router->add('/users', 'GET', array(
        'callback' => function ($request){
            echo "User is Bodiuls";
        }
    ));

    $router->add('/admin', 'GET', array(
        'callback' => function ($request) {
            if (isset($request['password'])) {
                if ($request['password'] === "pavel123") {
                    echo "This is private data <br />";
                    echo "User is Pavel";
                }
            } else {
                throw new  Error("You are not allowed to see this route!");
             }
        }
    ));

    $router-> add('/officeAdmin','GET',array(
        'callback'=> function($request){
            if(isset($request['role'])){
                if($request['role']==="Manager"){
                    echo "Hamidur Rahman";
                }
                if($request['role']==="Engineer"){
                    echo "Pavel Ahmed";
                }
            }
          
        }
    ));


    $router->add('/user/profile', 'GET', array(
        'controller' => 'UserController@getUser'
    ));

    $router->add('/school/profile', 'GET', array(
        'controller' => 'SchoolController@getSchool'
    ));
    // ofiice Controller

    $router->add('/office/profile','GET',array(
        'controller'=> 'OfficeController@getOffice'
    ));
    
    //
    $router->add('/office/count','GET',array(
        'controller'=> 'officeCountController@getOffice'
    )); 
    