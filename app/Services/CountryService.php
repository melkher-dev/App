<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * getCountry
     *
     * @return void
     */
    public function getCountry()
    {
        return [
            'countries' => $this->countryRepository->getPaginatedCountries(),
        ];
    }

    /**
     * saveCountry
     *
     * @param  mixed $data
     * @return void
     */
    public function saveCountry(array $data)
    {
        $this->countryRepository->saveCountry($data);
    }
}
