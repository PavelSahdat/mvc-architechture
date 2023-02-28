<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Office.php';

class OfficeController extends Controller
{
    function getOffice($request)
    {
        $id = $request['id'];
        $office = Office::findById(+$id);
        $officeName =  $office['name'];
        $this->viewEngine
            ->setView('office')
            ->setData(array(
                'id' => $id,
                'name' => $officeName,
            ))
            ->render();
    }
    function getCountOffice()
    {
        $office = Office::fetchAll();
        $count = count($office);
        echo $count;
    }
}

$officeController = new OfficeController();
$officeController -> getCountOffice();