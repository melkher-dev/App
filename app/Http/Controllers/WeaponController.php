<?php

namespace App\Http\Controllers;

use App\Services\WeaponService;
use App\Http\Requests\StoreWeaponRequest;

class WeaponController extends Controller
{
    protected $weaponService;

    /**
     * construct
     *
     * @param \App\Services\WeaponService $weaponService
     */
    public function __construct(WeaponService $weaponService)
    {
        $this->weaponService = $weaponService;
    }

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('weapons', $this->weaponService->getWeapon());
    }

    /**
     * store
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(StoreWeaponRequest $request)
    {
        $this->weaponService->saveWeapon($request->only(
            'weapon'
        ));

        return redirect()->route('weapons');
    }
}
