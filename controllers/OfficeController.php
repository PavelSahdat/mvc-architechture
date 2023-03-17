<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Office.php';

class OfficeController extends Controller
{

    public function showOfficeForm($request)
    {
        $this->viewEngine->setView("office/office-form")
            ->render();
    }
    public function createOffice($request)
    {
        $name = $request["name"];
        $address = $request["address"];
        $groupName = $request["groupName"];
        $idNo = $request['idNo'];
        $holdingNumber = $request['holdingNumber'];

        Office::create(array(
            "name" => $name,
            "address" => $address,
            "groupName" => $groupName,
            "idNo" => $idNo,
            'holdingNumber' => $holdingNumber,
        ));
        $this->redirect("/offices");
    }

    public function getOffice()
    {

        $offices = Office::fetchAll();
        $this->viewEngine
            ->setView('office/office')->setData(
                array(
                    "offices" => $offices
                )
            )->render();
    }

    public function  getSingleOffice($request)
    {
        $id = $request['id'];
        $office = Office::findById(+$id);
        $this->viewEngine
            ->setView('office/single-office')->setData(
                array(
                    "office" => $office,
                )
            )->render();
    }
}
