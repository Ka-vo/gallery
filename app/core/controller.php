<?php

namespace app\core;

// interface IController
// {
//   public function index();
// };

//class Controller implements IController
class Controller
{
  protected $view;
  protected $model;
  public function __construct()
  {
    $this->view = new View();
  }
  public function index()
  {
  }
}
