<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 10:48
 */

namespace App\Dao;


use App\Models\Task;

class TaskDAO extends Mockup{
  protected $table = "task";

  // get all uncompleted tasks
  public function findTaskUncompleted(){
    $sql = "SELECT t.id, t.id_category, t.task_title, t.task_date, t.status, c.color 
            FROM $this->table t 
            INNER JOIN category c 
            ON t.id_category = c.id 
            WHERE t.status = 0 
            ORDER BY t.id DESC";
    $execute = Database::prepare($sql);
    $execute->execute();
    return $execute->fetchAll();
  }

  // get all completed tasks
  public function findTaskCompleted(){
    $sql = "SELECT t.id, t.id_category, t.task_title, t.task_date, t.status, c.color 
            FROM $this->table t 
            INNER JOIN category c 
            ON t.id_category = c.id 
            WHERE t.status = 1 
            ORDER BY t.id DESC";
    $execute = Database::prepare($sql);
    $execute->execute();
    return $execute->fetchAll();
  }

  // inserts a new task
  public function insert(Task $task)
  {
    $sql = "INSERT INTO $this->table 
            (id_category, task_title, task_date, status)
            VALUES 
            (:id_category, :task_title, :task_date, :status)";
    $execute = Database::prepare($sql);
    $execute->bindValue(':id_category', $task->getIdCategory(), \PDO::PARAM_INT);
    $execute->bindValue(':task_title', $task->getTitle());
    $execute->bindValue(':task_date', $task->getDate());
    $execute->bindValue(':status', 0);

    return $execute->execute();
  }

  // task update for complete
  public function completed($id){
    $sql = "UPDATE $this->table 
            SET status = :status
            WHERE id = :id";
    $execute = Database::prepare($sql);
    $execute->bindValue(':status', 1);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    return $execute->execute();
  }

  // delete an existing task
  public function delete($id){
    $reminder = new ReminderDAO();
    $reminder->deleteReminderByTask($id);

    return parent::delete($id);
  }

}