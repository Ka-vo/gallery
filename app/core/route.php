<?php

namespace app\core;

define('CONTROLLER_NAMESPACE', 'app\\controllers\\');
define('MODEL_NAMESPACE', 'app\\models\\');

use app\controllers;

class Route
{
  public static function start()
  {
    $controllerClassName = 'home';
    $actionName = 'index';
    $payload = [];

    $route = explode('/', $_SERVER['REQUEST_URI']);

    if (!empty($route[1])) {
      $controllerClassName = strtolower($route[1]);
    }

    if (!empty($route[2])) {
      $actionName = strtolower($route[2]);
    }

    if (!empty($route[3])) {
      $payload = array_splice($route, 3);
    }

    $modelName = $controllerClassName;
    $modelFile = strtolower($modelName) . '.php';
    $modelPath = MODELS . $modelFile;
    if (file_exists($modelPath)) {
      include $modelPath;
    }

    $controllerName = CONTROLLER_NAMESPACE . $controllerClassName;
    $controllerFile = $controllerClassName . '.php';
    $controllerPath = CONTROLLERS . $controllerFile;

    if (file_exists($controllerPath)) {
      include_once  $controllerPath;
    } else {
      self::error();
    }

    $controller = new $controllerName;
    if (method_exists($controller, $actionName)) {
      $controller->$actionName($payload);
    } else {
      self::error();
    }
  }

  public static function error()
  {
    header('HTTP/1.1 404 NOT FOUND');
    header('STATUS 404 NOT FOUND');
    header('location:/error');
  }
}
