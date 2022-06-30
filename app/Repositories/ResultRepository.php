<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository extends BaseRepository
{
    private $model;

    /**
     * __construct
     *
     * @param  mixed $result
     * @return void
     */
    public function __construct(Result $result)
    {
        $this->model = $result;
    }

    /**
     * getSum
     *
     * @param  mixed $field
     * @return int
     */
    public function getSum($field)
    {
        return $this->model->sum($field);
    }
}
