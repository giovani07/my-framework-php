#

# Framework PHP - Simples, utilizando MVC e boa práticas

#

# EXTENSÕES

## Testes unitários

### https://www.devmedia.com.br/teste-unitario-com-phpunit/41231

> phpunit/phpunit: "^9.4"

## Eloquent, ORM (Object Relational Mapper) do Laravel

### https://laravel.com/docs/6.x/eloquent

> illuminate/database: "^8.9"

## Twig, template engine do Symphony

### https://twig.symfony.com/doc/3.x/

> twig/twig: "^3"

## Laravel\Support

- Classes diversas, especialmente Collection para trabalhar com arrays
  (Eloquent sempre retorna Collections(arrays))

### https://laravel.com/docs/8.x/collections

### https://laravel.com/api/8.x/Illuminate/Support.html

> illuminate/support: "^8"

#

# FUNCIONAMENTO

> app/Starter define as rotas a serem utilizadas

- Cada rota chama um Controller dentro de app/Controllers, com um método (function),
  que então define o que será feito.
  - Se usado um template, \$this->showTemplate irá buscar a página .twig.html
    da pasta Views/Templates
  - Pasta Models contem somente definições de tabelas, todas as chamadas de banco
    são dentro do controles, usando os comandos intuitivos do Eloquent (::find, ::all,...)
- Views/Partials contém as páginas e blocos default, que cada template irá extender
