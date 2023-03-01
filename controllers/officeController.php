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
        // $officeAge = $office['age'];
        $officeGroup = $office['group'];
        $this->viewEngine
            ->setView('office')
            ->setData(array(
                'id' => $id,
                'name' => $officeName,
                // 'age' => $officeAge,
                'group'=> $officeGroup,
            ))
            ->render();
    }
  
}
