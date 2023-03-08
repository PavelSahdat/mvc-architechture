<?php

require_once __DIR__ . '/Store.php';

class JsonStorage extends Store implements Storage
{
    protected static $storagePath = 'data-store.json';

    public static function create($data = array())
    {
        return static::save(static::$tableName, $data);
    }

    public static function save($data = array())
    {
        if (!isset(static::$contents[static::$tableName])) {
            static::$contents[static::$tableName] = array();
        }

        $db = static::fetchDB();
        $all = static::fetchAll();
        $totalItems = count($all);
        $lastItem = end($all);
        $currentId = $totalItems > 0 ? $lastItem['id'] + 1 : static::$uniqueId;

        $db[static::$tableName][$currentId] = array();

        foreach ($data as $key => $value) {
            $db[static::$tableName][$currentId][$key] = $value;
        }

        $db[static::$tableName][$currentId]['id'] = $currentId;
        file_put_contents(static::$storagePath, json_encode($db));

        return self::fetch(static::$tableName, $currentId);
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
