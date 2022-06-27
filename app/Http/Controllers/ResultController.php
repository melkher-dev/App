<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Weapon;
use App\Models\Country;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
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

        return view('results', $data);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return bool
     */
    public function store(Request $request)
    {
        $result = new Result();
        $result->country_id = $request->country_id;
        $result->weapon_id = $request->weapon_id;
        $result->amount = $request->amount;
        $result->save();

        return redirect('/results');
    }
}
