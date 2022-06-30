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
            'countries' => $this->countryRepository->getPaginate(),
        ];
    }

    /**
     * saveCountry
     *
     * @param  mixed $data
     * @return void
     */
    public function saveCountry(array $data): void
    {
        $this->countryRepository->saveCountry($data);
    }
}
