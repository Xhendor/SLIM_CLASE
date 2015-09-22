<?php
/**
 * Created by PhpStorm.
 * User: xhendor
 * Date: 8/25/15
 * Time: 13:17
 */

class DbConn {

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_NAME = 'my_pagina';

    static private $instance = NULL;
    private $_db;

    static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new DbConn();
            if (mysqli_connect_errno()) {
                throw new Exception("Database connection failed: " . mysqli_connect_error());
            }
        }
        return self::$instance;
    }

    private function __construct() {
        $this->_db = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME) or die('Couldnt connect');
        mysqli_set_charset($this->_db, 'utf8');
    }

    public function query($sql) {

        return $this->_db->query($sql);
    }
    public function getDBConn(){

        return $this->_db;
    }

    private function __clone() {

    }

}



?>