<?php

namespace Hugo\QueryBuilder;

use Hugo\QueryBuilder\Insert\InsertBuilder;
use Hugo\QueryBuilder\Select\FromTableBuilder;
use Hugo\QueryBuilder\Update\UpdateBuilder;

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

    public function update(): UpdateBuilder
    {
        return new UpdateBuilder($this->sql);
    }

    public function insert(): InsertBuilder
    {
        return new InsertBuilder($this->sql);
    }
}
