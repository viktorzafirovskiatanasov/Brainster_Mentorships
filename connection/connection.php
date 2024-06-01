<?php
namespace Database;

class Connection
{
    const HOST = 'localhost';
    const DBNAME = 'supermarket';
    const USERNAME = 'root';
    const PASSWORD = '';

    protected $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::USERNAME, self::PASSWORD);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function destroy()
    {
        $this->connection = null;
    }
}
