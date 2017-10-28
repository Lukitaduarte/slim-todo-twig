<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 20/08/2017
 * Time: 10:43
 */

namespace App\Controllers;

use App\Dao\CategoryDAO;
use App\Dao\ReminderDAO;
use App\Dao\TaskDAO;
use App\Models\Task;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TaskController{
    protected $container;

  // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function home(Request $request, Response $response) {
        $taskDao = new TaskDAO(); // get instance of task data access object layer
        $categoryDao = new CategoryDAO(); // get instance of category data access object layer
        $data['uncompleted_task'] = $taskDao->findTaskUncompleted(); // get all uncompleted tasks
        $data['completed_task'] = $taskDao->findTaskCompleted(); // get all completed tasks
        $data['categories'] = $categoryDao->findAll(); // get all categories
        return $this->container->view->render($response, 'index.html.twig', $data); //render view passing a data array
    }

    public function add(Request $request, Response $response){
        // create a new category object with post data
        $task = new Task($_POST['id_category'], $_POST['task_title'], $_POST['task_date']);
        $taskDao = new TaskDAO(); // get instance of task data access object layer

        if($taskDao->insert($task)) // inserts a new task
            return $response->withStatus(302)->withHeader("Location", "/"); // redirect to the home view
    }

    public function view(Request $request, Response $response, $args){
        $taskDao = new TaskDAO(); // get instance of task data access object layer
        $reminderDao = new ReminderDAO(); // get instance of reminder data access object layer
        $data['task'] = $taskDao->find($args['id']);
        $data['reminder'] = $reminderDao->find($args['id']);

        return $this->container->view->render($response, 'task.html.twig', $data);
    }

    public function completed(Request $request, Response $response, $args){
        $taskDao = new TaskDAO(); // get instance of task data access object layer

        if($taskDao->completed($args['id'])) // complete an existing task
            return $response->withStatus(302)->withHeader("Location", "/"); // redirect to the home view
    }

    public function delete(Request $request, Response $response, $args){
        $taskDao = new TaskDAO(); // get instance of task data access object layer

        if($taskDao->delete($args['id'])) // delete an existing task
            return $response->withStatus(302)->withHeader("Location", "/"); // redirect to the home view
    }
}