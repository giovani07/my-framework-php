<?php

namespace App;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
  public function testVerificaSeEncontraRota()
  {
    // instancio o Router informando o método HTTP e a url digitada
    // estes são os dados que queremos encontrar
    $router = new Router('GET', '/ola-mundo');

    // registro minha primeira rota, esta rota só retorna um
    // true como exemplo, ela poderia fazer qualquer outra coisa
    $router->add('GET', '/ola-mundo', function () {
      return true;
    });

    // executamos o método que encontra a rota atual
    $result = $router->handler();

    // executo a ação da rota encontrada e pego o valor,
    // note que estou executando o método que
    // registrei quando usei o $router->add
    $actual = $result();

    // o valor que espero que seja retornado pelo $actual
    $expected = true;

    // verifico se o valor atual é o mesmo do esperado
    $this->assertEquals($expected, $actual);
  }

  public function testVerificaNaoSeEncontraRota()
  {
    $router = new Router('GET', '/outra-url'); // esta rota não foi registrada

    // esta rota não é a que está sendo usada
    $router->add('GET', '/ola-mundo', function () {
      return true;
    });

    $result = $router->handler();

    $actual = $result;
    $expected = false;

    // estou usando o assertNotEquals
    // que verifica se os valores são diferentes
    // antes eu usei o assertEquals
    // que verifica se eles são iguais
    $this->assertNotEquals($expected, $actual);
  }



  public function testVerificaSeEncontraRotaVariavel()
  {
    $router = new Router('GET', '/ola-erik');
    $router->add('GET', '/ola-{nome}', function () {
      return true;
    });

    $result = $router->handler();

    $actual = $result();
    $expected = true;
    $this->assertEquals($expected, $actual);
  }
}
