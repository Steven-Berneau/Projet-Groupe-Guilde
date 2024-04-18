<?php

declare(strict_types=1);

namespace App\Guild\Router;

class HttpRequest
{
  public function __construct(private string $uri = "", private string $method = "", private ?array $params = [], private ?Route $route = null)
  {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->params = null;
    $this->route = null;
  }

  public function getUri(): string
  {
    return $this->uri;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getParams(): array
  {
    return $this->params;
  }

  public function setRoute(Route $route): void
  {
    $this->route = $route;
  }

  public function getRoute(): Route
  {
    return $this->route;
  }

  private function bindParamFromGet(): array
  {
    $route = explode('/', $this->route->getPath());  // The route holds not any parameter
    $uri = explode('/', $this->uri);  // the URL actually holds the parameters
    for ($i = count($route); $i < count($uri); $i++) {
      $params[$this->getRoute()->getParams()[$i - count($route)]] = $uri[$i];
    }

    return $params;
  }

  private function bindParamFromPost(): array
  {
    $params = array();
    foreach ($this->route->getParams() as $param) {
      if (isset($_POST[$param])) {
        $params = $_POST[$param];
      }
    }

    return $params;
  }

  public function bindParam(): void
  {
    switch ($this->method) {
      case "GET":
        $this->params = $this->bindParamFromGet();
        break;
      case "POST":
        $this->params = $this->bindParamFromPost();
        break;
    }
  }

  public function run(): void
  {
    if ($this->route == null) {
      throw new RouteNotSetException($this);
    }
    $this->route->run($this);
  }
}
