<?php

namespace App\Services;

use App\Repositories\WeaponRepository;

class WeaponService
{
    private $weaponRepository;

    public function __construct(WeaponRepository $weaponRepository)
    {
        $this->weaponRepository = $weaponRepository;
    }

    /**
     * getWeapon
     *
     * @return void
     */
    public function getWeapon()
    {
        return [
            'weapons' => $this->weaponRepository->getPaginate(),
        ];
    }

    /**
     * saveWeapon
     *
     * @param  mixed $data
     * @return void
     */
    public function saveWeapon(array $data)
    {
        $this->weaponRepository->saveWeapon($data);
    }
}
