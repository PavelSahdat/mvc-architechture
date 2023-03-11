<?php
interface Storage
{
    static function create();
    static function update($id, $data = array());
    static function fetchAll();
    static function findById($id);
    static function remove($id);
}
