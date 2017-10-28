<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 02:37
 */

namespace App\Models;


class Category{
  private $name;
  private $color;

  public function __construct($name, $color){
    $this->name = $name;
    $this->color = $color;
  }

  public function getName(){
    return $this->name;
  }

  public function getColor(){
    return $this->color;
  }
}