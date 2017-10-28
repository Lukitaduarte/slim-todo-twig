<?php
/**
 * Created by PhpStorm.
 * User: LUCAS
 * Date: 19/08/2017
 * Time: 23:00
 */

namespace App\Controllers;

use App\Dao\CategoryDAO;
use App\Models\Category;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CategoryController{
  protected $container;

  // constructor receives container instance
  public function __construct(ContainerInterface $container){
    $this->container = $container;
  }

  public function home(Request $request, Response $response){
    $categoryDao = new CategoryDAO(); // get instance of data access object layer
    $data['categories'] = $categoryDao->findAll(); // get all categories
    return $this->container->view->render($response, 'category.html.twig', $data); // render view passing a data array
  }

  public function add(Request $request, Response $response){
    //create a new category object with post data
    $category = new Category($_POST['category_name'], $_POST['color']);

    $categoryDao = new CategoryDAO(); //get instance of data access object layer
    if ($categoryDao->insert($category)) //inserts a new category
      return $response->withStatus(302)->withHeader("Location", "/category"); //redirect to home category
  }

  public function delete(Request $request, Response $response, $args){
    $categoryDao = new CategoryDAO(); //get instance of data access object layer
    if ($categoryDao->delete($args['id'])) //delete an existing category
      return $response->withStatus(302)->withHeader("Location", "/category"); //redirect to home category
  }
}