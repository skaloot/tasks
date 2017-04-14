<?php
 

class MyDB {

    public $pdo;

    function __construct() {
        $this->pdo = new PDO("sqlite:" . "./db/tasks.db");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }
}