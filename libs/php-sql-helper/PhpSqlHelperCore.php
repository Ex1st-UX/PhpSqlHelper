<?php

namespace PhpSqlHelper;

class PhpSqlHelperCore
{
    public $db;
    protected static $object;

    function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception('Cannot wakeup a singleton');
    }

    public static function getInstance()
    {
        if (empty(self::$object)) {
            self::$object = new self;
        }

        return self::$object;
    }

    public function addConnection(array $connParams): void
    {
        $this->db = new \mysqli(
            $connParams['host'],
            $connParams['user'],
            $connParams['password'],
            $connParams['database']
        );
    }

    public function isExistPost($table, $field, $value)
    {
        $query = "SELECT * FROM " . $table . " WHERE " . $field . "='$value'";
        $result = $this->db->query($query);

        if ($result->num_rows >= 1) {
            return $result->num_rows;
        }
        else {
            return false;
        }
    }
}