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
     * @return void
     */
    public function index()
    {
        return view('weapons', $this->weaponService->getWeapon());
    }

    /**
     * store
     *
     * @param \App\Http\Requests\StoreWeaponRequest $request
     * @return void
     */
    public function store(StoreWeaponRequest $request)
    {
        $this->weaponService->saveWeapon($request->only(
            'weapon'
        ));

        return redirect()->route('weapons');
    }
}
