<?php

namespace App\Services;

use App\Models\Weapon;
use App\Models\Country;

class VoteService
{
    /**
     * getData
     *
     * @return void
     */
    public function getData()
    {
        return [
            'countries' => Country::all(),
            'weapons' => Weapon::all(),
        ];
    }
}
