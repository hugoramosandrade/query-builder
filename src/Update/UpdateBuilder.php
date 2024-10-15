<?php

namespace Hugo\QueryBuilder\Update;

use Hugo\QueryBuilder\Sql;

class UpdateBuilder
{
    protected string $table;

    public function __construct(
        protected Sql $sql,
    )
    {
        //
    }

    public function table(string $name): self
    {
        $this->table = $name;
        $this->sql->concact("update {$name}");
        return $this;
    }

    public function set(string $collumn, string|int $value): Set
    {
        $setBuilder = new Set($this->sql, $this->table);
        $setBuilder->set($collumn, $value);
        return $setBuilder;
    }

    public function setArray(array $attributes): Set
    {
        $setBuilder = new Set($this->sql, $this->table);
        $setBuilder->setArray($attributes);
        return $setBuilder;
    }
}
