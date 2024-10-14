<?php

namespace Hugo\QueryBuilder\Select;

use Hugo\QueryBuilder\Sql;

class Where
{
    private array $binds = [];
    private array $wheres = [];

    public function __construct(
        private string $table,
        private Sql $sql
    )
    {
        //
    }

    public function where(string $collumn, string $operator, string|int $value): self
    {
        $this->binds[] = gettype($value) != 'string' ? var_export($value, true) : $value;
        $paramNumber = "$".count($this->binds);
        $this->wheres[] = "{$collumn} {$operator} {$paramNumber}";
        return $this;
    }

    public function whereNull(string $collumn): self
    {
        $this->wheres[] = "{$collumn} is null";
        return $this;
    }

    public function whereNotNull(string $collumn): self
    {
        $this->wheres[] = "{$collumn} is not null";
        return $this;
    }

    public function whereIn(string $collumn, array $values): self
    {
        $params = [];
        foreach ($values as $value) {
            $value = gettype($value) != "string" ? var_export($value, true) : $value;
            $this->binds[] = $value;
            $params[] = "$".count($this->binds);
        }
        $params = implode(", ", $params);
        $this->wheres[] = "{$collumn} in ($params)";
        return $this;
    }

    public function whereNotIn(string $collumn, array $values): self
    {
        $params = [];
        foreach ($values as $value) {
            $value = gettype($value) != "string" ? var_export($value, true) : $value;
            $this->binds[] = $value;
            $params[] = "$".count($this->binds);
        }
        $params = implode(", ", $params);
        $this->wheres[] = "{$collumn} not in ({$params})";
        return $this;
    }

    public function whereBetween(string $collumn, array $values): self
    {
        $params = [];
        foreach ($values as $value) {
            $value = gettype($value) != "string" ? var_export($value, true) : $value;
            $this->binds[] = $value;
            $params[] = "$".count($this->binds);
        }

        $params = implode(", ", $params);
        $this->wheres[] = "{$collumn} between ($params)";
        return $this;
    }

    public function whereNotBetween(string $collumn, array $values): self
    {
        $params = [];
        foreach ($values as $value) {
            $value = gettype($value) != "string" ? var_export($value, true) : $value;
            $this->binds[] = $value;
            $params[] = "$".count($this->binds);
        }

        $params = implode(", ", $params);
        $this->wheres[] = "{$collumn} not between ($params)";
        return $this;
    }

    public function getSql(): Sql
    {
        if (count($this->wheres) > 0) {
            $wheres = " where ".trim(implode(" and ", $this->wheres));
            $this->sql->concact($wheres);
        }
        return $this->sql;
    }
}
