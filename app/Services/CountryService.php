<?php

namespace App\Services;

use App\Models\Country;

class CountryService
{
    /**
     * getCountry
     *
     * @return void
     */
    public function getCountry()
    {
        return [
            'countries' => Country::paginate(10),
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
        $country = new Country();
        $country->name = $data['country'];
        $country->save();
    }
}
