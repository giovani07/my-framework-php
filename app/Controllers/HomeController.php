<?php

namespace App\Controllers;

use Core\RenderTwig;
use App\Models\User;

class HomeController extends RenderTwig
{

  public function hello($params)
  {
    return "Olá {$params[1]}";
  }

  public function listUsers()
  {
    return $this->showTemplate(
      'Templates/home/list_users',
      ['users' => User::all()]
    );
  }

  public function showUser($params)
  {
    return $this->showTemplate(
      'Templates/home/show_user',
      ['user' => User::find($params[1])]
    );
  }

  public function home($params)
  {
    return $this->showTemplate(
      'Templates/home/home'
    );
  }
}
