<?php

namespace Hugo\QueryBuilder\Insert;

use Hugo\QueryBuilder\Sql;

class Collumns
{
    public function __construct(
        private Sql $sql
    )
    {
        //
    }

    public function collumns(array $collumns)
    {
        $this->sql->concact(" (".implode(", ", $collumns).")");
        return new Values($this->sql);
    }
}
