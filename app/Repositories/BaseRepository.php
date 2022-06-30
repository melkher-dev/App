<?php

namespace App\Repositories;

class BaseRepository
{
    private $model;

    /**
     * getAll
     *
     * @return void
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * getPaginate
     *
     * @return void
     */
    public function getPaginate()
    {
        return $this->model->paginate(10);
    }
}
