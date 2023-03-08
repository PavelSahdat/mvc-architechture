<?php
interface Storage
{
    static function create();
    static function fetchAll();
    static function findById($id);
    static function remove($id);
}
