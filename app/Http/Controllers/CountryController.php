<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Http\Requests\StoreCountryRequest;

class CountryController extends Controller
{
    protected $countryService;

    /**
     * construct
     *
     * @param \App\Services\CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('countries', $this->countryService->getCountry());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(StoreCountryRequest $request)
    {
        $this->countryService->saveCountry($request->only(
            'country'
        ));

        return redirect()->route('countries');
    }
}
