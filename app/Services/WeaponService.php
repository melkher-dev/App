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
     * @return array
     */
    public function getWeapon(): array
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
    public function saveWeapon(array $data): void
    {
        $this->weaponRepository->saveWeapon($data);
    }
}
