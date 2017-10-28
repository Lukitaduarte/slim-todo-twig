<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 12:35
 */

namespace App\Dao;


use App\Models\Reminder;

class ReminderDAO extends Mockup{
  protected $table = "reminder";

  // get all reminders of certain task
  public function find($id){
    $sql = "SELECT r.reminder_hour, r.reminder_text 
            FROM $this->table r 
            INNER JOIN task t 
            ON r.id_task = t.id 
            WHERE t.id = :id 
            ORDER BY r.id DESC";
    $execute = Database::prepare($sql);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    $execute->execute();
    return $execute->fetchAll();
  }

  // inserts a new reminder
  public function insert(Reminder $reminder){
    $sql = "INSERT INTO $this->table 
            (id_task, reminder_hour, reminder_text)
            VALUES 
            (:id_task, :reminder_hour, :reminder_text)";
    $execute = Database::prepare($sql);
    $execute->bindValue(':id_task', $reminder->getIdTask(), \PDO::PARAM_INT);
    $execute->bindValue(':reminder_hour', $reminder->getReminderHour());
    $execute->bindValue(':reminder_text', $reminder->getReminderText());

    return $execute->execute();
  }

  // delete all reminders of certain task
  public function deleteReminderByTask($id){
    $sql = "DELETE FROM $this->table 
            WHERE id_task = :id";
    $execute = Database::prepare($sql);
    $execute->bindParam(':id', $id, \PDO::PARAM_INT);
    return $execute->execute();
  }
}