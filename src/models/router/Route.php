<?php

declare(strict_types=1);

namespace app\quizz\router;

class Route
{
  public function __construct(private string $path = "", private string $controller = "", private string $action = "", private array $params = [], private string $method = "", \stdClass $route = null)
  {
    $this->path = $route->path;
    $this->controller = $route->controller;
    $this->action = $route->action;
    $this->method = $route->method;
    $this->params = $route->params;
  }

  public function getPath(): string
  {
    return $this->path;
  }

  public function getController(): string
  {
    return $this->controller;
  }

  public function getAction(): string
  {
    return $this->action;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getParams(): array
  {
    return $this->params;
  }

  public function run(HttpRequest $httpRequest)
  {
    $controller = null;
    $controllerName = 'app\quizz\controller';
    $this->controller . 'Controller';
    if (class_exists($controllerName)) {
      $controller = new $controllerName($httpRequest);
      if (method_exists($controller, $this->action)) {
        $controller->{$this->action}(...$httpRequest->getParams());
      } else {
        throw new ActionNotFoundException();
      }
    } else {
      throw new ControllerNotFoundException();
    }
  }
}
