<?php

namespace App\Services;

use App\Models\Result;
use App\Repositories\CountryRepository;
use App\Repositories\ResultRepository;
use App\Repositories\WeaponRepository;

class ResultService
{
    private $resultRepository;

    public function __construct(
        ResultRepository $resultRepository,
        CountryRepository $countryRepository,
        WeaponRepository $weaponRepository
    ) {
        $this->resultRepository = $resultRepository;
        $this->countryRepository = $countryRepository;
        $this->weaponRepository = $weaponRepository;
    }
    /**
     * getResult
     *
     * @return void
     */
    public function getResult(): array
    {
        $data = [
            'results' =>  $this->resultRepository->getPaginate(),
            'results_huy' =>  $this->resultRepository->getAll(),
            'weapons' => $this->weaponRepository->getAll(),
            'countries' => $this->countryRepository->getAll(),
        ];

        //сумма всех amount
        $summ =  $this->resultRepository->getSum('amount');

        //collection
        $data['results_huy'] = $data['results_huy']->map(function ($row) use ($summ) {
            $data = [];
            if ($summ == '0') {
                throw new \Exception('error - на ноль делить нельзя!!');
            }
            $data[$row->country->name][$row->weapon->name] = $row->amount / $summ * 100;

            return $data;
        });

        return $data;
    }

    /**
     * saveResult
     *
     * @param array $data
     * @return void
     */
    public function saveResult(array $data): void
    {
        $result = new Result();
        $result->country_id = $data['country_id'];
        $result->weapon_id = $data['weapon_id'];
        $result->amount = $data['amount'];
        $result->save();
    }
}
