<?php

namespace app\controllers;

use app\core\Controller;

class login extends Controller
{
  public function index()
  {
    $this->view->render('login.phtml', 'template.phtml');
  }
}
