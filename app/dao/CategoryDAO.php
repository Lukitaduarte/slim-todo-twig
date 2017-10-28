<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 02:35
 */

namespace App\Dao;

use App\Models\Category;

class CategoryDAO extends Mockup{
  protected $table = "category";

  //override method, get all active categories
  public function findAll(){
    $sql = "SELECT * FROM $this->table 
            WHERE status = 1";
    $execute = Database::prepare($sql);
    $execute->execute();
    return $execute->fetchAll();
  }

  //inset a new category method
  public function insert(Category $category){
    $sql = "INSERT INTO $this->table 
            (category_name, color, status)
            VALUES 
            (:category_name, :color, :status)";
    $execute = Database::prepare($sql);
    $execute->bindValue(':category_name', $category->getName());
    $execute->bindValue(':color', $category->getColor());
    $execute->bindValue(':status', 1);

    return $execute->execute();
  }

  //update an existing category method
  public function update($id, Category $category){
    $sql = "UPDATE $this->table 
            SET category_name = :category_name, color = :color
            WHERE id = :id";
    $execute = Database::prepare($sql);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    $execute->bindValue(':category_name', $category->getName());
    $execute->bindValue(':color', $category->getColor());

    return $execute->execute();
  }

  //override method, desactive an exiting category
  public function delete($id){
    $sql = "UPDATE $this->table 
            SET status = :status
            WHERE id = :id";
    $execute = Database::prepare($sql);
    $execute->bindValue(':status', 0);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    return $execute->execute();
  }
}