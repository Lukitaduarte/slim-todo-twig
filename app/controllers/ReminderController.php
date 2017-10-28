<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 12:37
 */

namespace App\Controllers;


use App\Dao\ReminderDAO;
use App\Models\Reminder;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ReminderController{
  protected $container;

  // constructor receives container instance
  public function __construct(ContainerInterface $container){
    $this->container = $container;
  }

  public function add(Request $request, Response $response){
    // create a new reminder object with post data
    $reminder = new Reminder($_POST['id_task'], $_POST['reminder_hour'], $_POST['reminder_text']);

    $reminderDao = new ReminderDAO(); // get instance of data access object layer
    if ($reminderDao->insert($reminder)) // inserts a new reminder
      return $response->withStatus(302)->withHeader("Location", "/task/" . $_POST['id_task'] . "/view"); // redirect to the task reminders list
  }
}