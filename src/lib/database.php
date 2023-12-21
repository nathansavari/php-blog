<?php

namespace Application\Lib;

use PDO;

class DatabaseConnection
{
    public ?PDO $database = null;

    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO();
        }

        return $this->database;
    }
}
