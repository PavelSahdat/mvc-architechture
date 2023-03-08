<?php
require_once __DIR__ . '/Storage.php';
require_once __DIR__ . '/StorageFactory.php';

class Model implements Storage
{
    static $storageEngine = null;
    static function initialize()
    {
        $className = get_called_class();
        $reflector = new ReflectionClass($className);
        $tableName = $reflector->getStaticProperties()['tableName'];
        static::$storageEngine = StorageFactory::create($tableName);
    }

    public static function create($data = array())
    {
        static::initialize();
        return static::$storageEngine::create($data);
    }

    public static function  fetchAll()
    {
        static::initialize();
        return static::$storageEngine::fetchAll();
    }

    public static function findById($id)
    {
        static::initialize();
        return static::$storageEngine::findById($id);
    }

    public static function remove($id)
    {
        static::initialize();
        return static::$storageEngine::remove($id);
    }
}
