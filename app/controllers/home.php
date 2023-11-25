<?php


namespace app\controllers;

use app\core\Controller;

include_once './app/models/home.php';
include_once './app/core/view.php';

use app\models\HomeModel;

use app\core\View;

class Home extends Controller
{
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->view = new View();
  }

  public function index()
  {
    $data = $this->model->get_data();
    $this->view->render('home.phtml', 'template.phtml', $data);
  }
}
