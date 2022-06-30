<?php

namespace App\Repositories;

use App\Models\Weapon;

class WeaponRepository
{
    private $model;

    /**
     * construct
     *
     * @param \App\Models\Weapon $weapon
     */
    public function __construct(Weapon $weapon)
    {
        $this->model = $weapon;
    }

    /**
     * getPaginatedWeapons
     *
     * @return void
     */
    public function getPaginatedWeapons()
    {
        return $this->model->paginate(10);
    }

    /**
     * getAllWeapons
     *
     * @return void
     */
    public function getAllWeapons()
    {
        return $this->model->all();
    }

    /**
     * saveWeapon
     *
     * @param array $data
     * @return void
     */
    public function saveWeapon(array $data)
    {
        $this->model->name = $data['weapon'];
        $this->model->save();
    }
}
