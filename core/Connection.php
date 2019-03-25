<?php

namespace Core;
use \PDO;
// use PDO;

class Connection{
    public static function make(){
        // new \PDO
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=databaseall', 'Captain', '4360');
        return $pdo;
    }
}
?>