<?php
    namespace DB\Builder;

    /**
     * Interface for all SQL Query Builder
     *
     * @package DB\Driver
     */
    abstract class Builder
    {
        abstract public function reset();
        abstract public function table($tables);
        abstract public function join($table, $field1, $field2);
        abstract public function where($field, $vo1, $vo2='');
        abstract public function whereOr($field, $vo1, $vo2='');
        abstract public function get($field='*');

        protected function splitToArr($s, $delim=',')
        {
            if (is_string($s))
            {
                if (strpos($s, $delim) !== false)
                {
                    return explode($delim, $s);
                }
                else
                {
                    return [$s];
                }
            }
            elseif (is_array($s))
            {
                return $s;
            }

            return $s;
        }

        protected function fieldQuote($field)
        {
            if (strpos($field, '.') !== false)
            {
                $ex = explode ('.', $field);
                $ex[0] = trim($ex[0]);
                $ex[1] = trim($ex[1]);
                return "`$ex[0]`.`$ex[1]`";
            }
            else if ($field === '*')
            {
                return trim($field);
            }
            $field = trim($field);
            return "`$field`";
        }

        protected function addCond(&$conds, $vo1, $op, $vo2, $cond='AND')
        {
            if ($conds === '')
            {
                $conds = "$vo1$op$vo2";
            }
            else
            {
                $conds .= " $cond $vo1$op$vo2";
            }
        }
    }

?>
