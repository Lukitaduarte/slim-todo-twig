<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 10:48
 */

namespace App\Models;

class Task{
  private $id_category;
  private $title;
  private $date;

  public function __construct($id_category, $title, $date){
    $this->id_category = $id_category;
    $this->title = $title;
    $this->date = $date;
  }

  public function getIdCategory(){
    return $this->id_category;
  }

  public function getTitle(){
    return $this->title;
  }

  public function getDate(){
    return $this->date;
  }


}