<?php

require_once __DIR__ . '/Store.php';

class JsonStorage extends Store implements Storage
{
    protected static $storagePath = 'data-store.json';

    public static function create($data = array())
    {
        // Write code to save data in json file
        $db = static::fetchDB();
        $tableName = static::$tableName;
        $data['id'] = static::$uniqueId++;
        $db[$tableName][] = $data;
        file_put_contents(static::$storagePath, json_encode($db));
        return $data;
    }

    public static function update($id, $data = array())
    {
        // Write code to update data in json file given id  
        // $db = static::fetchDB();
        // $tableName = static::$tableName;
        // $data = static::fetchAll($tableName);
        // for 
    }

    private static function fetchDB()
    {
        return json_decode(file_get_contents(static::$storagePath), true);
    }

    public static function fetchAll($tableName = null)
    {
        $key = $tableName ?? static::$tableName;
        $data = static::fetchDB();
        if (!isset($data[$key])) {
            throw new Error("Table $tableName does not exist");
        }
        return $data[$key];
    }

    public static function findById($id)
    {
        return static::fetch($id);
    }

    public static function remove($id)
    {
        $db = static::fetchDB();
        $tableName = static::$tableName;
        $data = static::fetchAll($tableName);

        foreach ($data as $key => $item) {
            if ($item['id'] == $id) {
                unset($db[$tableName][$key]);
            }
        }

        file_put_contents(static::$storagePath, json_encode($db));
    }

    /**
     * @param $tableName
     * @param int $id
     * @throws Exception
     */
    private static function fetch($id = 1)
    {
        $retrievedData = self::fetchAll(static::$tableName);

        foreach ($retrievedData as $data) {
            if (isset($data['id']) && $data['id'] === $id) {
                return $data;
            }
        }

        return null;
    }
}
