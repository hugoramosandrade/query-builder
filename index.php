<?php

use Hugo\QueryBuilder\Builder;

require "vendor/autoload.php";

$builder = new Builder;

$sql = $builder->select(['*'])->from('clients')
    ->innerJoin('enterprises', 'clients.enterprise_id', '=', 'enterprises.id')
    ->innerJoin('employees', 'clients.id', '=', 'employees.client_id')
    ->where('client.id', '=', 1)->getSql();

dump($sql->sql, $sql->binds);

$builder = new Builder;

$sql = $builder->update()->table('employee')
    ->set('name', 'Hugo Ramos')
    ->set('enterprise_id', '=', 2)
    ->where('id', '=', 1)
    ->where('email', '=', 'hugo@condominiodedicado.com.br')
    ->getSql();

dump($sql->sql, $sql->binds);