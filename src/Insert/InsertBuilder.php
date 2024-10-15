<?php

namespace Hugo\QueryBuilder\Insert;

use Hugo\QueryBuilder\Sql;

class InsertBuilder
{
    public function __construct(
        private Sql $sql,
    )
    {
        //
    }

    public function into(string $table)
    {
        $this->sql->concact("insert into {$table}");

        return new Collumns($this->sql);
    }
}
