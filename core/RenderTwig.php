<?php
// require __DIR__ . '/../vendor/autoload.php';

// $loader = new \Twig\Loader\FilesystemLoader('../app/Views/Templates');
// $twig = new \Twig\Environment($loader, [
//   'cache' => '/cache',
// ]);

// return $twig;

namespace Core;

class RenderTwig
{
  protected function showTemplate(string $view, $params = [])
  {
    $twig = new \Twig\Environment(
      new \Twig\Loader\FilesystemLoader('../app/Views/')
    );

    echo $twig->render($view . '.twig.html', $params);
  }
}
