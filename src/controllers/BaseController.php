<?php

declare(strict_types=1);

namespace App\Guild\Controller;

use App\Guild\Router\HttpRequest;
use App\Guild\Router\ViewNotFoundException;

class BaseController
{
  public function __construct(protected HttpRequest $httpRequest, protected array $params = [])
  {
    $this->httpRequest = $httpRequest;
    $this->params = $httpRequest->getParams();
  }

  public function view($filename)
  {
    $viewfile = './..templates/' . $filename . '.php';
    if (file_exists($viewfile)) {
      ob_start();
      extract($this->params);
      include($viewfile);
      $contents = ob_get_clean();
      include('./../templates/layout.php');
    } else {
      throw new ViewNotFoundException($viewfile);
    }
  }

  public function addParam($name, $value)
  {
    $this->params[$name] = $value;
  }
}
