<?php

declare(strict_types=1);


namespace App\Guild\Controller;

class ApiController extends BaseController
{
  public function index()
  {
    $this->addParam('message', 'MVC properly set up! Time to implement the project!');
    $this->view('api/index');
  }
}
