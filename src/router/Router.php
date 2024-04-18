<?php

declare(strict_types=1);

namespace app\quizz\router;

class Router
{
  private static ?Router $instance = null;

  public function __construct(private mixed $listRoute = "")
  {
    // JSON includes standard classes from a mixed object.
    $stringRoute = file_get_contents('./../config/routes.json');
    $this->listRoute = json_decode($stringRoute);
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new Router();
    }

    return self::$instance;
  }

  private function _buildParamsPattern(\stdClass $route): string
  {
    // Each element is an object from the class stdClass, generated from json_decode()
    $patternParams = "";
    foreach ($route->params as $params) {
      $patternParams .= '/\d';
    }

    return $patternParams;
  }

  public function findRoute(HttpRequest $httpRequest): Route
  {
    $routeFound = array_filter($this->listRoute, function ($route) use ($httpRequest) {
      return preg_match("#^" . $route->path . $this->_buildParamsPattern($route) . "$#", $httpRequest->getUri()) && $route->method == $httpRequest->getMethod();
    });
    $numberRoute = count($routeFound);
    if ($numberRoute > 1) {
      throw new MultipleRouteFoundException();
    } else if ($numberRoute == 0) {
      throw new NoRouteFoundException();
    } else {
      return new Route(array_shift($routeFound));
    }
  }
}
