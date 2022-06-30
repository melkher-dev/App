<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository extends BaseRepository
{
    public $model;

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
    public function getSum($field): int
    {
        return $this->model->sum($field);
    }
}
