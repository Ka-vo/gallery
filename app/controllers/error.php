<?php

namespace app\controllers;

use app\core\Controller;

class Error extends Controller
{
  public function index()
  {
    $this->view->render('error.phtml', 'template.phtml');
  }
}
