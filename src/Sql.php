<?php

namespace Hugo\QueryBuilder;

use Stringable;

class Sql implements Stringable
{
    public function __construct(
        protected string $sql = '',
        protected ?array $binds = []
    )
    {
        //
    }

    public function __get($name): null|string|array
    {
        if (isset($this->$name)) return $this->$name;

        return null;
    }

    public function __toString(): string
    {
        return $this->sql;
    }

    public function concact(string $partial)
    {
        $this->sql .= $partial;
    }
}
