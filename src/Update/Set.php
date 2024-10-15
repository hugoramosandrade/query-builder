<?php

namespace Hugo\QueryBuilder\Update;

use Hugo\QueryBuilder\Select\CallWhere;
use Hugo\QueryBuilder\Sql;

class Set extends CallWhere
{
    protected array $binds = [];
    
    public function __construct(
        protected Sql $sql,
        protected string $table,
    )
    {
        //
    }

    public function set(string $collumn, string|int $value): self
    {
        $this->binds[] = $value;
        $bindCount = count($this->binds);
        $this->sql->concact(" set {$collumn} = \${$bindCount}");
        return $this;
    }

    public function setArray(array $attributes): self
    {
        foreach ($attributes as $collumn => $value) {
            $this->set($collumn, $value);
        }
        return $this;
    }

    public function getSql(): Sql
    {
        if (count($this->binds) > 0) $this->sql->addBind($this->binds);
        return $this->sql;
    }
}
