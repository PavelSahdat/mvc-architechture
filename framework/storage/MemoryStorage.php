<?php

require_once __DIR__ . '/Store.php';

$memoryStorage = [
    "users" =>  [
        ["name" => "Mr. Kamal Alu", "age" =>  43, "id" => 1],
        ["name" => "Mr. Pavel Shahadat", "age" => 23, "id" => 2]
    ],
    "school" => [
        ["name" => "Fouzderhat School", "age" => 20, "id" => 1],
        ["name" => "B M School", "age" => 53, "id" => 2]
    ]
];

class MemoryStorage extends Store implements Storage
{
    public static function create($data = array())
    {
        global $memoryStorage;
        $memoryStorage[static::$tableName][] = $data;
    }

    //save method
    public static function update($id, $data = array())
    {
        global $memoryStorage;
        foreach ($memoryStorage[static::$tableName] as $key => $item) {
            if ($item['id'] == $id) {
                $memoryStorage[static::$tableName][$key] = $data;
            }
        }
    }


    public static function fetchAll()
    {
        global $memoryStorage;
        return $memoryStorage[static::$tableName];
    }

    public static function findById($id)
    {
        global $memoryStorage;
        foreach ($memoryStorage[static::$tableName] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
    }

    public static function remove($id)
    {
        global $memoryStorage;
        foreach ($memoryStorage[static::$tableName] as $key => $item) {
            if ($item['id'] == $id) {
                unset($memoryStorage[static::$tableName][$key]);
            }
        }
    }
}
