<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    private $model;

    /**
     * construct
     *
     * @param \App\Models\Country $country
     */
    public function __construct(Country $country)
    {
        $this->model = $country;
    }

    /**
     * saveCountry
     *
     * @param array $data
     * @return void
     */
    public function saveCountry(array $data)
    {
        $this->model->name = $data['country'];
        $this->model->save();
    }
}
