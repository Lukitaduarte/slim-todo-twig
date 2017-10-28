<?php

namespace App\Dao;

// connection configs
define('DB_HOST', 'localhost');
define('DB_NAME', 'todo');
define('DB_USER', 'root');
define('DB_PASS', '');

class Database{
  private static $instance;

  public static function getInstance(){
    if (!isset(self::$instance)) {
      try {
        self::$instance = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
      } catch (Exception $ex) {
        echo $ex->getMessage();
      }
    }

    return self::$instance;
  }

  public static function prepare($sql){
    return self::getInstance()->prepare($sql);
  }
}
