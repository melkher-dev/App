<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $country = new Country();
        $country->name = $request->country;
        $country->save();

        return redirect()->route('countries');
    }
}
