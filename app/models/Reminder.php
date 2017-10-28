<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 12:33
 */

namespace App\Models;


class Reminder{
  private $id_task;
  private $reminder_hour;
  private $reminder_text;

  public function __construct($id_task, $reminder_hour, $reminder_text){
    $this->id_task = $id_task;
    $this->reminder_hour = $reminder_hour;
    $this->reminder_text = $reminder_text;
  }

  public function getIdTask(){
    return $this->id_task;
  }

  public function getReminderHour(){
    return $this->reminder_hour;
  }

  public function getReminderText(){
    return $this->reminder_text;
  }
}