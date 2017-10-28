<?php

namespace App\Dao;

//extend connection class and define common methods of crud
abstract class Mockup extends Database{
  protected $table; // table name

  // list record by id
  public function find($id){
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $execute = Database::prepare($sql);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    $execute->execute();
    return $execute->fetch();
  }

  //list all records
  public function findAll(){
    $sql = "SELECT * FROM $this->table";
    $execute = Database::prepare($sql);
    $execute->execute();
    return $execute->fetchAll();
  }

  // delete an existing record
  public function delete($id){
    $sql = "DELETE FROM $this->table WHERE id = :id";
    $execute = Database::prepare($sql);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    return $execute->execute();
  }

}
