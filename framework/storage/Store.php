<?php

abstract class Store implements Storage
{
    protected static $storage = null;
    protected static $contents = array();
    protected static $uniqueId = 1;
    protected static $tableName = null;

    function __construct($tableName)
    {
        static::$tableName = $tableName;
    }
}
