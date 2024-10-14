<?php

namespace Hugo\QueryBuilder\Select;

use Hugo\QueryBuilder\Sql;

abstract class CallWhere
{
    protected string $table;
    protected Sql $sql;

    public function where(string $collumn, string $operator, string|int $value): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->where($collumn, $operator, $value);
        return $where;
    }

    public function whereNull(string $collumn): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereNull($collumn);
        return $where;
    }

    public function whereNotNull(string $collumn): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereNotNull($collumn);
        return $where;
    }

    public function whereIn(string $collumn, array $values): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereIn($collumn, $values);
        return $where;
    }

    public function whereNotIn(string $collumn, array $values): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereNotIn($collumn, $values);
        return $where;
    }

    public function whereBetween(string $collumn, array $values): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereBetween($collumn, $values);
        return $where;
    }

    public function whereNotBetween(string $collumn, array $values): Where
    {
        $where = new Where($this->table, $this->sql);
        $where->whereNotBetween($collumn, $values);
        return $where;
    }
}
