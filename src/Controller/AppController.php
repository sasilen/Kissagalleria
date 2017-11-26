<?php

namespace Kissagalleria\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
  public $helpers = ['Media.Media','Kissagalleria.Kissagalleria','Paginator' => ['templates' => 'paginator-templates']];

}
