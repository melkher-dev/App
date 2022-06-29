<?php

namespace App\Services;

use App\Models\Weapon;

class WeaponService
{
    /**
     * getWeapon
     *
     * @return void
     */
    public function getWeapon()
    {
        return [
            'weapons' => Weapon::paginate(10),
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
        $weapon = new Weapon();
        $weapon->name = $data['weapon'];
        $weapon->save();
    }
}
