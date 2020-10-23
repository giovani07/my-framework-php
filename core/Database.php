<?php

use Illuminate\Database\Capsule\Manager;

$capsule = new Manager;

// $capsule->addConnection([
//     'driver'    => 'mysql',
//     'host'      => 'localhost',
//     'database'  => 'test',
//     'username'  => 'root',
//     'password'  => '',
//     'charset'   => 'utf8',
//     'collation' => 'utf8_unicode_ci',
//     'prefix'    => '',
// ]);

$capsule->addConnection([
  'driver'    => 'sqlsrv',
  'host'      => 'DELL\SQLTEST',
  'database'  => 'portal_madem',
  'username'  => 'root',
  'password'  => 'test',
  'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
