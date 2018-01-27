<?php

namespace Kissagalleria\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
  public $helpers = ['CakeDC/Users.AuthLink','Kareylo/Comments.Comment','Media.Media','Thumber.Thumb','Kissagalleria.Kissagalleria','Paginator' => ['templates' => 'paginator-templates']];
	public $components = ['Ratings.Rating' => ['actions'=>['view']]];
}
