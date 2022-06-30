<?php

namespace App\Services;

use App\Repositories\WeaponRepository;
use App\Repositories\CountryRepository;

class VoteService
{
    private $countryRepository;
    private $weaponRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        CountryRepository $countryRepository,
        WeaponRepository $weaponRepository
    ) {
        $this->countryRepository = $countryRepository;
        $this->weaponRepository = $weaponRepository;
    }

    /**
     * getData
     *
     * @return void
     */
    public function getData()
    {
        return [
            'countries' => $this->countryRepository->getAll(),
            'weapons' => $this->weaponRepository->getAll(),
        ];
    }
}
