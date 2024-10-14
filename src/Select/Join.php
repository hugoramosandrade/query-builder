<?php

namespace Hugo\QueryBuilder\Select;

use Hugo\QueryBuilder\Sql;

class Join extends CallWhere
{
    public function __construct(
        protected string $table,
        protected Sql $sql
    )
    {
        //
    }

    public function innerJoin(string $table, string $first, string $operator, string $second): self
    {
        $this->sql->concact(" inner join {$table} on {$first} {$operator} {$second}");
        return $this;
    }

    public function leftJoin(string $table, string $first, string $operator, string $second): self
    {
        $this->sql->concact(" left join {$table} on {$first} {$operator} {$second}");
        return $this;
    }

    public function rightJoin(string $table, string $first, string $operator, string $second): self
    {
        $this->sql->concact(" right join {$table} on {$first} {$operator} {$second}");
        return $this;
    }

    public function getSql(): Sql
    {
        return $this->sql;
    }
}
