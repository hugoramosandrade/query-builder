<?php

namespace Hugo\QueryBuilder\Select;

use Hugo\QueryBuilder\Sql;

class SelectBuilder extends CallWhere
{
    public function __construct(
        protected string $collumns,
        protected string $table,
        protected Sql $sql,
    )
    {
        //
    }

    public function innerJoin(string $table, string $first, string $operator, string $second): Join
    {
        $join = new Join($this->table, $this->sql);
        $join->innerJoin($table, $first, $operator, $second);
        return $join;
    }

    public function leftJoin(string $table, string $first, string $operator, string $second): Join
    {
        $join = new Join($this->table, $this->sql);
        $join->leftJoin($table, $first, $operator, $second);
        return $join;
    }

    public function rightJoin(string $table, string $first, string $operator, string $second): Join
    {
        $join = new Join($this->table, $this->sql);
        $join->rightJoin($table, $first, $operator, $second);
        return $join;
    }
}
