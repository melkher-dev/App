<?php
namespace App\Services;

use App\Models\Result;
use App\Models\Weapon;
use App\Models\Country;

class ResultService
{
    /**
     * getResult
     *
     * @return void
     */
    public function getResult()
    {
        $data = [
            'results' => Result::paginate(5),
            'results_huy' => Result::all(),
            'weapons' => Weapon::all(),
            'countries' => Country::all(),
        ];

        //сумма всех amount
        $summ = Result::sum('amount');

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
     * @return bool
     */
    public function saveResult(array $data)
    {
        $result = new Result();
        $result->country_id = $data['country_id'];
        $result->weapon_id = $data['weapon_id'];
        $result->amount = $data['amount'];
        $result->save();

    }
}
