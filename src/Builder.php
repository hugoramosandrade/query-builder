<?php

namespace Hugo\QueryBuilder;

use Hugo\QueryBuilder\Select\FromTableBuilder;

class Builder
{
    private Sql $sql;

    public function __construct()
    {
        $this->sql = new Sql('');
    }

    public function select(?array $collumns = ['*'])
    {
        $collumns = implode(", ", $collumns);
        return new FromTableBuilder($this->sql, $collumns);
    }

    public function update()
    {
        //
    }

    public function insert()
    {
        //
    }
}
