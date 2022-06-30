<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
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
     * getPaginatedCountries
     *
     * @return void
     */
    public function getPaginatedCountries()
    {
        return $this->model->paginate(10);
    }

    /**
     * getAllCountries
     *
     * @return void
     */
    public function getAllCountries()
    {
        return $this->model->all();
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
