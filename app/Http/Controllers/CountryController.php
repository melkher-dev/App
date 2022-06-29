<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCountryRequest;

class CountryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('countries', [
            'countries' => Country::paginate(10),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(StoreCountryRequest $request)
    {
        $country = new Country();
        $country->name = $request->country;
        $country->save();

        return redirect()->route('countries');
    }
}
