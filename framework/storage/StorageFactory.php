<?php
require_once __DIR__ . '/MemoryStorage.php';
require_once __DIR__ . '/JsonStorage.php';

class StorageFactory
{
    public static function create($tableName, $storage = null)
    {
        if ($tableName == null) {
            throw new Exception("Table name is required");
        }

        switch ($storage) {
            case "json":
                return new JsonStorage($tableName);
            default:
                return new MemoryStorage($tableName);
        }
    }
}
