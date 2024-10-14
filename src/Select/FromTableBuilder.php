<?php

namespace Hugo\QueryBuilder\Select;

use Hugo\QueryBuilder\Sql;

class FromTableBuilder
{
    public function __construct(
        private Sql $sql,
        private string $collumns,
    )
    {
        //
    }

    public function from(string $table)
    {
        $this->sql->concact("select {$this->collumns} from {$table}");
        return new SelectBuilder($this->collumns, $table, $this->sql);
    }
}
