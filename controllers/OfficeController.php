<?php

require_once __DIR__.'/Controller.php';
require_once __DIR__.'/../models/Office.php';

class SchoolController extends Controller{

    public function showOfficeForm($request){
        $this->viewEngine->
        setView("office/office-form")
        ->render();
    }
    public function createOffice($request){
        $name = $request["name"];
        $address = $request["address"];
        $groupName = $request["groupName"];
        $id = $request["id"];
        $holdingNumber = $request["holdingNumber"];
        
        School::create(array(
            "name"=> $name,
            "address"=> $address,
            "groupName"=>$groupName,
            "id"=> $id,
            "holdingNumber"=>$holdingNumber,
        ));
        $this->redirect("/office");
    }

    public function getOffice(){
        
        $offices = Office::fetchAll();
        foreach($offices as $office){
            echo $office['name']."<br>";
        }

    }



}









?>