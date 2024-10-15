<?php

namespace Hugo\QueryBuilder\Insert;

use Hugo\QueryBuilder\Sql;

class Values
{
    private array $binds = [];

    public function __construct(
        private Sql $sql,
    )
    {
        //
    }

    public function values(array $attributes): Sql
    {
        $query = ' values ';
        if ($this->isBulkInsert($attributes)) {
            $rows = [];
            foreach ($attributes as $row) {
                $params = [];
                foreach ($row as $value) {
                    $value = gettype($value) != 'string' ? var_export($value, true) : $value;
                    $this->binds[] = $value;
                    $params[] = "$".count($this->binds);
                }
                $values = implode(", ", $params);
                $rows[] = "($values)";
            }

            $query .= implode(", ", $rows);
        } else {
            $params = [];
            foreach ($attributes as $value) {
                $value = gettype($value) != 'string' ? var_export($value, true) : $value;
                $this->binds[] = $value;
                $params[] = "$".count($this->binds);
            }

            $values = implode(", ", $params);
            $query .= "({$values})";
        }

        $this->sql->concact($query);
        $this->sql->addBind($this->binds);

        return $this->sql;
    }

    /**
     *  If the attributes parameter is a list,
     *  it means it is a bulk insert. Then the return is true.
     *  Otherwise, returns false
     */
    private function isBulkInsert(array $attributes): bool
    {
        return array_is_list($attributes);
    }
}
