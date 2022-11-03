<?php

/* Extend PDOStatement for some methods */
class _pdo_statement extends PDOStatement
{
    /* Set the rule of fetchAll. Values will be returned as PDO::FETCH_ASSOC in fetch_array and fetch_assoc functions */
    public function fetch_array()
    {
        return $this->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetch_assoc($result)
    {
        return $this->fetchAll(PDO::FETCH_ASSOC);
    }
    /* Return number of rows */
    public function num_rows()
    {
        return $this->rowcount();
    }
    /* Return affected wors */
    public function affected_rows()
    {
        return $this->rowcount();
    }
}

