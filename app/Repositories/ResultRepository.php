<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository
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
     * getPaginatedResults
     *
     * @return void
     */
    public function getPaginatedResults()
    {
        return $this->model->paginate(10);
    }

    /**
     * getAllResults
     *
     * @return void
     */
    public function getAllResults()
    {
        return $this->model->all();
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
