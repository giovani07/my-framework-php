<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/Database.php';

// define o método http e a url amigável
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

// instanciando o Router
$router = new Core\Router($method, $path);

/*
$auth = function () {
  $checkUserIsAuth = true;
  if (!$checkUserIsAuth) {
      http_response_code(401);
      echo '<h1 style="color: red">Você não está autenticado</h1>';
  }
  return $checkUserIsAuth;
}
*/

/*
 ** registro de cada rota
 /
/** ----------------------------------------------------------------- */
// $router->get('/ola-{nome}', function ($params) {
//   return 'Olá ' . $params[1]; // o parametro 0 é a rota toda
// });

$router->get('/', 'App\Controllers\HomeController::home');

$router->get('/ola-{nome}', 'App\Controllers\HomeController::hello');
$router->get('/users', 'App\Controllers\HomeController::listUsers');
$router->get('/user/{id}', 'App\Controllers\HomeController::showUser');

/** ------------------------------------------------------------------ */
// encontrar a rota que o usuário acessou
$result = $router->handler();

// ação se retornar false
if (!$result) {
  http_response_code(404);
  echo $path;
  die();
}

// verifica se é uma função anônima
if ($result instanceof Closure) {
  // imprime a página atual
  echo $result($router->getParams());

  // se não for uma função anônima e for uma string
} elseif (is_string($result)) {
  // quebra a string nos dois-pontos (::) transformando em array
  $result = explode('::', $result);

  // Primeira parte é o controller
  $controller = new $result[0];
  // Segunda é o método a ser executado (function)
  $action = $result[1];

  // executa o método da classe com os parâmetros que o Controller mandar
  echo $controller->$action($router->getParams());
}
